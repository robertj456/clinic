<?php
Class User extends CI_Model {
	
	function login($username, $password) {
		$valid = false;
		
		$sql = "SELECT hashed_password from USER where user_name = ?";
		
		$login = $this->db->query($sql, array($username))->row_array();
		
		if ( count($login) === 1) {
		
			if ($password === $login['hashed_password']) {
				$valid = true;
				}
		}
	
		return $valid;
	}

}
?>