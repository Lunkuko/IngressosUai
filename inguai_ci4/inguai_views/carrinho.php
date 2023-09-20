<?php 
	$this->extend('templates/template_frontend');
	$this->section('content'); 
?>

	<div class="container-fluid container-fluid-mr pt-5" style="position: relative;">
		<div class="row justify-content-start align-items-center">
			<div class="col-6">
				<h3 style="font-weight: 800;">Carrinho</h3>
			</div>
		</div>
	</div>

	<div class="container-fluid container-fluid-mr pt-4" style="position: relative;">
		<div class="card card-carrinho" style="margin: 0 auto; background-color: #0D2F5A; border-radius: 30px; padding: 20px 30px; margin: 0 30px;">
			<div class="row justify-content-start">
				<div class="col-12 col-md-8">
					<div class="row justify-content-start mb-3 pb-2">
						<div class="col-12 col-md-5">
							<p class="m-0">Ingresso</p>
						</div>
						<div class="col-12 col-md-7">
							<div class="row justify-content-start align-items-center">
								<div class="col-12 col-md-3">
									<p class="m-0">Tipo</p>
								</div>
								<div class="col-12 col-md-4">
									<p class="m-0 text-center">Quantidade</p>
								</div>
								<div class="col-12 col-md-4">
									<p class="m-0 text-end">Subtotal</p>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-12">
							<div class="pt-2" style="border-bottom: 2px solid #FFF;"></div>
						</div>
					</div>

					<?php
					$totalIngressos = 0;
					$ingressosAgrupados = [];
					if( isset($rs_carrinho) && $rs_carrinho->resultID->num_rows >= 1 ){
						foreach ($rs_carrinho->getResult() as $row) {
							//$ting_id = (int)($row->ting_id);
							$cart_hashkey = $row->cart_hashkey;
							$cart_quant = (int)$row->cart_quant;
							$ting_titulo = $row->ting_titulo;
							$ting_urlpage = $row->ting_urlpage;
							$ting_vlr_ingresso = $row->ting_vlr_ingresso;
							$ting_vlr_servico = $row->ting_vlr_servico;
							$ting_qtd_ingressos = (int)$row->ting_qtd_ingressos;
							$ting_qtd_ingressos = (($ting_qtd_ingressos == 0) ? 1 : $ting_qtd_ingressos);
							
							$evto_titulo = $row->evto_titulo;
							$evto_descricao = $row->evto_descricao;
							$evto_imagem = $row->evto_imagem;
							$evto_gratuito = $row->evto_gratuito;

							$link_excluir = site_url('excluir/'. $cart_hashkey);

							if( (int)$cart_quant >= 1 ){
								$circle_money = "circle-money peq green";
								if( $evto_gratuito == 1 ){ 
									$circle_money = "circle-money peq red";
									$ting_vlr_ingresso = 0;
									$ting_vlr_servico = 0;
								}

								$vlr_total = (($ting_vlr_ingresso + $ting_vlr_servico) * $cart_quant); 

								$src_imagem = '';
								$arq_img_path = $folderFotos . $evto_imagem;
								if( file_exists($arq_img_path) && !empty($arq_img_path) )
								{
									$src_imagem = base_url($arq_img_path);
									$src_imagem = '<img src="'. $src_imagem .'"" class="img-fluid" />';
								}


								$countIngressos = $cart_quant;

								//if( $ting_urlpage == "pacote"){
									$countIngressos = ($cart_quant * $ting_qtd_ingressos);
									$totalIngressos = $totalIngressos + $countIngressos; 
								//}else{
								//	$totalIngressos = $totalIngressos + $countIngressos;
								//}

								// verifica se o tipo de ingresso já existe
								// array_key_exists('first', $search_array) in_array($ting_urlpage, $ingressosAgrupados)
								if( array_key_exists($ting_urlpage, $ingressosAgrupados) ) {
									$arr_itens = $ingressosAgrupados[$ting_urlpage];
									$qtdIngressos = $arr_itens["ingressos"];
									$qtdItens = $arr_itens["item"];
									$subtotalItens = $arr_itens["subtotal"];
									$qtdCart = $arr_itens["quant"];

									//print 'qtdIngressos: '. $qtdIngressos;

									$arr_temp = [
										"titulo" => $ting_titulo,
										"item" => ($qtdItens + 1),
										"quant" =>($qtdCart + $cart_quant),
										"ingressos" => ($qtdIngressos + $countIngressos),
										"subtotal" => ($subtotalItens + $vlr_total),
									];
									$ingressosAgrupados[$ting_urlpage] = $arr_temp;
								}else{
									$arr_temp = [
										"titulo" => $ting_titulo,
										"item" => 1,
										"quant" => $cart_quant,
										"ingressos" => $countIngressos,
										"subtotal" => $vlr_total,
									];
									$ingressosAgrupados[$ting_urlpage] = $arr_temp;	
								}
					?>
					<div class="row justify-content-start mb-3">
						<div class="col-12 col-md-5">
							<div class="d-flex">
								<div style="width: 70px; position: relative;">
									<?php echo( $src_imagem ); ?>
						<div class="<?php echo( $circle_money ); ?>"><i class="fas fa-dollar-sign"></i></div>
								</div>
								<div style="width: calc(100% - 85px); padding-left: 12px;">
									<div><?php echo( $evto_titulo ); ?></div>
									<div><?php echo( $evto_descricao ); ?></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-7">
							<div class="row justify-content-start align-items-center">
								<div class="col-12 col-md-3">
									<?php echo( $ting_titulo ); ?>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group text-center" style="margin: 0 auto;">
										<div class="form-input-qtd"><?php echo( $cart_quant ); ?></div>
										<input class="form-control only-number text-center d-none" style="width: 85px; margin: 0 auto;" value="<?php echo( $cart_quant ); ?>" />
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="text-end"><?php echo( "R$ ". number_format($vlr_total, 2, ',', '.') ); ?></div>
								</div>
								<div class="col-12 col-md-1">
									<a href="<?php echo( $link_excluir ); ?>" class="text-center color-red"><i class="fas fa-window-close"></i></a>
								</div>
							</div>
						</div>
					</div>
					<?php
							}
						}
					}
					?>

					<div class="row justify-content-end mb-3 pb-2 d-none">
						<div class="col-12 col-md-12">
							<div class="pt-2" style="border-bottom: 2px solid #FFF;"></div>
						</div>
						<div class="col-12 col-md-5">
							<div class="d-grid pt-4">
								<button type="submit" class="btn btn-white">Excluir selecionados</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div style="border-left: 2px solid #FFF; padding-left: 20px;">
						<h2>Resumo do Pedido</h2>

						<div class="row justify-content-start pt-3 pb-3">
							<div class="col-12 col-md-12">
								<?php echo( $totalIngressos ); ?> Ingresso(s)
								<?php 
									//print '<pre>';
									//print_r( $ingressosAgrupados ); 
									//print '</pre>';
								?>
							</div>
						</div>

						<?php
						$totalPedido = 0;
						foreach ($ingressosAgrupados as $key => $val) {
							$totalPedido = $totalPedido + $val["subtotal"];
						?>
						<div class="row justify-content-start align-items-start pt-1 pb-1">
							<div class="col-12 col-md-6">
								<?php 
								//if( $key == "pacote" ){
								//	echo( $val["item"]  ." x ".  $val["titulo"] );
								//}else{
								//	echo( $val["quant"] ." x ".  $val["titulo"] );
								//}
								echo( $val["quant"] ." x ".  $val["titulo"] );
								?>
							</div>
							<div class="col-12 col-md-6">
								<div class="text-end"><?php echo( "R$ ". number_format($val["subtotal"], 2, ',', '.') ); ?></div>
							</div>
						</div>
						<?php
						}
						?>

						<div class="row justify-content-start align-items-start">
							<div class="col-12 col-md-12 pt-3 pb-3">
								<div class="pt-3" style="border-bottom: 2px solid #FFF;"></div>
							</div>
							<div class="col-12 col-md-6 ">
								<strong>Total</strong>
							</div>
							<div class="col-12 col-md-6">
								<div class="text-end"><?php echo( "R$ ". number_format($totalPedido, 2, ',', '.') ); ?></div>
								<div class="text-end"><p style="font-size: .8rem;">em 3x sem juros</p></div>
							</div>
						</div>

						<div class="d-grid pt-4">
							<a href="javascript:;" class="btn btn-white">Finalizar</a>
						</div>
					</div>
				</div>
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
