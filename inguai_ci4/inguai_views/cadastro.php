<?php 
	$this->extend('templates/template_cadastro');
	$this->section('content'); 
?>

	<div class="container-fluid g-1 h-100" style="position: relative;">
		<div class="row g-1 justify-content-center align-items-center h-100">
			<div class="col-11 col-md-7">

				<?php 
					$cad_nome = "";
					$cad_email = "";
					$cad_dtenascto = "";
					$cad_cpf = "";
					$cad_telefone = "";
					$cad_cep = "";
					$cad_endereco = "";
					$cad_end_numero = "";
					$cad_end_complemento = "";
					$cad_bairro = "";
					$cad_cidade = "";
					$cad_estado = "";
					if( session()->getFlashdata('error_fields') !== NULL ){ 
						$fields = session()->getFlashdata('error_fields');
						$cad_nome = (isset($fields["cad_nome"]) ? $fields["cad_nome"] : "");
						$cad_email = (isset($fields["cad_email"]) ? $fields["cad_email"] : "");
						$cad_dtenascto = (isset($fields["cad_dtenascto"]) ? $fields["cad_dtenascto"] : "");
						$cad_cpf = (isset($fields["cad_cpf"]) ? $fields["cad_cpf"] : "");
						$cad_telefone = (isset($fields["cad_telefone"]) ? $fields["cad_telefone"] : "");
						$cad_cep = (isset($fields["cad_cep"]) ? $fields["cad_cep"] : "");
						$cad_endereco = (isset($fields["cad_endereco"]) ? $fields["cad_endereco"] : "");
						$cad_end_numero = (isset($fields["cad_end_numero"]) ? $fields["cad_end_numero"] : "");
						$cad_end_complemento = (isset($fields["cad_end_complemento"]) ? $fields["cad_end_complemento"] : "");
						$cad_bairro = (isset($fields["cad_bairro"]) ? $fields["cad_bairro"] : "");
						$cad_cidade = (isset($fields["cad_cidade"]) ? $fields["cad_cidade"] : "");
						$cad_estado = (isset($fields["cad_estado"]) ? $fields["cad_estado"] : "");
					}
				?>

				<FORM method="POST" name="formCadastro" id="formCadastro" action="<?php echo( current_url() ); ?>">
				<!-- --------------------------------------------------------------- -->
				<div class="d-flex flex-column h-100 card card-padrao" style="padding: 40px 90px; background-color: #0D2F5A; border-radius: 40px;">
					<div class="tab-content">
						<!-- DADOS PESSOAIS -->
						<div id="cad-passo-01" class="tab-pane fade in active show">
							<div class="text-center pb-4"><img src="assets/images/logotipo.png" class="logo" style="height:50px;" /></div>

							<div class="row">
								<div class="col-12 col-md-12">
									<div class="form-group">
										<label class="form-label">*Nome:</label>
										<input type="text" class="form-control" name="cad_nome" id="cad_nome" value="<?php echo( $cad_nome ); ?>" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">*CPF:</label>
										<input type="text" class="form-control mask-cpf" name="cad_cpf" id="cad_cpf" value="<?php echo( $cad_cpf ); ?>" />
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label class="form-label">*Data de nascimento:</label>
										<input type="text" class="form-control mask-date" name="cad_dtenascto" id="cad_dtenascto" value="<?php echo( $cad_dtenascto ); ?>" />
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label class="form-label">*Telefone:</label>
										<input type="text" class="form-control mask-phone" name="cad_telefone" id="cad_telefone" value="<?php echo( $cad_telefone ); ?>" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">*E-mail:</label>
										<input type="text" class="form-control" name="cad_email" id="cad_email" value="<?php echo( $cad_email ); ?>" />
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">*Confirmação de e-mail:</label>
										<input type="text" class="form-control" name="cad_email_conf" id="cad_email_conf" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">*Senha:</label>
										<input type="password" class="form-control" name="cad_senha" id="cad_senha"  />
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">*Confirmar Senha:</label>
										<input type="password" class="form-control" name="cad_senha_conf" id="cad_senha_conf" />
									</div>
								</div>
							</div>

							<div class="pt-2">
								<span class="color-white" style="font-size: .85rem;">*Campo obrigatório</span>
							</div>

							<div class="row justify-content-center">
								<div class="col-12 col-md-6">
									<div class="d-grid pt-4">
										<a href="javascript:;" class="btn btn-white validarDadosPessoais" >Avançar</a>
									</div>
								</div>
							</div>
						</div>

						<!-- ENDEREÇO -->
						<div id="cad-passo-02" class="tab-pane fade">
							<div class="text-center pb-4"><img src="assets/images/logotipo.png" class="logo" style="height:50px;" /></div>

							<div class="row">
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label class="form-label">*CEP:</label>
										<input type="text" class="form-control mask-postcode" name="cad_cep" id="cad_cep" value="<?php echo( $cad_cep ); ?>" />
									</div>
								</div>
								<div class="col-12 col-md-9">
									<div class="form-group">
										<label class="form-label">*Endereço:</label>
										<input type="text" class="form-control" name="cad_endereco" id="cad_endereco" value="<?php echo( $cad_endereco ); ?>" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label class="form-label">*Número:</label>
										<input type="text" class="form-control" name="cad_end_numero" id="cad_end_numero" value="<?php echo( $cad_end_numero ); ?>" />
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label class="form-label">Complemento:</label>
										<input type="text" class="form-control" name="cad_end_complemento" id="cad_end_complemento" value="<?php echo( $cad_end_complemento ); ?>" />
									</div>
								</div>
								<div class="col-12 col-md-5">
									<div class="form-group">
										<label class="form-label">*Bairro:</label>
										<input type="text" class="form-control" name="cad_bairro" id="cad_bairro" value="<?php echo( $cad_bairro ); ?>" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-md-9">
									<div class="form-group">
										<label class="form-label">*Cidade:</label>
										<input type="text" class="form-control" name="cad_cidade" id="cad_cidade" value="<?php echo( $cad_cidade ); ?>" />
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label class="form-label">*Estado:</label>
										<input type="text" class="form-control" name="cad_estado" id="cad_estado" value="<?php echo( $cad_estado ); ?>" />
									</div>
								</div>
							</div>

							<div class="pt-2">
								<span class="color-white" style="font-size: .85rem;">*Campo obrigatório</span>
							</div>

							<div class="row justify-content-center pt-4">
								<div class="col-12 col-md-1">
									<div class="d-grid">
										<a href="javascript:;" class="btn btn-red voltarPasso01"><i class="fas fa-arrow-left"></i></a>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="d-grid ">
										<a href="javascript:;" class="btn btn-white validarEndereco">Avançar</a>
									</div>
								</div>
								<div class="col-12 col-md-1"></div>
							</div>
						</div>

						<!-- CONFIRMAR DADOS -->
						<div id="cad-passo-03" class="tab-pane fade">
							<div class="text-center pb-4"><img src="assets/images/logotipo.png" class="logo" style="height:50px;" /></div>

							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">Nome:</label>
										<div class="form-text-view" id="v_cad_nome"><?php echo( $cad_nome ); ?></div>
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label class="form-label">Cidade:</label>
										<div class="form-text-view" id="v_cad_cidade"><?php echo( $cad_cidade ); ?></div>
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label class="form-label">Estado:</label>
										<div class="form-text-view" id="v_cad_estado"><?php echo( $cad_estado ); ?></div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">Data de Nascimento:</label>
										<div class="form-text-view" id="v_cad_dtenascto"><?php echo( $cad_dtenascto ); ?></div>
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label class="form-label">CEP:</label>
										<div class="form-text-view" id="v_cad_cep"><?php echo( $cad_cep ); ?></div>
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label class="form-label">Número</label>
										<div class="form-text-view" id="v_cad_end_numero"><?php echo( $cad_end_numero ); ?></div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">*Email:</label>
										<div class="form-text-view" id="v_cad_email"><?php echo( $cad_email ); ?></div>
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label class="form-label">Endereço</label>
										<div class="form-text-view" id="v_cad_endereco"><?php echo( $cad_endereco ); ?></div>
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label class="form-label">Complemento</label>
										<div class="form-text-view" id="v_cad_end_complemento"><?php echo( $cad_end_complemento ); ?></div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">CPF:</label>
										<div class="form-text-view" id="v_cad_cpf"><?php echo( $cad_cpf ); ?></div>
									</div>
								</div>
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label class="form-label">Bairro</label>
										<div class="form-text-view" id="v_cad_bairro"><?php echo( $cad_bairro ); ?></div>
									</div>
								</div>
								<div class="col-12 col-md-3"></div>
							</div>

							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">Telefone:</label>
										<div class="form-text-view" id="v_cad_telefone"><?php echo( $cad_telefone ); ?></div>
									</div>
								</div>
								<div class="col-12 col-md-3"></div>
								<div class="col-12 col-md-3"></div>
							</div>

							<div class="row justify-content-center pt-4">
								<div class="col-12 col-md-1">
									<div class="d-grid">
										<a href="javascript:;" class="btn btn-red voltarPasso02"><i class="fas fa-arrow-left"></i></a>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="d-grid ">
										<button type="submit" class="btn btn-white">Finalizar</button>
									</div>
								</div>
								<div class="col-12 col-md-1"></div>
							</div>
						</div>
					</div>
					<div class="pt-4">
						<ul class="nav nav-tabs justify-content-between"> <!-- data-toggle="tab" -->
							<li class="passo-01"><a href="#cad-passo-01" class="nolink active show">DADOS PESSOAIS</a></li>
							<li class="passo-02"><a href="#cad-passo-02" class="nolink">ENDEREÇO</a></li>
							<li class="passo-03"><a href="#cad-passo-03" class="nolink">CONFIRMAR DADOS</a></li>
						</ul>
					</div>
				</div>
				<!-- --------------------------------------------------------------- -->
				</FORM>

				<?php if( session()->getFlashdata('error_msg') !== NULL ){ ?>
					<div class="box-error">
						<?php echo( session()->getFlashdata('error_msg') ); ?>
						<?php 
							//print '<pre>';
							//print_r( session()->getFlashdata('error_fields') ); 
							//print '</pre>';
						?>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>



	<!-- <div class="content-wrapper align-items-center"> -->

	<!-- </div> -->
	

	<div class="box-loading" v-bind:class="{active: loading.active}">
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
				<button type="button" class="btn btn-primary shadow" v-on:click="closeOverlay">Fechar</button>
			</div>
		</div>
	</div>

<?php 
	$this->endSection('content'); 

	//$cfgCargo_json = [];
	//$cfgCargo_json = ( isset($cfgCargo) ? $cfgCargo_json = json_encode($cfgCargo) : $cfgCargo_json);

	//$cfgMotivPart_json = [];
	//$cfgMotivPart_json = ( isset($cfgMotivPart) ? $cfgMotivPart_json = json_encode($cfgMotivPart) : $cfgMotivPart_json);

	//$cfgProcCompras_json = [];
	//$cfgProcCompras_json = ( isset($cfgProcCompras) ? $cfgProcCompras_json = json_encode($cfgProcCompras) : $cfgProcCompras_json);

	//$cfgSetorInteresse_json = [];
	//$cfgSetorInteresse_json = ( isset($cfgSetorInteresse) ? $cfgSetorInteresse_json = json_encode($cfgSetorInteresse) : $cfgSetorInteresse_json);
?>


<?php $time = time(); ?>
<?php $this->section('scripts'); ?>
	<style>
		.box-termos {
			margin: 5px 0;
			font-size: .85rem;
		}
	</style>
	<script>
	$(document).ready(function(){
		$.ajaxSetup({cache: false});
		$(window).keydown(function(event){
			if(event.keyCode == 13) { event.preventDefault(); return false; }
		});

		$(document).on('click', '.nolink', function (e) { e.preventDefault(); return false; });
		$(document).on('click', '.voltarPasso01', function (e) { e.preventDefault(); $('.nav-tabs li.passo-01 a').tab('show'); });
		$(document).on('click', '.voltarPasso02', function (e) { e.preventDefault(); $('.nav-tabs li.passo-02 a').tab('show'); });
		$(document).on('click', '.validarDadosPessoais', function (e) {
			e.preventDefault();
			let $this = $(this);
			let $form = $("form#formCadastro");
			let valid = fct_validar_dados_pessoais();
			if( !valid ){ 
				//$('.nav-tabs li:eq(1) a').tab('show');
				//$('.nav-tabs li.passo-02 a').tab('show');
				alert('Atenção! Existe erros que devem ser corrigidos!');
			}else{
				$('.nav-tabs li.passo-02 a').tab('show');
			}
		});

		$(document).on('click', '.validarEndereco', function (e) {
			e.preventDefault();
			let $this = $(this);
			let $form = $("form#formCadastro");
			//$this.prop("disabled",true);
			let valid = fct_validar_endereco();
			if( !valid ){ 
				alert('Atenção! Existe erros que devem ser corrigidos!');
			}else{
				$('.nav-tabs li.passo-03 a').tab('show');
			}
		});

	});

	var fct_validar_dados_pessoais = function(p, callback){
		let $form = $("form#formCadastro");

		let $msg = '';
		let $erro = false;
		let $cad_nome = $form.find("#cad_nome");
		let $cad_telefone = $form.find("#cad_telefone");
		let $cad_dtenascto = $form.find("#cad_dtenascto");
		let $cad_cpf = $form.find("#cad_cpf");
		let $cad_email = $form.find("#cad_email");
		let $cad_email_conf = $form.find("#cad_email_conf");
		let $cad_senha = $form.find("#cad_senha");
		let $cad_senha_conf = $form.find("#cad_senha_conf");

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
		if( $cad_telefone.val().length == 0 ) { $erro = true; }
		if( $cad_dtenascto.val().length == 0 ) { $erro = true; }
		if( $cad_cpf.val().length == 0 ) { $erro = true; }
		if( $cad_email.val().length == 0 ) { $erro = true; }
		if( $cad_email_conf.val().length == 0 ) { $erro = true; }
		if( $cad_email.val() != $cad_email_conf.val()) { $erro = true; }
		if( $cad_senha.val().length == 0 ) { $erro = true; }
		if( $cad_senha_conf.val().length == 0 ) { $erro = true; }
		if( $cad_senha.val() != $cad_senha_conf.val()) { $erro = true; }

		$form.find("#v_cad_nome").html( $cad_nome.val() );
		$form.find("#v_cad_telefone").html( $cad_telefone.val() );
		$form.find("#v_cad_dtenascto").html( $cad_dtenascto.val() );
		$form.find("#v_cad_cpf").html( $cad_cpf.val() );
		$form.find("#v_cad_email").html( $cad_email.val() );

		if( $erro == true ){ return false; }
		return true;
	}
	var fct_validar_endereco = function(p, callback){
		let $form = $("form#formCadastro");

		let $msg = '';
		let $erro = false;
		let $cad_cep = $form.find("#cad_cep");
		let $cad_endereco = $form.find("#cad_endereco");
		let $cad_end_numero = $form.find("#cad_end_numero");
		let $cad_end_complemento = $form.find("#cad_end_complemento");
		let $cad_bairro = $form.find("#cad_bairro");
		let $cad_cidade = $form.find("#cad_cidade");
		let $cad_estado = $form.find("#cad_estado");

		if( $cad_cep.val().length == 0 ) {
			$lab_error = $cad_cep.closest( ".form-box" ).find('.form-error');
			$lab_error.html('<small>Campo requerido</small>');
			$erro = true; 
		}
		if( $cad_endereco.val().length == 0 ) { $erro = true; }
		if( $cad_end_numero.val().length == 0 ) { $erro = true; }
		if( $cad_bairro.val().length == 0 ) { $erro = true; }
		if( $cad_cidade.val().length == 0 ) { $erro = true; }
		if( $cad_estado.val().length == 0 ) { $erro = true; }

		$form.find("#v_cad_cep").html( $cad_cep.val() );
		$form.find("#v_cad_endereco").html( $cad_endereco.val() );
		$form.find("#v_cad_end_numero").html( $cad_end_numero.val() );
		$form.find("#v_cad_end_complemento").html( $cad_end_complemento.val() );
		$form.find("#v_cad_bairro").html( $cad_bairro.val() );
		$form.find("#v_cad_cidade").html( $cad_cidade.val() );
		$form.find("#v_cad_estado").html( $cad_estado.val() );

		if( $erro == true ){ return false; }
		return true;
	}
	</script>

	<script>

	</script>

	<!-- <script type="text/javascript" src="assets/vue/utils.js?t=<?= $time ?>"></script> -->
	<!-- <script type="text/javascript" src="assets/vue/index.js?t=<?= $time ?>"></script> -->

<?php $this->endSection('scripts'); ?>
