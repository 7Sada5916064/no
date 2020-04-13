<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	include_once("Main_model.php");
?>
<?php
	class Customer_type_model extends Main_model {
		
		public $cut_id; 
		public $cus_name;
		
		public $last_insert_id;
		
		public function insert_customer_type()
		{
			$sql = "INSERT INTO $this->customer_type_db(cut_name) 
					VALUES (?)";
			$this->db->query($sql, array($this->cus_name));
			$this->last_insert_id = $this->db->insert_id();
		}
		
		public function delete_customer_type($cound)
		{
			$sql = "DELETE 
					FROM $this->customer_type_db
					WHERE 1 $cound";
			$this->db->query($sql);
		}
		
		public function get_customer_type($cound)
		{
			$sql = "SELECT * 
					FROM $this->customer_type_db
					WHERE 1 $cound";
			$query = $this->db->query($sql);
			return $query->result();
		}
		
	}	
?>