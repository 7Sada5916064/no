<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	include_once("Main_model.php");
?>
<?php
	class Person_model extends Main_model {
	
		public $ps_id;
		public $ps_pre_id;
		public $fist_name;
		public $last_name;
		public $ps_ge_id;
		public $address;
		
		public $last_insert_id;
		
		public function insert_person()
		{
			$sql = "INSERT INTO $this->person_db(ps_pre_id,fist_name,last_name,ps_ge_id,address) 
					VALUES (?,?,?,?,?)";
			$this->db->query($sql,array($this->ps_pre_id,$this->fist_name,$this->last_name,$this->ps_ge_id,$this->address));
			$this->last_insert_id = $this->db->insert_id();
		}
	
	}	
?>