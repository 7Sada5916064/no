<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	include('My_controller.php');
	
	class Basic_controller extends My_controller {
		
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function basic_info_show()
		{
			$this->load->model('Customer_type_model');
			$this->load->model('Customer_model');
			$this->load->model('Prefix_model');
			$this->load->model('Gender_model');
			$data['ctm'] = $this->Customer_type_model->get_customer_type("");
			$data['cm'] = $this->Customer_model->get_all_customer("");
			$data['pm'] = $this->Prefix_model->get_prefix("");
			$data['gm'] = $this->Gender_model->get_gender("");
			$this->wtd_view('basic_info',$data);
			
		}
		
		public function insert_customer_type()
		{
			$cut_name = $this->input->post("cut_name");
			$this->load->model('Customer_type_model');
			
			$this->Customer_type_model->cus_name = $cut_name;
			$this->Customer_type_model->insert_customer_type();
			
			$json_data = $this->Customer_type_model->get_customer_type("");
			echo json_encode($json_data);
			
		}
		
		public function delete_customer_type()
		{
			$cut_id = $this->input->post("cut_id");
			$this->load->model('Customer_type_model');
			
			$cond = "AND cut_id = $cut_id";
			$this->Customer_type_model->delete_customer_type($cond);
			
			$json_data = $this->Customer_type_model->get_customer_type("");
			echo json_encode($json_data);
			
		}
		
		public function insert_customer()
		{
			$cut_id = $this->input->post("cut_id");
			
			$ge_id = $this->input->post("ge_id");
			$first_name = $this->input->post("first_name");
			$last_name = $this->input->post("last_name");
			$address = $this->input->post("address");
			$pre_id = $this->input->post("pre_id");
			
			$this->load->model('Customer_model');
			$this->load->model('Person_model');	
			
			$this->Person_model->ps_pre_id = $pre_id;
			$this->Person_model->fist_name = $first_name;
			$this->Person_model->last_name = $last_name;
			$this->Person_model->ps_ge_id = $ge_id;
			$this->Person_model->address = $address;
			$this->Person_model->insert_person();
			
			$cus_ps_id = $this->Person_model->last_insert_id;
			
			$this->Customer_model->cus_ps_id = $cus_ps_id;
			$this->Customer_model->cus_cut_id = $cut_id;
			
			$this->Customer_model->insert_customer();
			
			$json_data = $this->Customer_model->get_all_customer("");
			echo json_encode($json_data);	
		}
		
		public function delete_customer()
		{
			$cus_id = $this->input->post("cus_id");
			$this->load->model('Customer_model');
			
			$cond = "AND cus_id = $cus_id";
			$this->Customer_model->delete_customer($cond);
			
			$json_data = $this->Customer_model->get_all_customer("");
			echo json_encode($json_data);	
			
		}
		
		public function insert_prefix()
		{
			$pre_name = $this->input->post("pre_name");
			
			$this->load->model('Prefix_model');
			
			$this->Prefix_model->pre_name = $pre_name;
			$this->Prefix_model->insert_prefix();			
			
			$json_data = $this->Prefix_model->get_prefix("");
			echo json_encode($json_data);	
		}
		
		public function delete_prefix()
		{
			$pre_id = $this->input->post("pre_id");
			$this->load->model('Prefix_model');
			
			$cond = "AND pre_id = $pre_id";
			$this->Prefix_model->delete_prefix($cond);
			
			$json_data = $this->Prefix_model->get_prefix("");
			echo json_encode($json_data);		
		}
		
		public function insert_gender()
		{
			$ge_name = $this->input->post("ge_name");
			
			$this->load->model('Gender_model');
			
			$this->Gender_model->ge_name = $ge_name;
			$this->Gender_model->insert_gender();			
			
			$json_data = $this->Gender_model->get_gender("");
			echo json_encode($json_data);	
		}
		
		public function delete_gender()
		{
			$ge_id = $this->input->post("ge_id");
		$this->load->model('Gender_model');
		
		$cond = "AND ge_id = $ge_id";
		$this->Gender_model->delete_gender($cond);
		
		$json_data = $this->Gender_model->get_gender("");
		echo json_encode($json_data);		
		}
		}
		?>
		
		
		
		
		
		
		
		
		
				
