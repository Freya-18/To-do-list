<?php

class ModelAdmin {
	public function signIn($user) {
		global $dir, $views;
        $_SESSION['role'] = 'admin';
        $_SESSION['login'] = $user->FindByName();

	}
	public function isAdmin() : bool {
		if(isset($_SESSION['login']) && isset($_SESSION['role'])) {
				$role = filter_var($_SESSION['role'], FILTER_SANITIZE_STRING);
				$login = filter_var($_SESSION['login'], FILTER_SANITIZE_STRING);
				return TRUE;
		} else {
			return FALSE;
		}
	}
}

?>