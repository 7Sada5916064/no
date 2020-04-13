<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	include_once("Main_model.php");
?>
<?php
	class Order_model extends Main_model {
	
		public $od_id; 
		public $od_u_create_id;
		public $od_cus_id;
		public $od_it_id;
		public $od_per_unit;
		public $od_unit;
		public $od_net;
		public $od_bil_id;
		
		public $last_insert_id;
	
		public function insert_order()
		{
			$sql = "INSERT INTO `$this->order_db`(od_u_create_id,od_cus_id,od_it_id,od_per_unit,od_unit,od_net,od_bil_id)
					VALUES (?,?,?,?,?,?,?)";
			$this->db->query($sql, array($this->od_u_create_id,$this->od_cus_id,$this->od_it_id,$this->od_per_unit,$this->od_unit,$this->od_net,$this->od_bil_id));
			$this->last_insert_id = $this->db->insert_id();
		}
		
	}	
?>