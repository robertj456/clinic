<?php
Class User extends CI_Model {
	
	function login($username, $password) {
		$sql = "SELECT hashed_password from USER where user_name = ?";
		$login = $this->db->query($sql, array($username))->result();
		
		return var_dump($login);
		
		//return (password_verify($password, $returnedPassword));
	}
}

?>