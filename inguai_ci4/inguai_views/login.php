<?php 
	$this->extend('templates/template_cadastro');
	$this->section('content'); 
?>

	<div class="container-fluid g-1 h-100" style="position: relative;">
		<div class="row g-1 justify-content-center align-items-center h-100">
			<div class="col-11 col-md-5">

				<FORM method="POST" name="formLogin" id="formLogin" action="<?php echo( site_url('login') ); ?>">
				<!-- --------------------------------------------------------------- -->
				<div class="d-flex flex-column h-100 card card-padrao" style="padding: 40px 90px; background-color: #0D2F5A; border-radius: 40px;">
					<div class="close-fix">
					</div>

					<div class="text-center"><img src="assets/images/logotipo.png" class="logo" style="height:50px;" /></div>

					<div class="pt-3">
						<h4 class="color-white text-center">Entrar no Ingressos, UAI!</h4>
					</div>


					<div class="d-grid pt-4">
						<a href="javascript:;" class="btn btn-white">Inscreva-se no Google</a>
					</div>
					<div class="pt-3 text-center">
						<h4 class="color-white m-0 p-0">OU</h4>
					</div>
					<div class="pt-3">
						<div class="form-group d-grid">
							<input type="text" class="form-control" name="login_email" id="login_email" placeholder="email" />
						</div>
					</div>
					<div class="pt-3">
						<div class="form-group d-grid">
							<input type="password" class="form-control" name="login_senha" id="login_senha" placeholder="senha"/>
						</div>
					</div>


					<div class="d-grid pt-4">
						<button type="submit" class="btn btn-white">Avançar</button>
						<!-- <a href="javascript:;" class="btn btn-white">Avançar</a> -->
					</div>
					<div class="d-grid pt-2">
						<a href="javascript:;" class="btn btn-blue">Esqueceu a senha</a>
					</div>

					<div class="pt-3">
						Não tem uma conta? <a href="<?php echo(site_url('cadastro')); ?>" class="">Inscreva-se</a>
					</div>
				</div>
				<!-- --------------------------------------------------------------- -->
				</FORM>

				<?php if( session()->getFlashdata('error_msg') !== NULL ){ ?>
					<div class="box-error"><?php echo( session()->getFlashdata('error_msg') ); ?></div>
				<?php } ?>

			</div>
		</div>
	</div>


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
?>


<?php $time = time(); ?>
<?php $this->section('scripts'); ?>

	<script>
	$(document).ready(function(){
		$.ajaxSetup({cache: false});
		$(window).keydown(function(event){
			if(event.keyCode == 13) { event.preventDefault(); return false; }
		});
	});
	</script>

<?php $this->endSection('scripts'); ?>
