<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	include_once("Main_model.php");
?>
<?php
	class Bill_model extends Main_model {
		
		public $bil_id; 
		public $bil_code;
		public $bil_date;
		
		public $last_insert_id;
		
		function insert_bill()
		{
			$sql = "INSERT INTO $this->bill_db(bil_code) 
			VALUES (?)";
			$this->db->query($sql, array($this->bil_code));
			$this->last_insert_id = $this->db->insert_id();
		}
		
		function update_bill()
		{
			$sql = "UPDATE $this->bill_db SET bil_code = ?
			WHERE bil_id = ?";
			$this->db->query($sql, array($this->bil_code,$this->bil_id));
		}
		
		function get_bill($cond)
		{
			$sql = "SELECT *
			FROM $this->bill_db
			WHERE 1 $cond";
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		function get_bill_order($cond)
		{
			$sql = "SELECT * 
					FROM $this->bill_db
					INNER JOIN `$this->order_db`
					ON bil_id = od_bil_id
					INNER JOIN `$this->customer_db`
					ON od_cus_id = cus_id
					INNER JOIN `$this->person_db`
					ON ps_id = cus_ps_id
					INNER JOIN `$this->prefix_db`
					ON pre_id = ps_pre_id
					WHERE 1 $cond";
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		function get_bill_item($cond)
		{
			$sql = "SELECT * 
					FROM $this->bill_db
					INNER JOIN `$this->order_db`
					ON bil_id = od_bil_id
                    INNER JOIN $this->item_db
                    ON it_id = od_it_id
					WHERE 1 $cond";
			$query = $this->db->query($sql);
			return $query->result();
		}
	}	
?>