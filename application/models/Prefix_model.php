<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	include_once("Main_model.php");
?>
<?php
	class Prefix_model extends Main_model {
			
		public $pre_id;
		public $pre_name;
		
		public $last_insert_id;
		
		public function get_prefix($cound)
		{
			$sql = "SELECT * 
					FROM $this->prefix_db
					WHERE 1 $cound";
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		public function insert_prefix()
		{
			$sql = "INSERT INTO $this->prefix_db(pre_name)
					VALUES (?)";
			$this->db->query($sql, array($this->pre_name));
			$this->last_insert_id = $this->db->insert_id();
		}
		
		public function delete_prefix($cound)
		{
			$sql = "DELETE 
					FROM $this->prefix_db
					WHERE 1 $cound";
			$this->db->query($sql);
		}
			
	}	
?>