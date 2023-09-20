<?php 
	$this->extend('templates/template_frontend');
	$this->section('content'); 
?>

	
	<div class="content-wrapper align-items-center">
		<div style="background-color: rgb(255, 255, 255, 0); width: 100%; padding: 0; height:15px;">
			<div class="container-fluid">
				<div class="row g-1 justify-content-start">
					<div class="col-12 col-md-6"></div>
				</div>
			</div>
		</div>
		<div class="box-img-fundo" style="width: 100%;">
			<div class="container-fluid my-2" style="position: relative;">
				<div class="row g-1 justify-content-center">
					<div class="col-9 col-md-5">

						<div class="d-flex">
							<div class="">
								<img src="assets/images/logotipo.png" style="height: 150px" />
							</div>
						</div>
						<div class="pt-4" style="padding-left: 50px;">
							<p class="m-0" style="color:#31FF45; font-size: .85rem;"><strong>O MAIOR EVENTO</strong> DE COMEX DO BRASIL</p>
							<p class="m-0" style="color:#ffffff; font-size: .85rem;">8 DE NOVEMBRO 2022</p>
						</div>

						<div class="list-agenda pt-4" style="padding-left: 40px;">
							<ul style="color: #FFFFFF;">
								<li>7h30 Credenciamento e welcome coffee</li> 
								<li>9h Início do evento</li> 
								<li>9h15 Palestra: Thiago de Aragão</li> 
								<li>10h40 Painel</li> 
								<li>12h Almoço</li>
								<li>14h Retomada do evento</li> 
								<li>16h Palestra: Lars Jensen</li> 
								<li>16h45 Coffee break</li>
								<li>17h Palestra: Ricardo Amorim </li>
								<li>19h Coquetel e Show</li>
								<li>22h Encerramento</li>
							</ul>
						</div>

					</div>
					<div class="col-12 col-md-7">

						<div class="" style="width: 100%; margin: 0 0 0 auto;">
							<div class="row g-5 justify-content-center">
								<div class="col-12 col-md-12">

									<FORM method="POST" name="formLogin" id="formLogin" ref="formLogin" class="form-horizontal auth-form" action="<?php echo( site_url('logar') ); ?>">
									<!-- --------------------------------------------------------------- -->
									<div class="card card-login">
										<div style="position: relative; overflow: hidden;">
											<div class="bg-gradiente"></div>
											<div style="position: relative; z-index:2;">
												<div class="card-header">
													<h1 class="m-0">Faça seu login</h1>
												</div>
												<div class="card-body">

													<!-- Nome -->
													<div class="row pb-2">
														<div class="col-12 col-md-5">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone">
																		<i class="fas fa-user-circle"></i>
																	</div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Nome</label>
																			<input type="text" id="lgnome" name="lgnome" class="form-control txtNome" required="" value="" autocomplete="off" /> 
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-12 col-md-5">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone">
																		<i class="fas fa-envelope"></i>
																	</div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">E-mail</label> 
																			<input type="text" id="lgemail" name="lgemail" class="form-control txtEmail" required="" value="" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-12 col-md-2">
															<div class="d-flex justify-content-center">
																<button type="submit" class="btn btn-primary shadow cmdLoginSubmit">Login &nbsp;&nbsp;<i class="fas fa-angle-right"></i></button>
															</div>
														</div>
													</div>

												</div>
												<div class="card-footer">

												</div>
											</div>
										</div>
									</div>
									<!-- --------------------------------------------------------------- -->
									</FORM>

								</div>
								<div class="col-12 col-md-12">

									<FORM method="POST" name="formCadastro" id="formCadastro" ref="formcadastro" class="form-horizontal auth-form" action="<?php echo( site_url('cadastrar') ); ?>">
									<!-- --------------------------------------------------------------- -->
									<div class="card card-login">
										<div style="position: relative; overflow: hidden;">
											<div class="bg-gradiente"></div>
											<div style="position: relative; z-index:2;">
												<div class="card-header">
													<h1 class="m-0">Realize seu cadastro abaixo</h1>
												</div>
												<div class="card-body">

													<!-- Atividade -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-user-circle"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Escolha a sua atividade</label>
																			<input type="text" id="atividade" name="atividade" class="form-control txtNome" required="" value="" autocomplete="off"/> 
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>


													<!-- Nome -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-user-circle"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Nome</label>
																			<input type="text" id="nome" name="nome" class="form-control txtNome" required="" value="" autocomplete="off"/> 
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- E-mail -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-envelope"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">E-mail</label> 
																			<input type="text" id="email" name="email" class="form-control txtEmail" required="" value="" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- CPF -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-user-shield"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">CPF</label>
																			<input type="text" id="cpf" name="cpf" class="form-control mask-cpf txtCPF" required="" value="" autocomplete="off"/> 
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- Data de Nascimento -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="far fa-calendar-alt"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Data de Nascimento</label>
																			<input type="text" id="dtnascto" name="dtnascto" class="form-control mask-date txtDtNascto" required="" value="" autocomplete="off"/> 
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- CNPJ -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fa fa-university"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">CNPJ</label> 
																			<input type="text" id="cnpj" name="cnpj" class="form-control mask-cnpj txtCNPJ" required="" value="" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- Empresa -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fa fa-university"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Empresa</label> 
																			<input type="text" id="empresa" name="empresa" class="form-control txtEmpresa" required="" value="" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- Cidade -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-map-marker-alt"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Cidade</label> 
																			<input type="text" id="cidade" name="cidade" class="form-control txtCidade" required="" value="" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- Estado -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-map-marker-alt"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Estado</label> 
																			<input type="text" id="estado" name="estado" class="form-control txtPais" required="" value="" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- País -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-map-marker-alt"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">País</label> 
																			<input type="text" id="pais" name="pais" class="form-control txtPais" required="" value="" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- Celular -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-phone-alt"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Celular</label> 
																			<input type="text" id="telefone" name="telefone" class="form-control txtTelefone mask-phone" required="" value="" placeholder="(__) ____-____" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- Cargo -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-address-card"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Cargo</label> 
																			<input type="text" id="cargo" name="cargo" class="form-control txtCargo" required="" value="" placeholder="" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- Qual é o motivo da participação? -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-cubes"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Qual é o motivo da participação?</label> 
																			<input type="text" id="motivo" name="motivo" class="form-control txtMotivo" required="" value="" placeholder="" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- Qual é o seu papel no processo de compras? -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-thumbtack"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Qual é o seu papel no processo de compras?</label> 
																			<input type="text" id="seu_papel" name="seu_papel" class="form-control txtSeuPapel" required="" value="" placeholder="" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- Em qual setor você tem mais interesse? -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-people-carry"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Em qual setor você tem mais interesse?</label> 
																			<input type="text" id="setor_interesse" name="setor_interesse" class="form-control txtSetorInteresse" required="" value="" placeholder="" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<!-- Tem algum produto, serviço ou marca que gostaria de encontrar no evento? -->
													<div class="row pb-2">
														<div class="col-12 col-md-12">
															<div class="form-box">
																<div class="d-flex justify-content-center align-items-start flex-form">
																	<div class="icone"><i class="fas fa-box-open"></i></div>
																	<div style="width: calc(100% - 30px);">
																		<div class="form-group"> 
																			<label class="form-control-placeholder">Tem algum produto, serviço ou marca que gostaria de encontrar no evento?</label> 
																			<input type="text" id="produto_interesse" name="produto_interesse" class="form-control txtProdutoInteresse" required="" value="" placeholder="" autocomplete="off" />
																		</div>
																		<div class="form-error"><small></small></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

												</div>
												<div class="card-footer">
													<div class="d-flex justify-content-center">
														<button type="submit" class="btn btn-primary shadow cmdCadastroSubmit">Fazer minha inscrição &nbsp;&nbsp;<i class="fas fa-angle-right"></i></button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- --------------------------------------------------------------- -->
									</FORM>

	<!--
			Escolha a sua atividade: (aberto) 
			Nome:  
			E-mail:  
			CPF (digitar apenas os números):  
			Data de nascimento:  
			CNPJ:  
			Empresa:  
			País:  
			Estado:  
			Cidade:  
			Celular: (11)  
		Cargo: CEO /  DIRETOR / GERENTE / COORDENADOR / VENDEDOR / OUTROS 
		Qual é o motivo da participação? 
		∙       Fazer negócios  
		∙       Conhecer as novidades do setor  
		∙       Consumir conteúdo e experiência   

		Qual é o seu papel no processo de compras?  
		∙       Decisão final  
		∙       Influenciador 
		∙       Pesquisa de novos negócios  
		∙       Vendas 
		∙       Outros 

		Em qual setor você tem mais interesse? Marítimo / Aéreo / Rodoviário / Todos / Outros 
		Tem algum produto, serviço ou marca que gostaria de encontrar no evento?  

	-->


								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div style="background-color: black;">
			<div class="container-fluid">
				<div class="row g-1 justify-content-center">
					<div class="col-12 col-md-11">
						<img src="assets/images/logos-footer.jpg" class="img-fluid" />

						<!--
						-	Asia
						-	Ascensos
						-	Clif 
						- Band/Deic
						- Restitui
						-->
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<div class="box-loading">
		<div class="d-flex flex-column align-items-center justify-content-center h-100">
			<div class="text-msg">
				<div>Aguarde!</div>
				<div class="loading">
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
		</div>
	</div>

	<div class="overlay" v-bind:class="{active: overlay.active}">
		<div class="d-flex flex-column align-items-center justify-content-center h-100">
			<div class="text-msg" v-html="messageResult">
				<!-- messageResult html -->
			</div>
			<div class="pt-3">
				<button type="button" class="btn btn-secondary shadow" v-on:click="closeOverlay">Fechar</button>
			</div>
		</div>
	</div>

