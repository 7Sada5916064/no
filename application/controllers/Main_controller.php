<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	include('My_controller.php');
	class Main_controller extends My_controller {
		
		
		public function __construct()
		{
			parent::__construct();
			
		}
		
		public function index()
		{
			$this->load->view('login',$data);
		}
		
		public function main_show()
		{
			$this->load->model('Users_model');
			$this->load->database();
			
			$data['usm'] = $this->Users_model->get_lists();
			$this->load->view('login',$data);
		}
		
		public function check_login()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$this->load->model('Users_model');
			
			$this->Users_model->username = $username;
			$this->Users_model->password = $password;
			
			$query = $this->Users_model->validate_user();
			if(count($query) == 0)
			{
				$this->main_show();
			}
			else
			{
				// print_r($query);
				if($query[0]->po_id == 1)
				{
					$userdata = array(
					'u_id'     => $query[0]->u_id,
					'u_ps_id'     => $query[0]->u_ps_id,
					'u_po_id'     => $query[0]->u_po_id
					);
					$this->session->set_userdata($userdata);	
					$this->shop_show_t();
				}
				else
				{	
					$userdata = array(
					'u_id'     => $query[0]->u_id,
					'u_ps_id'     => $query[0]->u_ps_id,
					'u_po_id'     => $query[0]->u_po_id
					);
					$this->session->set_userdata($userdata);
					$this->shop_show_t();
				}
				
			}
		}
		
		public function register_show()
		{
			$data="";
			
			$this->load->view('register',$data);
		}
		
		public function items_show_t()
		{
			$this->load->model('Unit_model');
			$this->load->model('Item_model');
			
			$data["um"] = $this->Unit_model->get_unit("");
			$data["itm"] = $this->Item_model->get_item("");
			
			$this->wtd_view('items',$data);
		}
		
		public function orderlist_show_b()
		{
			$this->load->model('Bill_model');
			$data['bm'] = $this->Bill_model->get_bill_order("");
			$this->wtd_view('orderlist',$data);
		}
		
		
		public function insert_register_user_b(){
			$firstname = $this->input->post("firstnameregister");
			$lastname = $this->input->post("lastnameregister");
			$username = $this->input->post("Usernameregister");
			$gender = $this->input->post("genderregister");
			$passwd = $this->input->post("passwdregister");
			$repasswd = $this->input->post("repasswdregister");
			
			if($passwd == $repasswd){
				$this->load->model('Users_model');
				$this->load->database();
				$this->Users_model->username = $username ;
				$this->Users_model->password = $passwd ;
				$this->Users_model->insert_user();
				echo"complete";
				}else{
				echo"fail";
				$this->register_show();
			} 
		}
		
		public function insert_item()
		{	
			$this->load->model('Item_model');
			$this->Item_model->insert_item();
			$this->items_show_t();
		}
		
		public function delete_item()
		{	
			$it_id = $this->input->post("it_id");
			$it_img = $this->input->post("it_img");
			$this->load->model('Item_model');
			$cond = " AND it_id = $it_id";
			$this->Item_model->delete_item($cond);
			if($it_img != '')
			{
				unlink("public/image/$it_img");	
			}
			$this->items_show_t();
		}
		
		public function update_item()
		{	
			$it_img = $this->input->post("it_img_edit");
			unlink("public/image/$it_img");
			$this->load->model('Item_model');
			$this->Item_model->update_item();
			$this->items_show_t();
		}
		
		public function shop_show_t()
		{
			$this->load->model('Customer_model');
			$this->load->model('Item_model');
			$this->load->model('Unit_model');
			
			// echo ($this->session->userdata('u_ps_id'));
			$data["um"] = $this->Unit_model->get_unit("");
			$data['cm'] = $this->Customer_model->get_all_customer("");
			$data["itm"] = $this->Item_model->get_item("");
			$this->wtd_view('shop',$data);
		}
		
		public function insert_bill()
		{	
			$this->load->model('Bill_model');
			$this->Bill_model->bil_code = str_replace("/","",date("Y/m/d"));
			$this->Bill_model->insert_bill();
			$bil_id = $this->Bill_model->last_insert_id;
			$cond = " AND bil_id = $bil_id ";
			$query = $this->Bill_model->get_bill($cond);
			$update_data = '';
			$update_data = $query[0]->bil_code;
			$update_data = $update_data.$bil_id;
			
			$this->Bill_model->bil_code = $update_data;
			$this->Bill_model->bil_id = $bil_id;
			$this->Bill_model->update_bill();
			return $bil_id;
		}
		
		public function insert_order()
		{
			//$od_bil_id = $this->insert_bill();
			$this->load->model('Order_model');
			$this->load->model('Item_model');
			
			$od_cus_id = $this->input->post("od_cus_id");
			$od_per_unit = $this->input->post("od_per_unit");
			$od_unit = $this->input->post("od_unit");
			$od_net = $this->input->post("od_net");
			$od_it_id = $this->input->post("od_it_id");
			
			foreach($od_it_id as $index=>$value)
			{

				$this->Order_model->od_u_create_id = $this->session->userdata('u_ps_id');
				$this->Order_model->od_cus_id = $od_cus_id;
				$this->Order_model->od_it_id = $value;
				$this->Order_model->od_per_unit = $od_per_unit[$index];
				$this->Order_model->od_unit = $od_unit[$index];
				$this->Order_model->od_net = $od_net[$index];
				$this->Order_model->od_bil_id = $od_bil_id;
				
				$cond = " AND it_id = $value";
				$it_query = $this->Item_model->get_item($cond);
				
				$this->Item_model->unit =  $it_query[0]->unit - $od_unit[$index];
				$this->Item_model->it_id = $value;
				
				$this->Order_model->insert_order();
				$this->Item_model->update_unit_item();
			}
			
			$this->orderlist_show_b();
			
		}
	}
?>