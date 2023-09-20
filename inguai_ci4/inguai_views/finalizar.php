<?php 
	$this->extend('templates/template_cadastro');
	$this->section('content'); 
?>

	<div class="container-fluid g-1 h-100" style="position: relative;">
		<div class="row g-1 justify-content-center align-items-center h-100">
			<div class="col-11 col-md-7">

				<div class="d-flex flex-column h-100 card card-padrao" style="padding: 40px 90px; background-color: #0D2F5A; border-radius: 40px;">

					<div class="card card-success" style="">
						<div>
							<h3>Sua compra foi finalizada com sucesso</h3>
						</div>

						<div class="pt-4 pb-4">
							<img src="assets/images/icon-envelope.png" class="img-fluid" />
						</div>

						<div>
							<p>Foi enviado um e-mail contendo os dados de sua compra e a comprovação</p>
						</div>
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