<?php 
	$this->endSection('content'); 
?>


<?php $time = time(); ?>
<?php $this->section('scripts'); ?>
	<script>
	$(document).ready(function(){
		$.ajaxSetup({cache: false});

		let hasCadSubmitted = false;
		$(document).on('click', '.cmdCadastroSubmit', function (e) {
			e.preventDefault();
			let $this = $(this);
			let $form = $("form#formCadastro");
			$this.prop("disabled",true);

			let $loading = $('.box-loading');
			$loading.addClass('active');

			let valid = fct_validar_cadastro();
			if( !valid ){ $this.prop("disabled",false); $loading.removeClass('active'); return false; }

			let timer = setInterval(function() {
				if(!hasCadSubmitted) {
					hasCadSubmitted = true;
					$form.submit();
				}
				return false;
			}, 500);
		});

		let hasLoginSubmitted = false;
		$(document).on('click', '.cmdLoginSubmit', function (e) {
			e.preventDefault();
			let $this = $(this);
			let $form = $("form#formLogin");
			$this.prop("disabled",true);

			let $loading = $('.box-loading');
			$loading.addClass('active');

			let valid = fct_validar_login();
			if( !valid ){ $this.prop("disabled",false); $loading.removeClass('active'); return false; }

			let timer = setInterval(function() {
				if(!hasLoginSubmitted) {
					hasLoginSubmitted = true;
					$form.submit();
				}
				return false;
			}, 500);
		});

	});

	var fct_validar_cadastro = function(p, callback){
		let $form = $("form#formCadastro");

		let $msg = '';
		let $erro = false;
		let $cad_nome = $form.find("#nome");
		let $cad_email = $form.find("#email");
		let $cad_empresa = $form.find("#empresa");
		let $cad_telefone = $form.find("#telefone");

		if( $cad_nome.val().length == 0 ) {
			$lab_error = $cad_nome.closest( ".form-box" ).find('.form-error');
			$lab_error.html('<small>Campo requerido</small>');
			$erro = true; 
		}
		if( $cad_email.val().length == 0 ) { 
			$lab_error = $cad_email.closest( ".form-box" ).find('.form-error');
			$lab_error.html('<small>Campo requerido</small>');
			$erro = true; 
		}else{
			if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test( $cad_email.val() )) {
				$lab_error = $cad_email.closest( ".form-box" ).find('.form-error');
				$lab_error.html('<small>E-mail inválido</small>');
				$erro = true; 
			}
		}
		if( $cad_empresa.val().length == 0 ) {
			$lab_error = $cad_empresa.closest( ".form-box" ).find('.form-error');
			$lab_error.html('<small>Campo requerido</small>');
			$erro = true; 
		}
		if( $cad_telefone.val().length == 0 ) {
			$lab_error = $cad_telefone.closest( ".form-box" ).find('.form-error');
			$lab_error.html('<small>Campo requerido</small>');
			$erro = true; 
		}
		if( $erro == true ){ return false; }
		return true;
	}

	var fct_validar_login = function(p, callback){
		let $form = $("form#formLogin");

		let $msg = '';
		let $erro = false;
		let $cad_nome = $form.find("#lgnome");
		let $cad_email = $form.find("#lgemail");

		if( $cad_nome.val().length == 0 ) {
			$lab_error = $cad_nome.closest( ".form-box" ).find('.form-error');
			$lab_error.html('<small>Campo requerido</small>');
			$erro = true; 
		}
		if( $cad_email.val().length == 0 ) { 
			$lab_error = $cad_email.closest( ".form-box" ).find('.form-error');
			$lab_error.html('<small>Campo requerido</small>');
			$erro = true; 
		}else{
			if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test( $cad_email.val() )) {
				$lab_error = $cad_email.closest( ".form-box" ).find('.form-error');
				$lab_error.html('<small>E-mail inválido</small>');
				$erro = true; 
			}
		}
		if( $erro == true ){ return false; }
		return true;
	}

	</script>
<?php $this->endSection('scripts'); ?>
