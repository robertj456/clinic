<?php
Class User extends CI_Model {
	
	function login($username, $password) {
		$this -> db -> select('user_id', 'user_name', 'hashed_password', 'invalid_login', 'reception', 'triage', 'nurse', 'admin');
		$this -> db -> from('user');
		$this -> db -> where('user_name', $username);
		
		$query = $this -> db -> get();
		$result = $query->result();
		
		return var_dump($result);
		
		//return (password_verify($password, $returnedPassword));
	}
}

?>