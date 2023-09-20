<?php
namespace App\Controllers;

use CodeIgniter\Controllers; 
use App\Controllers\BaseController;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use \DateTime;


class Noticias extends BaseController
{

	protected $cadMD = null;
	protected $logMD = null;
	protected $cfg = null;
	protected $folderFotos = null;

	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
		parent::initController($request, $response, $logger);

		// Load the model
		$this->cadMD = new \App\Models\CadastrosModel();
		$this->tingMD = new \App\Models\TipoIngressoModel();
		$this->evtoMD = new \App\Models\EventosModel();
		$this->cartMD = new \App\Models\CarrinhoModel();
		$this->cfg = new \Config\AppSettings();

		$this->folderFotos = 'assets/images/';
		$this->data['folderFotos'] = $this->folderFotos;
    }

	public function index()
	{
		return view('noticias/index-noticias', $this->data);
	}

	public function colunas()
	{
		return view('noticias-colunas', $this->data);
	}

}
