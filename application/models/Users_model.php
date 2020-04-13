<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	include_once("Main_model.php");
?>
<?php
	class Users_model extends Main_model {
			
		public $u_id; 
		public $username; 
		public $password; 
		public $created_date;
		
		public $last_insert_id;
		
		public function get_lists()
		{
			$sql = "SELECT * FROM $this->users_db";
			$query = $this->db->query($sql);
			return $query->result();
		}
		public function validate_user()
		{
			$sql = "SELECT * 
					FROM $this->users_db
					INNER JOIN position
					ON u_po_id = po_id
					WHERE username = ? AND password = ?";
			$query = $this->db->query($sql, array($this->username,$this->password));
			//echo $sql;
			return $query->result();
		}
		
		
	}	
?>