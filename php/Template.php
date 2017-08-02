<?php

class Template extends SQL {

	private $user;

	public function __construct($User) {
		$this->user = $User;
	}

	public function load() {
		if(!$this->user->is_loggedin()) {
			include 'templates/login.php';
			return;
		}

		$site = $_GET['site'];
		if(empty($site)) {
			$site = 'profile';
		}

		$User = $this->user;
		include 'templates/'.$site.'.php';
	}
}