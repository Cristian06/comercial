<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


	class Usuario implements UserInterface, RemindableInterface{

		use UserTrait, RemindableTrait;

		protected $table = 'tblusuario';

		public function getAuthIdentifier(){

			return $this->getKey();
		}

		public function getAuthPassword(){

			return $this->getPassword();
		}

		public function getRememberToken(){

			return $this->remember_token;
		}

		public function setRememberToken($value){

			$this->remember_token = $value;

		}

		public function getRememberTokenName(){

			return 'remember_token';
		}

	}


?>