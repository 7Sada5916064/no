<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	include_once("Main_model.php");
?>
<?php
	class Item_model extends Main_model {
		
		public $it_id; 
		public $it_name;
		public $it_detail;
		public $unit;
		public $it_un_id;
		public $pro_status;
		public $pro_name;
		public $it_img;
		
		public $last_insert_id;
		
		public function insert_item()
		{
			$config['upload_path'] = '.\public\image';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '3000';
			$config['max_height'] = '3000';
			
			$this->load->library('upload',$config);
			if( ! $this->upload->do_upload('it_img'))
			{
				echo $this->upload->display_errors();
			}
			else
			{
				$data = $this->upload->data();
				$filename = $data['file_name'];
				$data = array(
				'it_name' => $this->input->post('it_name'),
				'it_detail' => $this->input->post('it_detail'),
				'unit' => $this->input->post('unit'),
				'it_un_id' => $this->input->post('it_un_id'),
				'it_img' => $filename
				);
				
				$query = $this->db->insert('item',$data);
			}
		}
		
		public function update_item()
		{
			$config['upload_path'] = '.\public\image';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '3000';
			$config['max_height'] = '3000';
			
			$this->load->library('upload',$config);
			if( ! $this->upload->do_upload('it_img'))
			{
				echo $this->upload->display_errors();
			}
			$data = $this->upload->data();
			$filename = $data['file_name'];
			if($filename != '')
			{	
				$data = array(
				'it_id' => $this->input->post('it_id'),
				'it_name' => $this->input->post('it_name'),
				'it_detail' => $this->input->post('it_detail'),
				'unit' => $this->input->post('unit'),
				'it_un_id' => $this->input->post('it_un_id'),
				'pro_status' => $this->input->post('pro_status'),
				'pro_name' => $this->input->post('pro_name'),
				'it_img' => $filename
				);
				$query = $this->db->update('item',$data);
				return true;
			}
			else
			{
				$data = array(
				'it_id' => $this->input->post('it_id'),
				'it_name' => $this->input->post('it_name'),
				'it_detail' => $this->input->post('it_detail'),
				'unit' => $this->input->post('unit'),
				'it_un_id' => $this->input->post('it_un_id'),
				'pro_status' => $this->input->post('pro_status'),
				'pro_name' => $this->input->post('pro_name')	
				);
				$query = $this->db->update('item',$data);
				return false;
			}
			
			
		}
		
		public function get_item($cond)
		{
			$sql = "SELECT * 
			FROM $this->item_db
			WHERE 1 $cond";
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		public function delete_item($cound)
		{
		$sql = "DELETE 
		FROM $this->item_db
		WHERE 1 $cound";
		$this->db->query($sql);
		}
		
		public function update_unit_item()
		{
			$sql = "UPDATE $this->item_db 
			SET unit = ?
			WHERE it_id = ? ";
			$this->db->query($sql, array($this->unit,$this->it_id));
		}
		
	}	
?>