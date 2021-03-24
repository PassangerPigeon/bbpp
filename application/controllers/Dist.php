<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist extends CI_Controller {	

	public function blank() {
		$data = array(
			'title' => "Blank Page"
		);
		$this->load->view('dist/blank', $data);
	}


	public function auth_forgot_password() {
		$data = array(
			'title' => "Forgot Password"
		);
		$this->load->view('dist/auth-forgot-password', $data);
	}

	public function auth_login() {
		check_session_login();
		$data = array(
			'title' => "Login"
		);
		$this->load->view('dist/auth-login', $data);
	}

	public function auth_register() {
		$data = array(
			'title' => "Register"
		);
		$this->load->view('dist/auth-register', $data);
	}

	public function daftar_sapi() {
		$data = array(
			'title' => "Daftar Sapi"
		);
		$this->load->view('dist/v_daftar_sapi', $data);
	}



}
