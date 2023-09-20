<?php 
	$this->extend('templates/template_cadastro');
	$this->section('content'); 
?>

	<div class="container-fluid g-1 h-100" style="position: relative;">
		<div class="row g-1 justify-content-center align-items-center h-100">
			<div class="col-11 col-md-5 bg-index">
				<div>
				</div>
			</div>
			<div class="col-11 col-md-7">

				<div class="d-flex flex-column h-100" style="padding: 30px 50px">
					<div>
						<h1 class="color-white">Acontecendo agora perto de você!</h1>
					</div>

					<div class="pt-5">
						<h2 class="color-white">Inscreva-se agora mesmo no Ingresso, UAI!</h2>
					</div>


					<div class="row pt-3">

						<div class="col-5">
							<div class="row">
								<div class="col-12">
									<div class="d-grid"><a href="javascript:;" class="btn btn-white">Inscreva-se no Google</a></div>
								</div>
							</div>
							<div class="row py-2">
								<div class="col-12 text-center"><h4 class="color-white m-0 p-0">OU</h4></div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="d-grid"><a href="<?php echo(site_url('cadastro')); ?>" class="btn btn-white">Inscreva-se com o e-mail</a></div>
								</div>
							</div>
						</div>

					</div>

					<div class="row pt-5">
						<div class="col-5">
							<h4 class="color-white">Já tem uma conta?</h4>
							<div class="d-grid"><a href="<?php echo(site_url('login')); ?>" class="btn btn-white">Entrar</a></div>
						</div>
					</div>

					<div class="row pt-5">
						<div class="col-5">
							<div class="d-grid"><a href="<?php echo(site_url('grid')); ?>" class="btn btn-transparente">Cadastrar depois</a></div>
						</div>
					</div>

					<div class="d-flex justify-content-end pt-5">
						<div><img src="assets/images/logotipo.png" class="logo" /></div>
					</div>
				</div>

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
	});
	</script>

	<script>

	</script>

	<!-- <script type="text/javascript" src="assets/vue/utils.js?t=<?= $time ?>"></script> -->
	<!-- <script type="text/javascript" src="assets/vue/index.js?t=<?= $time ?>"></script> -->

<?php $this->endSection('scripts'); ?>
