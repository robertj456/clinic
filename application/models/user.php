<?php
Class User extends CI_Model {
	
	function login($username, $password) {
		$valid = false;
		
		$sql = "SELECT * from USER where user_name = ?";
		
		$login = $this->db->query($sql, array($username))->row_array();
		
		if ( count($login) != 0) {
			$valid = password_verify($password, $login['HASHED_PASSWORD']);
			if (!$valid) {
				return false;
			}
			return $login;
		}
	
		return false;
	}

}
?>