<?php
Class User extends CI_Model {
	
	function login($username, $password) {
		
		$sql = "SELECT * from USER where user_name = ?";
		
		$login = $this->db->query($sql, array($username))->row_array();
		
		if ( count($login) != 0) {
			// a record was retrieved from the db.	
			
			$passValid = password_verify($password, $login['HASHED_PASSWORD']);
			$loginState = $this->incrementInvalidLogin($login['USER_ID'], $login['INVALID_LOGIN']);
			
			if (!$passValid || !$loginState) {
				return false;
			}
			return $login;
		}
	
		return false;
	}
	
	/*
	 * Returns false if counter is at or above 5, else returns true and increments
	 * the invalid login in the user table.
	 */
		private function incrementInvalidLogin($userId, $invalidCount) {
		
		if ($invalidCount >= 5) {
			return false;
		}
		
		$invalidCount++;
		
		$data = array(
			'invalid_login' => $invalidCount
			);
		$this->db->where('user_id', $userId);
		$this->db->update('user', $data);
		
		return true;
	}

}
?>