<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	include_once("Main_model.php");
?>
<?php
	class Gender_model extends Main_model {
	
		public $ge_id; 
		public $ge_name;
		
		public $last_insert_id;
		
		public function get_gender($cound)
		{
			$sql = "SELECT * 
					FROM $this->gender_db
					WHERE 1 $cound";
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		public function insert_gender()
		{
			$sql = "INSERT INTO $this->gender_db(ge_name) 
					VALUES (?)";
			$this->db->query($sql, array($this->ge_name));
			$this->last_insert_id = $this->db->insert_id();
		}
		
		public function delete_gender($cound)
		{
			$sql = "DELETE 
					FROM $this->gender_db
					WHERE 1 $cound";
			$this->db->query($sql);
		}
	
	}	
?>