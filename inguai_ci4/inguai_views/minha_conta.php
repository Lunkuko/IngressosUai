<?php $time = time(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo(base_url()); ?>/" />
	<meta name="theme-color" content="#1783b9"/>
	<meta charset="utf-8" />
	<title>Ingressos UAI</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<meta name="author" content="Misterlab - (11) 94891-9736 - marcio.misterlab@gmail.com" />
	<meta name="description" content="" />

	<link rel="shortcut icon" href="<?php echo(base_url('assets/images/favicon.png')); ?>">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="assets/js/jquery.mousewheel.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<!-- FONT-AWESOME -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	<script src="assets/js/jQuery-Mask-Plugin/dist/jquery.mask.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="assets/js/app_plugins.js"></script>

	<link type="text/css" rel="stylesheet" href="assets/css/style.css?t=<?= $time ?>">
	<link type="text/css" rel="stylesheet" href="assets/css/responsive.css?t=<?= $time ?>">
</head>
<body class="bg-blue-gradient">
	<div id="app" class="pb-5">
		<main>
			<div class="container-fluid container-fluid-mr" style="position: relative; padding-top:15px;">
				<div class="row justify-content-start align-items-start">
					<div class="col-3" style="position: relative;">

					</div>
					<div class="col-8">

						Minha conta <?php echo($nome); ?>

						<div class="card card_docs" id="INICIO">
							<h3>Informações Sobre o Projeto</h3>

							<p>O projeto consiste na venda de ingressos para eventos/shows, visando toda estrutura por parte do usuário desde o cadastro, exibição das informações do eventos e a compra dos ingressos ou reserva (quando for gratuito) e o carrinho de compras com os ingressos adquiridos.</p>
						</div>

						<div  class="card card_docs" id="INFO-BASICAS">
							<h3>Informações Básicas</h3>
							<ul>
								<li>Linguagem: PHP</li>
								<li>FrameWorks: 
									<div>
										<strong>(PHP)CodeIgniter : Versão 4 </strong>
										<p>CodeIgniter é um Application Development Framework - um kit de ferramentas - para pessoas que constroem sites usando PHP. Seu objetivo é permitir que você desenvolva projetos muito mais rápido do que se estivesse escrevendo código do zero, fornecendo um rico conjunto de bibliotecas para tarefas comumente necessárias, bem como uma interface simples e estrutura lógica para acessar essas bibliotecas.</p>

										<p>O CodeIgniter é baseado no padrão de desenvolvimento Model-View-Controller (MVC). MVC é uma abordagem de software que separa a lógica do aplicativo da apresentação. Na prática, permite que suas páginas da Web contenham scripts mínimos, pois a apresentação é separada do script PHP.</p>
									</div>
									<div>(CSS)Boostrap 5</div>
									<div>(JS)Jquery 3.1.1 </div>
								</li>
								<li>Banco de Dados: MySQL (MariaDB)</li>
							</ul>
						</div>

						<div class="card card_docs"id="DESIGN-PATTERN">
							<h3>Design Pattern</h3>

							<p>No framework CodeIgniter podemos encontrar</p>
							<ul>
								<li>
									<strong>Factory Method</strong>
									<p>O padrão Factory Method define uma interface ou estrutura abstrata para criação de um objeto, sem expor a lógica de criação do objeto para o cliente, e retorna uma referência para o novo objeto, usando uma interface comum.</p>
								</li>
								<li>
									<strong>Decorator</strong>
									<p>Decorator é um padrão de projeto de software que permite adicionar um comportamento a um objeto já existente em tempo de execução, ou seja, agrega dinamicamente responsabilidades adicionais a um objeto. Decorators oferecem uma alternativa flexível ao uso de herança para estender uma funcionalidade, com isso adiciona-se uma responsabilidade ao objeto e não à classe.</p>
								</li>
								<!-- <li> -->
								<!-- 	<strong>Front Controller</strong> -->
								<!-- 	<p>O padrão Front Controller é quando você tem um único ponto de entrada para sua aplicação web (ex. index.php)</p> -->
								<!-- </li> -->
								<li>
									<strong>Singleton</strong>
									<p>O padrão de projeto Singleton é um padrão criacional, cujo objetivo é criar apenas uma instância de uma classe e fornecer apenas um ponto global de acesso àquele objeto</p>
								</li>	
							</ul>
						</div>

						<div class="card card_docs" id="BANCO-DE-DADOS">
							<h3>Banco de Dados</h3>

							<p>O MySQL é um sistema gerenciador de banco de dados relacional de código aberto usado na maioria das aplicações gratuitas para gerir suas bases de dados. O serviço utiliza a linguagem SQL (Structure Query Language – Linguagem de Consulta Estruturada), que é a linguagem mais popular para inserir, acessar e gerenciar o conteúdo armazenado num banco de dados.</p>

							<strong>Tabelas Utilizadas</strong>
							<ul>
								<li>
									<strong>tbl_cadastros</strong>
									<p>Campos relacionados ao cadastros dos usuários</p>
								</li>
								<li>
									<strong>tbl_eventos</strong>
									<p>Campos relacionados aos cadastros do eventos</p>
								</li>
								<li>
									<strong>tbl_carrinho</strong>
									<p>Campos relacionados ao carrinho de compras / reservas</p>
								</li>
								<li>
									<strong>tbl_tipo_ingresso</strong>
									<p>Campos relacionados aos tipos de ingresso</p>
								</li>
								<li>
									<strong>ci_sessions</strong>
									<p>Campos relacionados a sessão do usuário</p>
								</li>
							</ul>
						</div>

						<div class="card card_docs" id="ASSETS">
							<h3>Assets</h3>

							<p>No desenvolvimento web, o termo assets é utilizado para designar tudo o que complementa o conteúdo dos websites. Em outras palavras, assets são nossos recursos de folhas de estilo, scripts, fontes e imagens.</p>

							<strong>Assets Utilizados</strong>
							<ul>
								<li>
									<strong>images</strong>
									<p>Imagens estáticas relacionadas ao projeto</p>
								</li>
								<li>
									<strong>css</strong>
									<p>Arquivos de formatação (cores, fontes e demais definições da estrutura e layout)</p>
								</li>
								<li>
									<strong>js</strong>
									<p>Arquivos javascript, bibliotecas, plugins e demais corelatos</p>
								</li>
							</ul>
						</div>

						<div class="card card_docs" id="ESTRUTURA">
							<h3>Estrutura do FrameWork</h3>



							<strong>Front Controller</strong>
							<p>O Front Controller ou Controlador Frontal é um padrão arquitetural que se comporta como um controlador tratando todas as solicitações para um site Web e então roteia para uma ação</p>
							<p>Encontramos este arquivo na raiz do projeto </p>


							<strong>Models</strong>
							<p>Essa classe também é conhecida como Business Object Model (objeto modelo de negócio). Sua responsabilidade é gerenciar e controlar a forma como os dados se comportam por meio das funções, lógica e regras de negócios estabelecidas. </p>

							<p>Ele é o detentor dos dados que recebe as informações do Controller, válida se ela está correta ou não e envia a resposta mais adequada.</p> 

							<p>Encontramos estes arquivos no diretório: mrlab_ci4\mrlab_app\Models</p>




							<strong>Views</strong>
							<p>Essa camada é responsável por apresentar as informações de forma visual ao usuário. Em seu desenvolvimento devem ser aplicados apenas recursos ligados a aparência como mensagens, botões ou telas. </p>

							<p>Seguindo nosso processo de comparação o View está na linha de frente da comunicação com usuário e é responsável transmitir questionamentos ao controller e entregar as respostas obtidas ao usuário. É a parte da interface que se comunica, disponibilizando e capturando todas as informação do usuário.</p>

							<p>Encontramos estes arquivos no diretório: mrlab_ci4\mrlab_views</p>



							<strong>Controllers</strong>
							<p>A camada de controle é responsável por intermediar as requisições enviadas pelo View com as respostas fornecidas pelo Model, processando os dados que o usuário informou e repassando para outras camadas.</p>

							<p>Numa analogia bem simplista, o controller  operaria como o ‘’maestro de uma orquestra’’  que permite a comunicação entre o detentor dos dados e a pessoa com vários questionamentos no MVC.</p> 

							<p>Encontramos estes arquivos no diretório: mrlab_ci4\mrlab_app\Controllers</p>


							
						</div>

					</div>
				</div>
			</div>
		</main>
	</div>
	<script>
		let URL_BASE = '<?php echo(site_url()); ?>';

		$(document).ready(function(){
			$.ajaxSetup({cache: false});
			$(document).on('click', '.link-ancora', function (event) {
				event.preventDefault();
				var $link = $(this).data('target');
				var $posicao = $($link).offset().top;
				$('html, body').stop().animate({
					scrollTop: ($posicao - 15)
				}, 0, 'swing');
				return false;
			});
		});
	</script>

</body>
</html>