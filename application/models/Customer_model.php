<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	include_once("Main_model.php");
?>
<?php
	class Customer_model extends Main_model {
		
		public $cus_id; 
		public $cus_ps_id; 
		public $cus_cut_id;
		
		public $last_insert_id;
		
		public function get_all_customer($cond)
		{
			$sql = "SELECT * 
					FROM $this->customer_db
					INNER JOIN $this->person_db
					ON ps_id = cus_ps_id
					INNER JOIN $this->customer_type_db
					ON cut_id = cus_cut_id
					INNER JOIN $this->prefix_db
					ON pre_id = ps_pre_id
					WHERE 1 $cond";
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		public function insert_customer()
		{
			$sql = "INSERT INTO $this->customer_db(cus_ps_id,cus_cut_id) 
					VALUES (?,?)";
			$this->db->query($sql, array($this->cus_ps_id,$this->cus_cut_id));
			$this->last_insert_id = $this->db->insert_id();
		}
		
		public function delete_customer($cound)
		{
			$sql = "DELETE 
					FROM $this->customer_db
					WHERE 1 $cound";
			$this->db->query($sql);
		}
		
		
		
	}	
?>