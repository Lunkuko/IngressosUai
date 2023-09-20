<?php 
	$this->extend('templates/template_frontend');
	$this->section('content'); 
?>

	<div class="container-fluid container-fluid-mr pt-5" style="position: relative;">
		<div class="row justify-content-center align-items-center pb-2">
			<div class="col-6">
				<div>Em Alta</div>
			</div>
			<div class="col-6">
				<div class="text-end"><i class="fas fa-sliders-h"></i> Filtros</div>
			</div>
		</div>
		<div class="row justify-content-center align-items-center">
			<?php
			if( isset($rs_eventos) && $rs_eventos->resultID->num_rows >= 1 ){
				foreach ($rs_eventos->getResult() as $row) {
					$evto_id = (int)($row->evto_id);
					$evto_hashkey = $row->evto_hashkey;
					$evto_urlpage = $row->evto_urlpage;
					$evto_titulo = $row->evto_titulo;
					$evto_descricao = $row->evto_descricao;
					$evto_imagem = $row->evto_imagem;
					$evto_gratuito = (int)($row->evto_gratuito);

					$src_imagem = '';
					$arq_img_path = $folderFotos . $evto_imagem;
					if( file_exists($arq_img_path) && !empty($arq_img_path) )
					{
						$src_imagem = base_url($arq_img_path);
						$src_imagem = '<img src="'. $src_imagem .'"" />';
					}

					$circle_money = "circle-money green";
					if( $evto_gratuito == 1 ){ $circle_money = "circle-money red"; }
			?>
			<div class="col-12 col-grid">
				<a href="<?php echo(site_url('escolha-ingresso/'. $evto_urlpage .'/'. $evto_id)); ?>"><div class="card-grid-item">
					<div class="img-mark imgOverflow">
						<div class="img-mark-image" style="z-index: 9;">
							<?php echo( $src_imagem ); ?>
						</div>
					</div>
					<div class="card-text">
						<p><?php echo( $evto_titulo ); ?></p>
						<p><?php echo( $evto_descricao ); ?></p>
					</div>
					<div class="<?php echo( $circle_money ); ?>"><i class="fas fa-dollar-sign"></i></div>
				</div></a>
			</div>
			<?php
				}
			}
			?>
			<div class="col-12 col-grid d-none">
				<div class="card-grid-item">
					<div class="img-mark imgOverflow">
						<div class="img-mark-image" style="z-index: 9;">
							<img src="assets/images/armstrong-painting.jpeg" />
						</div>
					</div>
					<div class="card-text">
						<p>Louis Armstrong Cover</p>
						<p>Ipating MG</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-md col-grid d-none">
				<a href="<?php echo(site_url('escolha-ingresso')); ?>"><div class="card-grid-item">
					<div class="img-mark imgOverflow">
						<div class="img-mark-image" style="z-index: 9;">
							<img src="assets/images/anitta-cover.jpg" />
						</div>
					</div>
					<div class="card-text">
						<p>Anitta Cover</p>
						<p>Ipaba - Praça</p>
					</div>
				</div></a>
			</div>
			<div class="col-12 col-md col-grid d-none">
				<div class="card-grid-item">
					<div class="img-mark imgOverflow">
						<div class="img-mark-image" style="z-index: 9;">
							<img src="assets/images/amy-winehouse-cover.jpg" />
						</div>
					</div>
					<div class="card-text">
						<p>Anitta Cover</p>
						<p>Ipaba - Praça</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-md col-grid d-none">
				<div class="card-grid-item">
					<div class="img-mark imgOverflow">
						<div class="img-mark-image" style="z-index: 9;">
							<img src="assets/images/avril-lavigne-cover.jpg" />
						</div>
					</div>
					<div class="card-text">
						<p>Louis Armstrong Cover</p>
						<p>Ipating MG</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-md col-grid d-none">
				<div class="card-grid-item">
					<div class="img-mark imgOverflow">
						<div class="img-mark-image" style="z-index: 9;">
							<img src="assets/images/adele-cover.jpg" />
						</div>
					</div>
					<div class="card-text">
						<p>Anitta Cover</p>
						<p>Ipaba - Praça</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-md col-grid d-none">
				<div class="card-grid-item">
					<div class="img-mark imgOverflow">
						<div class="img-mark-image" style="z-index: 9;">
							<img src="assets/images/anitta-cover.jpg" />
						</div>
					</div>
					<div class="card-text">
						<p>Anitta Cover</p>
						<p>Ipaba - Praça</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid container-fluid-mr pt-5 d-none" style="position: relative;">
		<div class="row justify-content-center align-items-center pb-2">
			<div class="col-6">
				<div>Stand-Ups</div>
			</div>
			<div class="col-6"></div>
		</div>
		<div class="row justify-content-center align-items-center">
			<div class="col-12 col-md col-grid">
				<div class="card-grid-item">
					<div class="img-mark imgOverflow">
						<div class="img-mark-image" style="z-index: 9;">
							<img src="assets/images/armstrong-painting.jpeg" />
						</div>
					</div>
					<div class="card-text">
						<p>Louis Armstrong Cover</p>
						<p>Ipating MG</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-md col-grid">
				<div class="card-grid-item">
					<div class="img-mark imgOverflow">
						<div class="img-mark-image" style="z-index: 9;">
							<img src="assets/images/anitta-cover.jpg" />
						</div>
					</div>
					<div class="card-text">
						<p>Anitta Cover</p>
						<p>Ipaba - Praça</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-md col-grid">
				<div class="card-grid-item">
					<div class="img-mark imgOverflow">
						<div class="img-mark-image" style="z-index: 9;">
							<img src="assets/images/amy-winehouse-cover.jpg" />
						</div>
					</div>
					<div class="card-text">
						<p>Anitta Cover</p>
						<p>Ipaba - Praça</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-md col-grid">
				<div>item 3</div>
			</div>
			<div class="col-12 col-md col-grid">
				<div>item 4</div>
			</div>
			<div class="col-12 col-md col-grid">
				<div>item 5</div>
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
