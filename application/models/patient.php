<?php
Class Patient extends CI_Model {
	
	function findPatient($ramq) {
		
		$sql = "SELECT * from USER where user_name = ?";
		$patient = $this->db->query($sql, array($ramq))->row_array();

		if ( count($patient) != 0) {
			// a record was retrieved from the db.	
			return $patient;
		}

		else {
			return false;
		}
	}

}
?>