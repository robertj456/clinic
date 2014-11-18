<?php
Class Patient extends CI_Model {
	
	function findPatient($ramq) {
		
		$sql = "SELECT * from PATIENT where RAMQ_ID = ?";
		$patient = $this->db->query($sql, array($ramq))->row_array();

		if ( count($patient) != 0) {
			// a record was retrieved from the db.	
			return $patient;
		}

		else {
			// no patient found.
			return false;
		}
	}

}
?>