<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class AppSettings extends BaseConfig
{

	// ------------------------------------------------------
	// Informações básicas
	// ------------------------------------------------------



	// ------------------------------------------------------
	// Configurações para envio de e-mail
	// ------------------------------------------------------	
	public $sender_mail = "";
	public $smtp_host	= "";
	public $smtp_port	= "587";
	public $smtp_user	= "";
	public $smtp_pass	= ""; // Senha de Segurança do App, configurada na conta Gmail

	public $smtp_auth = true;	// Quando o envio for autenticado (requer: smtp, por, user e pass na config acima)
	public $smtp_ssl = false;	// Quando necessitar SSL
	public $smtp_tls = true;	// usado quando for dados do gmail


	// Para Desenvolvimento Localhost (uso do desenvolvedor)
	public $mail_debug = false; 
	public $test_localhost = true;














	// ------------------------------------------------------
	// Não alterar estas funcoes abaixo
	// -----------------------------------------------------
	

	public $encryption_hashkey = '$2y$10$hqG1ZogNOo3OSlArQAdYIO1fV0hdAY9nH04fKB640/8AjKcwpWMo.';


	public function getInfosBase()
	{
		$cfg_info_base = [
			'site_name' => $this->SITE_NAME,
			'link_virtualtour' => $this->LINK_VIRTUALTOUR,
			'nome_evento' => $this->NOME_EVENTO,
			'link_evento' => $this->LINK_EVENTO,
			'logo_email' => $this->LOGO_EMAIL,
		];
		return $cfg_info_base;
	}

	public function getInfosSMTP()
	{
		$cfg_info_smpt = [
			"sender_name" => $this->SITE_NAME,
			"sender_mail" => $this->sender_mail,
			"smtp_host" => $this->smtp_host,
			"smtp_port" => $this->smtp_port,
			"smtp_user" => $this->smtp_user,
			"smtp_pass" => $this->smtp_pass,
			"smtp_auth" => $this->smtp_auth,
			"smtp_ssl" => $this->smtp_ssl,
			"smtp_tls" => $this->smtp_tls,
			"mail_debug" => $this->mail_debug,
			"test_localhost" => $this->test_localhost,
		];
		return $cfg_info_smpt;
	}

}
