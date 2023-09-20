<?php 
	$this->extend('templates/template_frontend');
	$this->section('content'); 
?>

	<div class="container-fluid container-fluid-mr pt-5" style="position: relative;">
		<div class="row justify-content-start align-items-center">
			<div class="col-6">
				<h3 style="font-weight: 800;">Escolha seus ingressos</h3>
			</div>
		</div>
	</div>

	<?php
	$evto_id = 0;
	$evto_id = 0;
	$text_button = "Adicionar ao carrinho";
	$circle_money = "circle-money green";
	if( isset($rs_evento) ){
		$evto_id = (int)($rs_evento->evto_id);
		$evto_gratuito = (int)($rs_evento->evto_gratuito);
	}
	if( $evto_gratuito == 1 ){ $text_button = "Reservar"; $circle_money = "circle-money red"; }
	?>


	<FORM method="POST" name="formEscolhaIngresso" id="formEscolhaIngresso" action="<?php echo( current_url() ); ?>">
	<!-- --------------------------------------------------------------- -->
	<input type="hidden" name="evto_id" value="<?php echo( $evto_id ); ?>" />

	<div class="container-fluid container-fluid-mr pt-4" style="position: relative;">
		<div class="row justify-content-start align-items-start">
			<div class="col-12 col-md-6">
				<div class="row justify-content-start align-items-center mb-2 pb-2">
					<div class="col-12 col-md-4">
						Ingresso
					</div>
					<div class="col-12 col-md-4 text-center">
						Quantidade
					</div>
					<div class="col-12 col-md-4 text-end">
						Total
					</div>
					<div class="col-12 col-md-12 ">
						<div class="pt-2" style="border-bottom: 2px solid #FFF;"></div>
					</div>
				</div>

				<?php
				if( isset($rs_tipo_ingresso) && $rs_tipo_ingresso->resultID->num_rows >= 1 ){
					foreach ($rs_tipo_ingresso->getResult() as $row) {
						$ting_id = (int)($row->ting_id);
						$ting_titulo = $row->ting_titulo;
						$ting_urlpage = $row->ting_urlpage;
						$ting_descricao = $row->ting_descricao;
						$ting_qtd_ingressos = $row->ting_qtd_ingressos;
						$ting_vlr_ingresso = $row->ting_vlr_ingresso;
						$ting_vlr_servico = $row->ting_vlr_servico;

						$item_vlr_ingresso = ($ting_vlr_ingresso + $ting_vlr_servico);

						if( $evto_gratuito == 1 ){ 
							$ting_vlr_ingresso = 0;	
						}
				?>
				<div class="row justify-content-start align-items-center mb-2">
					<div class="col-12 col-md-4">
						<strong style="font-size: 1.5rem;"><?php echo( $ting_titulo ); ?></strong>
						<input type="hidden" class="form-control" name="ting_id[<?php echo( $ting_id ); ?>]" id="ting_id_<?php echo( $ting_id ); ?>" value="<?php echo( $ting_id ); ?>" />
					</div>
					<div class="col-12 col-md-4">
						<div class="form-group" style="margin: 0 auto;">
							<select class="form-select escolhaIngresso" name="ting_qtde[<?php echo( $ting_id ); ?>]" id="ting_qtde_<?php echo( $ting_id ); ?>" style="width: 90px; margin: 0 auto;" data-codigo="<?php echo( $ting_id ); ?>">
								<option value="">0</option>
								<?php for ($x = 1; $x <= 5; $x++) { ?>
								<option value="<?php echo($x); ?>"><?php echo($x); ?></option>
								<?php } ?>
							</select>
							<input type="hidden" name="ting_vlr_ingresso[<?php echo( $ting_id ); ?>]" id="ting_vlr_ingresso_<?php echo( $ting_id ); ?>" value="<?php echo( $ting_vlr_ingresso ); ?>" />
							<input type="hidden" name="ting_vlr_servico[<?php echo( $ting_id ); ?>]" id="ting_vlr_servico_<?php echo( $ting_id ); ?>" value="<?php echo( $ting_vlr_servico ); ?>" />
							<input type="hidden" name="item_vlr_ingresso[<?php echo( $ting_id ); ?>]" id="item_vlr_ingresso_<?php echo( $ting_id ); ?>" value="<?php echo( $item_vlr_ingresso ); ?>" />
							<input type="hidden" name="ting_qtd_ingressos[<?php echo( $ting_id ); ?>]" id="ting_qtd_ingressos_<?php echo( $ting_id ); ?>" value="<?php echo( $ting_qtd_ingressos ); ?>" />
							<input type="hidden" name="ting_titulo[<?php echo( $ting_id ); ?>]" id="ting_titulo_<?php echo( $ting_id ); ?>" value="<?php echo( $ting_titulo ); ?>" />
						</div>
					</div>
					<div class="col-12 col-md-4 text-end">
						R$ <?php echo( number_format($ting_vlr_ingresso, 2, ',', '.') ); ?>
					</div>
					<div class="col-12">
						<p><?php echo( $ting_descricao ); ?></p>
					</div>
					<div class="col-12 col-md-12 ">
						<div class="pt-2" style="border-bottom: 2px solid #FFF;"></div>
					</div>
				</div>
				<?php
					}
				}
				?>

				<div class="row justify-content-end">
					<div class="col-12 col-md-6">
						<div class="d-grid pt-4">
							<button type="submit" class="btn btn-white"><?php echo($text_button); ?></button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6">

				<div class="row justify-content-between align-items-center">
					<div class="col-12 col-md-6">

						<div class="card" style="height: 320px; background-color: #0D2F5A; border-radius: 30px; padding: 20px;">
							<p><span id="totalIngressos">0</span> ingresso(s)</p>
							<p class="pt-2 pb-3">Detalhes</p>
							<div id="contentROW-OPTION-ITEM"></div>

							<div class="row justify-content-between align-items-center pt-2 pb-3">
								<div class="col-12 col-md-12 ">
									<div class="pt-2" style="border-bottom: 2px solid #FFF;"></div>
								</div>
							</div>
							<p class="text-end">Total: <span id="totalValor">R$ 0,00</span></p>
						</div>

					</div>
					<div class="col-12 col-md-5">

						<?php
						if( isset($rs_evento) ){
							$evto_id = (int)($rs_evento->evto_id);
							$evto_hashkey = $rs_evento->evto_hashkey;
							$evto_urlpage = $rs_evento->evto_urlpage;
							$evto_titulo = $rs_evento->evto_titulo;
							$evto_descricao = $rs_evento->evto_descricao;
							$evto_imagem = $rs_evento->evto_imagem;
							$evto_dte_evento = $rs_evento->evto_dte_evento;
							$evto_dte_evento = fct_formatdate($rs_evento->evto_dte_evento, "d/m/Y");
							$evto_hour_evento = $rs_evento->evto_hour_evento;

							$src_imagem = '';
							$arq_img_path = $folderFotos . $evto_imagem;
							if( file_exists($arq_img_path) && !empty($arq_img_path) )
							{
								$src_imagem = base_url($arq_img_path);
								$src_imagem = '<img src="'. $src_imagem .'"" />';
							}
						?>
						<div class="card-grid-item" style="height: 360px;">
							<div class="img-mark imgOverflow">
								<div class="img-mark-image" style="z-index: 9;">
									<?php echo( $src_imagem ); ?>
									<div class="<?php echo( $circle_money ); ?>"><i class="fas fa-dollar-sign"></i></div>
								</div>
							</div>
							<div class="card-text">
								<?php echo( $evto_titulo ); ?>
							</div>
						</div>
						
						<div class="d-flex justify-content-between pt-2">
							<div><?php echo( $evto_dte_evento ); ?></div>
							<div><?php echo( $evto_hour_evento ); ?></div>
						</div>
						<div class="text-center">
							<?php echo( $evto_descricao ); ?>
						</div>
						<?php
						}
						?>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- --------------------------------------------------------------- -->
	</FORM>


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

	<script id="mstcROW-OPTION-ITEM" type="text/html">
		{{#dados}}
		<div class="row mb-2 aign-items-center trRow">
			<div class="col-12 col-md-7">
				<p class="m-0">{{label}}</p>
			</div>
			<div class="col-12 col-md-5">
				<p class="text-end m-0">{{vlrBR}}</p>
			</div>
		</div>
		{{/dados}}
	</script>

	<script type="text/javascript" src="https://unpkg.com/mustache"></script>

	<script>
	$(document).ready(function(){
		$.ajaxSetup({cache: false});
		$(window).keydown(function(event){
			if(event.keyCode == 13) { event.preventDefault(); return false; }
		});


		let $totalIngressos = 0;
		let $arr_ingressos = [];
		$(document).on('change', '.escolhaIngresso', function (e) {
			e.preventDefault();
			let $this = $(this);
			let $form = $("form#formEscolhaIngresso");
			let $codigo = $this.data('codigo');
			let $fld_valor = $form.find('#item_vlr_ingresso_'+ $codigo );
			let $fld_qtd_ingr = $form.find('#ting_qtd_ingressos_'+ $codigo );
			let $fld_ting_titulo = $form.find('#ting_titulo_'+ $codigo );
			
			let $item_qtd_ingr = ($this.val() * $fld_qtd_ingr.val());

			const item = $arr_ingressos.find(item => item.pergID === $codigo);
			var index = $arr_ingressos.indexOf(item);


			//console.log( $fld_valor.val() );
			let $subTotalItem = ($this.val() * $fld_valor.val());
			$totalIngressos = ($totalIngressos + $item_qtd_ingr);

			


			console.log( 'index: '+ index );
			if( index != -1 ){ $arr_ingressos.splice(index, 1); }
			if( $this.val() > 0 ){
				//var fTOTALVALOR = somaValor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
				$arr_ingressos.push({ 
					pergID: $codigo,
					label: $fld_ting_titulo.val(), 
					qtd: $this.val(),
					qtd_ingr: $item_qtd_ingr, 
					vlr: $subTotalItem,
					vlrBR: $subTotalItem.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})
				});
			}

			console.log( 'label: '+ $fld_ting_titulo.val() +'qtd: '+ $this.val() +' vlr: '+ $fld_valor.val() +' subtotal: '+ $subTotalItem +' qtd ingres: '+ $item_qtd_ingr );
			console.log( $arr_ingressos );

			//$("#totalValor").html( $subTotalItem );
			//$("#totalIngressos").html( $totalIngressos );

			let somaValor = $arr_ingressos.reduce(function(tot, arr) { 
				return tot + arr.vlr;
			},0);
			let somaIngressos = $arr_ingressos.reduce(function(tot, arr) { 
				return tot + arr.qtd_ingr;
			},0);

			console.log( 'soma valor: '+ somaValor );

			var fTOTALVALOR = somaValor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
			$("#totalValor").html( '' );
			$("#totalValor").html( fTOTALVALOR );
			//$("#totalValor").html( somaValor );
			$("#totalIngressos").html( somaIngressos );

			let templateData = {
				dados: $arr_ingressos 
			};
			var template = $("#mstcROW-OPTION-ITEM").html();
			$('#contentROW-OPTION-ITEM').html('');
			$('#contentROW-OPTION-ITEM').append( Mustache.render(template, templateData) );

			//let valid = fct_validar_dados_pessoais();
			//if( !valid ){ 
			//	//$('.nav-tabs li:eq(1) a').tab('show');
			//	//$('.nav-tabs li.passo-02 a').tab('show');
			//	alert('Atenção! Existe erros que devem ser corrigidos!');
			//}else{
			//	$('.nav-tabs li.passo-02 a').tab('show');
			//}
		});

		//$(document).on('click', '.cmdAddNewOption', function (e) {
		//	e.preventDefault();
		//	let templateData = {
		//		row_item: 1, 
		//	};
		//	var template = $("#mstcROW-OPTION-ITEM").html();
		//	$('#contentROW-OPTION-ITEM').append( Mustache.render(template, templateData) );

		//});
	});
	</script>

<?php $this->endSection('scripts'); ?>
