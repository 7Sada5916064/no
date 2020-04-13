<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	include_once("Main_model.php");
?>
<?php
	class Unit_model extends Main_model {
	
		public $un_id;
		public $un_name;
		
		public $last_insert_id;
		
		public function get_unit($cond)
		{
			$sql = "SELECT * 
					FROM $this->unit_db
					WHERE 1";
			$query = $this->db->query($sql);
			return $query->result();
		}
	
	}	
?>