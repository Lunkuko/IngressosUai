<?php
namespace App\Controllers;

use CodeIgniter\Controllers; 
use App\Controllers\BaseController;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

//use App\Libraries\PHPMailerLib;
//use App\Libraries\CanvasLibrarie;
//use App\Libraries\MobileDetectLib;
use \DateTime;


class Home extends BaseController
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
		return view('index', $this->data);
	}

	public function login()
	{
		$error_num = 0;
		$error_msg = "";

		if ($this->request->getMethod() == 'post')
		{
			$login_email = $this->request->getPost('login_email');
			$login_senha = $this->request->getPost('login_senha');

			$prosseguir = true;
			$validation =  \Config\Services::validation();

			/*
			 * -------------------------------------------------------------
			 * Validar o preenchimento dos campos básicos
			 * -------------------------------------------------------------
			**/
				if( $prosseguir == true ){
					$validateFields = [
						'login_email' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [
								'required' => 'Preencha corretamente {field}.',
							],
						],
						'login_senha' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [
								'required' => 'Preencha corretamente {field}.',
							],
						],
					];
					$fields_valid = $validation->setRules($validateFields);
					if( $validation->withRequest($this->request)->run() === FALSE )
					{
						$error_num = 1;
						$error_msg = "Por favor, verifique todos os campos e tente novamente.";
						$error_infos[] = $validation->getErrors();
						$prosseguir = false;
					}
				}

			if( $prosseguir == true ){
				$qry_cad = $this->cadMD->where('cad_email', $login_email)
					->where('cad_senha', fct_password_hash($login_senha))
					->limit(1)
					->get();	
				if( $qry_cad && $qry_cad->resultID->num_rows >=1 )
				{
					$rs_cad = $qry_cad->getRow();

					/*
					 * -------------------------------------------------------------
					 * Gera Sessão
					 * -------------------------------------------------------------
					**/
						$ses_data = [
							'cad_id' => $rs_cad->cad_id,
							'cad_nome' => $rs_cad->cad_nome,
							'cad_email' => $rs_cad->cad_email,
							'isLoggedIn' => TRUE
						];
						$session = session();
						$session->set($ses_data);

					$error_num = 0;
					$error_msg = "";

					return $this->response->redirect( site_url('grid') );
				}else{
					$error_num = 1;
					$error_msg = "E-mail ou senha incorretos! Verifique e tente novamente.";
				}
			}

			if( $error_num == 1 ){
				session()->setFlashdata('error_msg', $error_msg);
				return $this->response->redirect( site_url('login') );
			}
		}

		return view('login', $this->data);
	}
	public function logout()
	{
		$session = session();
		$session->destroy();
		return $this->response->redirect( site_url() );
	}

	public function cadastro()
	{
		$error_num = 0;
		$error_msg = "";
		$error_fields = [];

		if ($this->request->getMethod() == 'post')
		{
			$cad_nome = $this->request->getPost('cad_nome');
			$cad_email = $this->request->getPost('cad_email');
			$cad_cpf = $this->request->getPost('cad_cpf');
			$cad_dtenascto = $this->request->getPost('cad_dtenascto');
			$cad_telefone = $this->request->getPost('cad_telefone');
			$cad_cep = $this->request->getPost('cad_cep');
			$cad_endereco = $this->request->getPost('cad_endereco');
			$cad_end_numero = $this->request->getPost('cad_end_numero');
			$cad_end_complemento = $this->request->getPost('cad_end_complemento');
			$cad_bairro = $this->request->getPost('cad_bairro');
			$cad_cidade = $this->request->getPost('cad_cidade');
			$cad_estado = $this->request->getPost('cad_estado');
			$cad_senha = $this->request->getPost('cad_senha');

			$prosseguir = true;
			$validation =  \Config\Services::validation();

			/*
			 * -------------------------------------------------------------
			 * Validar o preenchimento dos campos básicos
			 * -------------------------------------------------------------
			**/
				if( $prosseguir == true ){
					$validateFields = [
						'cad_nome' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [ 'required' => 'Preencha corretamente {field}.' ],
						],
						'cad_email' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [ 'required' => 'Preencha corretamente {field}.' ],
						],
						'cad_cpf' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [ 'required' => 'Preencha corretamente {field}.' ],
						],
						'cad_telefone' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [ 'required' => 'Preencha corretamente {field}.' ],
						],
						'cad_cep' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [ 'required' => 'Preencha corretamente {field}.' ],
						],
						'cad_endereco' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [ 'required' => 'Preencha corretamente {field}.' ],
						],
						'cad_end_numero' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [ 'required' => 'Preencha corretamente {field}.' ],
						],
						'cad_bairro' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [ 'required' => 'Preencha corretamente {field}.' ],
						],
						'cad_cidade' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [ 'required' => 'Preencha corretamente {field}.' ],
						],
						'cad_estado' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [ 'required' => 'Preencha corretamente {field}.' ],
						],
						'cad_senha' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [ 'required' => 'Preencha corretamente {field}.' ],
						],
					];
					$fields_valid = $validation->setRules($validateFields);
					if( $validation->withRequest($this->request)->run() === FALSE )
					{
						$error_num = 1;
						$error_msg = "Por favor, verifique todos os campos e tente novamente.";
						$error_fields[] = $validation->getErrors();
						$prosseguir = false;
					}
				}


			if( $prosseguir == true ){
				helper('text');

				$data_db = [
					'cad_hashkey' => md5(date("Y-m-d H:i:s") ."-". random_string('alnum', 16)),
					'cad_urlpage' => url_title( convert_accented_characters($cad_nome), '-', TRUE ),
					'cad_nome' => $cad_nome,
					'cad_email' => $cad_email,
					'cad_senha' => fct_password_hash($cad_senha),
					//'cad_dtenascto' => $cad_dtenascto,
					'cad_cpf' => $cad_cpf,
					'cad_telefone' => $cad_telefone,
					'cad_cep' => $cad_cep,
					'cad_endereco' => $cad_endereco,
					'cad_end_numero' => $cad_end_numero,
					'cad_end_complemento' => $cad_end_complemento,
					'cad_bairro' => $cad_bairro,
					'cad_cidade' => $cad_cidade,
					'cad_estado' => $cad_estado,
					'cad_dte_cadastro' => date("Y-m-d H:i:s"),
					'cad_dte_alteracao' => date("Y-m-d H:i:s"),
				];

				$queryCad = $this->cadMD->where('cad_email', $cad_email)->get();
				if( $queryCad && $queryCad->resultID->num_rows >= 0 )
				{
					$cad_id = $this->cadMD->insert($data_db);

					$ses_data = [
						'cad_id' => $cad_id,
						'cad_nome' => $cad_nome,
						'cad_email' => $cad_email,
						'isLoggedIn' => TRUE
					];
					$session = session();
					$session->set($ses_data);

					return $this->response->redirect( site_url('grid') );
				}else{
					return $this->response->redirect( site_url('cadastro') );
				}
			}else{
				session()->setFlashdata('error_msg', $error_msg);
				session()->setFlashdata('error_fields', $this->request->getPost());
				return $this->response->redirect( site_url('cadastro') );	
			}

		}
		return view('cadastro', $this->data);
	}

	public function finalizar()
	{
		return view('finalizar', $this->data);
	}

	public function grid()
	{
		$this->data['rs_eventos'] = $this->evtoMD->get();
		return view('grid', $this->data);
	}

	public function escolha_ingresso($evto_urlpage, $evto_id)
	{
		if ( !session()->get('isLoggedIn') ) 
		{
			return redirect()->to( site_url('login') );
		}


		if ($this->request->getMethod() == 'post')
		{
			helper('text');

			$_evto_id = $this->request->getPost('evto_id');
			$ting_id = $this->request->getPost('ting_id');
			$ting_qtde = $this->request->getPost('ting_qtde');

			foreach ($ting_id as $key => $val) {
				if( (int)$ting_qtde[$val] > 0 ){
					$this->cartMD->set('cart_hashkey', md5(date("Y-m-d H:i:s") ."-". random_string('alnum', 16)));
					$this->cartMD->set('cad_id', (int)session()->get('cad_id'));
					$this->cartMD->set('evto_id', $_evto_id);
					$this->cartMD->set('ting_id', (int)$val);
					$this->cartMD->set('cart_quant', (int)$ting_qtde[$val]);
					$this->cartMD->set('cart_dte_cadastro', date("Y-m-d H:i:s"));
					$this->cartMD->set('cart_dte_alteracao', date("Y-m-d H:i:s"));
					$cart_id = $this->cartMD->insert();
				}
			}

			return $this->response->redirect( site_url('carrinho') );
			exit();
		}

		$this->data['rs_tipo_ingresso'] = $this->tingMD->get();

		if( !empty($evto_urlpage) && !empty($evto_id) ){
			
			$query = $this->evtoMD->where('evto_urlpage', $evto_urlpage)
				->where('evto_id', (int)$evto_id)
				->limit(1)
				->get();
			if( $query && $query->resultID->num_rows >= 1 )
			{
				$this->data['rs_evento'] = $query->getRow();
			}

			return view('escolha-ingresso', $this->data);
		}else{
			return $this->response->redirect( site_url('grid') );
		}
	}

	public function excluir_ingresso($cart_hashkey)
	{
		if ( !session()->get('isLoggedIn') || empty($cart_hashkey) ) 
		{
			return redirect()->to( site_url('login') );
		}

		$this->cartMD->where('cart_hashkey', $cart_hashkey);
		$this->cartMD->where('cad_id', (int)session()->get('cad_id'));
		$this->cartMD->delete();

		return $this->response->redirect( site_url('carrinho') );
		exit();
	}

	public function carrinho()
	{
		if ( !session()->get('isLoggedIn') ) 
		{
			return redirect()->to( site_url('login') );
		}

		$this->cartMD->from('tbl_carrinho CART', true);
		$this->cartMD->select('CART.cart_hashkey, CART.cart_quant');
		$this->cartMD->select('TING.ting_titulo, TING.ting_urlpage, TING.ting_vlr_ingresso, TING.ting_vlr_servico, TING.ting_qtd_ingressos');
		$this->cartMD->select('EVTO.*');
		$this->cartMD->join('tbl_eventos EVTO', 'EVTO.evto_id = CART.evto_id', 'INNER');
		$this->cartMD->join('tbl_tipo_ingresso TING', 'TING.ting_id = CART.ting_id', 'INNER');
		$this->cartMD->where('CART.cad_id', (int)session()->get('cad_id'));
		$this->cartMD->orderBy('CART.cart_id', 'ASC');
		$this->data['rs_carrinho'] = $this->cartMD->get();

		return view('carrinho', $this->data);
	}

	public function documentacao()
	{
		return view('documentacao', $this->data);
	}

	public function minha_conta()
	{
		
		$this->data["nome"] = "Marcio";

		return view('minha_conta', $this->data);
	}


	public function inserir()
	{
		helper('text');

		//$arr_insert_tipos = [
		//	[
		//		"titulo"=> "Pacote", 
		//		"descricao"=> "Pacote (4 ingressos) por R$ 80,00 + Serviço: R$ 8,00", 
		//		"valor"=> 80, 
		//		"servico"=> 8, 
		//	],	
		//	[
		//		"titulo"=> "Inteira", 
		//		"descricao"=> "Ingresso por R$ 25,00 + Serviço: R$ 2,50", 
		//		"valor"=> 25, 
		//		"servico"=> 2.50, 
		//	],
		//	[
		//		"titulo"=> "Meia", 
		//		"descricao"=> "Ingresso por R$ 12,50 + Serviço: R$ 1,25", 
		//		"valor"=> 12.5, 
		//		"servico"=> 1.25, 
		//	],
		//];
		//foreach ($arr_insert_tipos as $chave => $valor) {
		//	// $arr[3] será atualizado com cada valor de $arr...
		//	//echo "{$chave} => {$valor} ";

		//	$ting_titulo = $valor['titulo'];
		//	$ting_descricao = $valor['descricao'];
		//	$ting_vlr_ingresso = $valor['valor'];
		//	$ting_vlr_servico = $valor['servico'];

		//	echo '<br >'. $titulo;

		//	//print_r($arr);
		//	$data_db_tipo = [
		//		'ting_hashkey' => md5(date("Y-m-d H:i:s") ."-". random_string('alnum', 16)),
		//		'ting_urlpage' => url_title( convert_accented_characters($ting_titulo), '-', TRUE ),
		//		'ting_titulo' => $ting_titulo,
		//		'ting_descricao' => $ting_descricao,
		//		'ting_vlr_ingresso' => $ting_vlr_ingresso,
		//		'ting_vlr_servico' => $ting_vlr_servico,
		//		'ting_dte_cadastro' => date("Y-m-d H:i:s"),
		//		'ting_dte_alteracao' => date("Y-m-d H:i:s"),
		//	];

		//	$queryTipo = $this->tingMD->where('ting_titulo', $ting_titulo)->get();
		//	if( $queryTipo && $queryTipo->resultID->num_rows >= 0 )
		//	{
		//		$this->tingMD->insert($data_db_tipo);
		//	}
		//}



		$arr_insert_eventos = [
			[
				"titulo"=> "Music Bar Festival", 
				"local"=> "Ipatinga - Vila Prime", 
				"data"=> '22/11/2022', 
				"horario"=> '21:00h', 
				"imagem"=> '06.jpg',
			],	
			[
				"titulo"=> "Canção dos Ventos", 
				"local"=> "Ipaba - Praça", 
				"data"=> '20/11/2022', 
				"horario"=> '20:00h', 
				"imagem"=> '07.jpg',
			],
			[
				"titulo"=> "Juventude Musical Arena", 
				"local"=> "Ipaba - Escritório House", 
				"data"=> '20/11/2022', 
				"horario"=> '20:30h',
				"imagem"=> '08.jpg',
			],
			[
				"titulo"=> "House Britanic Cover", 
				"local"=> "Coronel Fabriciano Rota Fast Food", 
				"data"=> '19/11/2022', 
				"horario"=> '19:00h', 
				"imagem"=> '09.jpg',
			],
			[
				"titulo"=> "Sintonia e Melodia", 
				"local"=> "Isabela's House", 
				"data"=> '20/11/2022', 
				"horario"=> '20:00h', 
				"imagem"=> '10.jpg',
			],
		];
		foreach ($arr_insert_eventos as $chave => $valor) {
			$evto_titulo = $valor['titulo'];
			$evto_descricao = $valor['local'];
			//$evto_dte_evento = $valor['data'];
			$evto_hour_evento = $valor['horario'];
			$evto_imagem = $valor['imagem'];

			$data_db_evto = [
				'evto_hashkey' => md5(date("Y-m-d H:i:s") ."-". random_string('alnum', 16)),
				'evto_urlpage' => url_title( convert_accented_characters($evto_titulo), '-', TRUE ),
				'evto_titulo' => $evto_titulo,
				'evto_descricao' => $evto_descricao,
				'evto_dte_evento' => $evto_dte_evento,
				'evto_hour_evento' => $evto_hour_evento,
				'evto_imagem' => $evto_imagem,
				'evto_dte_cadastro' => date("Y-m-d H:i:s"),
				'evto_dte_alteracao' => date("Y-m-d H:i:s"),
			];

			$queryEVTO = $this->evtoMD->where('evto_titulo', $evto_titulo)->get();
			if( $queryEVTO && $queryEVTO->resultID->num_rows >= 0 )
			{
				$this->evtoMD->insert($data_db_evto);
			}
		}
	}


	public function ajaxform( $action = "" )
	{
		$error_num = "1";
		$error_msg = "Erro inesperado";
		$error_infos = [];
		$redirect = "";

		switch ($action) {
		case "LOGIN" :

			$prosseguir = true;
			$validation =  \Config\Services::validation();

			$cad_nome = $this->request->getPost('nome');
			$cad_email = $this->request->getPost('email');

			$error_infos[] = $this->request->getPost();


			/*
			 * -------------------------------------------------------------
			 * Validar o preenchimento dos campos básicos
			 * -------------------------------------------------------------
			**/
				// verificar o campo de e-mail
				if( $prosseguir == true ){
					$validateFields = [
						'email' => [ 'label' => 'email', 'rules' => 'required|valid_email',
							'errors' => [
								'required' => 'Preencha corretamente {field}.',
								'valid_email' => 'O {field} informado é inválido.',
							],
						],
					];
					$fields_valid = $validation->setRules($validateFields);
					if( $validation->withRequest($this->request)->run() === FALSE )
					{
						$error_num = 1;
						$error_msg = "Por favor, verifique o campo e-mail.";
						$error_infos[] = $validation->getErrors();
						$prosseguir = false;
					}
				}

				// verificar os demais campos do formulário
				if( $prosseguir == true ){
					$validateFields = [
						'nome' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [
								'required' => 'Preencha corretamente {field}.',
							],
						],
					];
					$fields_valid = $validation->setRules($validateFields);
					if( $validation->withRequest($this->request)->run() === FALSE )
					{
						$error_num = 1;
						$error_msg = "Por favor, verifique todos os campos e tente novamente.";
						$error_infos[] = $validation->getErrors();
						$prosseguir = false;
					}
				}
			
			/*
			 * -------------------------------------------------------------
			 * Todas validações ok! Gravar no banco de dados
			 * -------------------------------------------------------------
			**/
				$prosseguir_x = false;
				if( $prosseguir == true ){
					$qry_cad = $this->cadMD->where('cad_email', $cad_email)
						//->where('usr_senha', $senha)
						->limit(1)
						->get();	
						//->first();
					
					if( $qry_cad && $qry_cad->resultID->num_rows >=1 )
					{
						$rs_cad = $qry_cad->getRow();

						/*
						 * -------------------------------------------------------------
						 * Gera Sessão
						 * -------------------------------------------------------------
						**/
							$ses_data = [
								'cad_id' => $rs_cad->cad_id,
								'cad_nome' => $rs_cad->cad_nome,
								'cad_email' => $rs_cad->cad_email,
								'isLoggedIn' => TRUE
							];
							$session = session();
							$session->set($ses_data);

						$error_num = 0;
						$error_msg = "Login executado com sucesso!<br />Por favor aguarde!";
						$redirect = site_url('dashboard');
					}

					/*
					 * -------------------------------------------------------------
					 * log de acesso
					 * -------------------------------------------------------------
					**/
						$fields_log['log_ip'] = $_SERVER['REMOTE_ADDR'];
						$fields_log['log_tipo'] = "novo-cadastro";
						$fields_log['cad_id'] = (int)$cad_id;
						//$this->logMD->save_log($fields_log);
				}

			$arr_return = array(
				"error_num" => $error_num,
				"error_msg" => $error_msg,
				"error_infos" => json_encode($error_infos),
				"redirect" => $redirect
			);

			echo( json_encode($arr_return) );
			exit();

		break;
		case "CADASTRO" :

			$prosseguir = true;
			$validation =  \Config\Services::validation();

			$cad_nome = $this->request->getPost('nome');
			$cad_email = $this->request->getPost('email');
			
			$cad_cpf = $this->request->getPost('cpf');
			$cad_celular = $this->request->getPost('celular');
			$cad_dtenascto = $this->request->getPost('dtenascto');
			$cad_empresa = $this->request->getPost('empresa');
			$cad_cnpj = $this->request->getPost('cnpj');
			$cad_website = $this->request->getPost('website');
			$cad_cargo = $this->request->getPost('cargo');
			$cad_cidade = $this->request->getPost('cidade');
			$cad_estado = $this->request->getPost('estado');
			$cad_pais = $this->request->getPost('pais');

			$cad_segmento = $this->request->getPost('segmento');
			$cad_setor_interesse = $this->request->getPost('setor_interesse');
			$cad_interesse_outro = $this->request->getPost('interesse_outro');
			$cad_proc_compras = $this->request->getPost('proc_compras');
			$cad_motiv_part = $this->request->getPost('motiv_part');

			$cad_privacidade = $this->request->getPost('chk_privacidade');

			$error_infos[] = $this->request->getPost();

			/*
			 * -------------------------------------------------------------
			 * Validar o preenchimento dos campos básicos
			 * -------------------------------------------------------------
			**/
				// verificar os campos de e-mail, se são idênticos
				if( $prosseguir == true ){
					$validateFields = [
						'email' => [ 'label' => 'email', 'rules' => 'required|valid_email',
							'errors' => [
								'required' => 'Preencha corretamente {field}.',
								'valid_email' => 'O {field} informado é inválido.',
							],
						],
					];
					$fields_valid = $validation->setRules($validateFields);
					if( $validation->withRequest($this->request)->run() === FALSE )
					{
						$error_num = 1;
						$error_msg = "Por favor, verifique o campo e-mail.";
						$error_infos[] = $validation->getErrors();
						$prosseguir = false;
					}
				}

				// verificar os demais campos do formulário
				if( $prosseguir == true ){
					$validateFields = [
						'nome' => [ 'label' => 'nome', 'rules' => 'required',
							'errors' => [
								'required' => 'Preencha corretamente {field}.',
							],
						],
						'empresa' => [ 'label' => 'empresa', 'rules' => 'required',
							'errors' => [
								'required' => 'Preencha corretamente {field}.',
							],
						],
						'cnpj' => [ 'label' => 'cnpj', 'rules' => 'required',
							'errors' => [
								'required' => 'Preencha corretamente {field}.',
							],
						],
						'celular' => [ 'label' => 'celular', 'rules' => 'required',
							'errors' => [
								'required' => 'Preencha corretamente {field}.',
							],
						],
					];
					$fields_valid = $validation->setRules($validateFields);
					if( $validation->withRequest($this->request)->run() === FALSE )
					{
						$error_num = 1;
						$error_msg = "Por favor, verifique todos os campos e tente novamente.";
						$error_infos[] = $validation->getErrors();
						$prosseguir = false;
					}
				}

			/*
			 * -------------------------------------------------------------
			 * Verificamos se o E-mail já existe no banco de dados
			 * -------------------------------------------------------------
			**/
				if( $prosseguir == true ){
					$qry_cad = $this->cadMD->where('cad_email', $cad_email)
						->limit(1)
						->get();
					if( $qry_cad && $qry_cad->resultID->num_rows >= 1 )
					{
						$error_num = 1;
						$error_msg = "O E-mail informado já foi registrado!";
						$error_infos[] = "O E-mail informado já foi registrado!";
						$prosseguir = false;
					}
				}
			
			/*
			 * -------------------------------------------------------------
			 * Todas validações ok! Gravar no banco de dados
			 * -------------------------------------------------------------
			**/
				$prosseguir_x = false;
				if( $prosseguir == true ){
					$cad_id = 0;

					helper('text');
					$cad_hashkey = md5(date("Y-m-d H:i:s") ."-". random_string('alnum', 16));
					$data_db = [
						'cad_hashkey' => $cad_hashkey,
						'cad_urlpage' => url_title( convert_accented_characters($cad_nome), '-', TRUE ),
						'cad_nome' => $cad_nome,
						'cad_email' => $cad_email,
						'cad_cpf' => $cad_cpf,
						'cad_celular' => $cad_celular,
						'cad_dtenascto' => fct_date2bd($cad_dtenascto),
						'cad_empresa' => $cad_empresa,
						'cad_cnpj' => $cad_cnpj,
						'cad_website' => $cad_website,
						'cad_cargo' => $cad_cargo,
						'cad_cidade' => $cad_cidade,
						'cad_estado' => $cad_estado,
						'cad_pais' => $cad_pais,

						'cad_segmento' => $cad_segmento,
						'cad_motiv_part' => $cad_motiv_part,
						'cad_proc_compras' => $cad_proc_compras,
						'cad_setor_interesse' => $cad_setor_interesse,
						'cad_interesse_outro' => $cad_interesse_outro,

						'cad_privacidade' => (($cad_privacidade==true) ? 1 : 0),
						'cad_dte_cadastro' => date("Y-m-d H:i:s"),
						'cad_dte_alteracao' => date("Y-m-d H:i:s"),
					];
					$cad_id = $this->cadMD->insert($data_db);

					/*
					 * -------------------------------------------------------------
					 * Gera Sessão
					 * -------------------------------------------------------------
					**/
						$ses_data = [
							'cad_id' => $cad_id,
							'cad_nome' => $cad_nome,
							'cad_email' => $cad_email,
							'isLoggedIn' => TRUE
						];
						$session = session();
						$session->set($ses_data);

					/*
					 * -------------------------------------------------------------
					 * log de acesso
					 * -------------------------------------------------------------
					**/
						$fields_log['log_ip'] = $_SERVER['REMOTE_ADDR'];
						$fields_log['log_tipo'] = "novo-cadastro";
						$fields_log['cad_id'] = (int)$cad_id;
						//$this->logMD->save_log($fields_log);

					/*
					 * -------------------------------------------------------------
					 * enviando email após cadastro
					 * -------------------------------------------------------------
					**/
						$cfg_info_base = $this->cfg->getInfosBase();
						$site_name = (isset($cfg_info_base["site_name"]) ? $cfg_info_base["site_name"] : "");

						$cfgCargo = $this->cfg->getCargo();
						$cfgMotivPart = $this->cfg->getMotivPart();
						$cfgProcCompras = $this->cfg->getProcCompras();
						$cfgSetorInteresse = $this->cfg->getSetorInteresse();

						$strCargo = (isset($cfgCargo[$cad_cargo]) ? $cfgCargo[$cad_cargo] : "");
						//$strMotivPart = (isset($cfgMotivPart[$cad_motiv_part]) ? $cfgMotivPart[$cad_motiv_part] : "");
						$strProcCompras = (isset($cfgProcCompras[$cad_proc_compras]) ? $cfgProcCompras[$cad_proc_compras] : "");
						$strSetorInteresse = (isset($cfgSetorInteresse[$cad_setor_interesse]) ? $cfgSetorInteresse[$cad_setor_interesse] : "");

						$data_fields = array(
							'site_name' => $site_name,
							'cad_nome' => $cad_nome,
							'cad_email' => $cad_email,
							'cad_cpf' => $cad_cpf,
							'cad_celular' => $cad_celular,
							'cad_empresa' => $cad_empresa,
							'cad_cnpj' => $cad_cnpj,
							'cad_website' => $cad_website,
							'cad_cargo' => $strCargo,
							'cad_cidade' => $cad_cidade,
							'cad_estado' => $cad_estado,
							'cad_pais' => $cad_pais,
							'cad_segmento' => $cad_segmento,
							'cad_motiv_part' => $cad_motiv_part,
							'cad_proc_compras' => $strProcCompras,
							'cad_setor_interesse' => $strSetorInteresse,
							'cad_interesse_outro' => $cad_interesse_outro,
						);
						$stringEmail = view('emails/cadastro-view', $data_fields);

						$enviar_para = array( $cad_email );
						$args_email = array(
							"body"			=> $stringEmail,
							"subject"		=> "Cadastro",
							"fields"		=> [],
							"enviar_para"	=> $enviar_para,
							"anexos"		=> [],
						);
						$pMail = new PHPMailerLib();
						$pMail->send($args_email);
					// -------------------------------------------------------------

					$error_num = 0;
					$error_msg = "Cadastro realizado com sucesso!<br />Por favor aguarde!";
					$redirect = site_url('dashboard');
				}

			$arr_return = array(
				"error_num" => $error_num,
				"error_msg" => $error_msg,
				"error_infos" => json_encode($error_infos),
				"redirect" => $redirect
			);

			echo( json_encode($arr_return) );
			exit();

		break;
		case "SAVE-LOGS" :
			//$fields['log_tipo'] = $this->input->post('log_tipo');
			$fields['log_tipo'] = $this->request->getPost('log_tipo');
			$fields['cad_id'] = session()->get('usr_id');

			$json = self::save_log($fields);
		break;
		}
	}




	public function save_log( $fields ){
		$dataR = array();

		//$url_evento = $this->config->item('url_base_evento');
		$log_tipo = (isset($fields['log_tipo']) ? $fields['log_tipo'] : "");
		$cad_id = (isset($fields['cad_id']) ? $fields['cad_id'] : "");
		$cad_id = (int)$cad_id;

		$log_ip = "";
		$ip_remoto = "";
		if (isset($_SERVER['REMOTE_ADDR'])){
			$ip_remoto = $_SERVER['REMOTE_ADDR'];
		}
		if (!empty( $_SERVER['HTTP_CLIENT_IP'])) {
			$log_ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'])) {
			//to check ip passed from proxy
			$log_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$log_ip = $_SERVER['REMOTE_ADDR'];
		}

		$log_infos_server = array(
			"user_agent" => $_SERVER['HTTP_USER_AGENT'],
		);

		$log_fields = (isset($fields) ? $fields : array());

		$data_db = [
			'cad_id' => $cad_id,
			'log_url' => '',
			'log_ip' => $log_ip,
			'log_tipo' => $log_tipo,
			'log_infos_server' => json_encode($log_infos_server),
			'log_fields' => json_encode($log_fields),
			'log_dte_cadastro' => date("Y-m-d H:i:s"),
			'log_dte_alteracao' => date("Y-m-d H:i:s"),
		];
		$cad_id = $this->logMD->insert($data_db);

		return $dataR;	
	}

}
