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
			<header>
				<div style="background-color: #0D2F5A; padding: 10px 0;">
					<div class="container-fluid container-fluid-mr" style="position: relative;">
						<div class="row justify-content-center align-items-center ">
							<div class="col-11 col-md-6">
								<div class="row justify-content-start align-items-center ">
									<div class="col-11 col-md-4">
										<a href="<?php echo( site_url('grid') ); ?>"><img src="assets/images/logotipo.png" class="logo" style="height:40px;" /></a>
									</div>
									<div class="col-11 col-md-5">
										<div class="form-group">
											<input class="form-control" placeholder="Cantores, bancas, locais..." />
										</div>
									</div>
									<div class="col-11 col-md-2"></div>
								</div>
							</div>
							<div class="col-11 col-md-6">
								<div class="row justify-content-center align-items-start">
									<div class="col-11 col-md-4">
										<div class="text-end"><i class="fas fa-map-marked-alt"></i> Cel. Fabriciano, MG</div>
									</div>
									<div class="col-11 col-md-4">
										<div class="text-end"><i class="far fa-question-circle"></i> Atendimento</div>
									</div>
									<div class="col-11 col-md-4">
										<?php if( session()->get('isLoggedIn') ){ ?>
											<div class="text-end">
												<div class="text-end"><?php echo( session()->get('cad_nome') ); ?> <i class="fas fa-user-circle"></i></div>
												<div class="text-end" style="line-height: 0;"><a href="<?php echo( site_url('logout') ); ?>" class="color-white" style="font-size: .7rem;">sair <i class="fas fa-sign-out-alt"></i></a></div>
											</div>
										<?php }else{ ?>
											<div class="text-end"><a href="<?php echo( site_url('login') ); ?>">Entrar <i class="fas fa-user-circle"></i></a></div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div style="background-color: #1F406B;">
					<div class="container-fluid container-fluid-mr" style="position: relative;">
						<div class="row justify-content-center align-items-center ">
							<div class="col-11 col-md-9">

								<nav class="navbar navbar-expand-lg navbar-light">
									<div class="">
										<!-- <a class="navbar-brand" href="#">Navbar</a> -->
										<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
											<span class="navbar-toggler-icon"></span>
										</button>
										<div class="collapse navbar-collapse" id="navbarSupportedContent">
											<ul class="navbar-nav me-auto mb-2 mb-lg-0">
												<li class="nav-item">
													<a class="nav-link active" aria-current="page" href="<?php echo( site_url('grid') ); ?>">Home</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="<?php echo( site_url('grid') ); ?>">Shows</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="<?php echo( site_url('grid') ); ?>">Cantores</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="<?php echo( site_url('grid') ); ?>">Locais</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="<?php echo( site_url('grid') ); ?>">Favoritos</a>
												</li>
											</ul>
										</div>
									</div>
								</nav>

							</div>
							<div class="col-11 col-md-3">
								<div class="text-end"><i class="fas fa-shopping-cart"></i> <a href="<?php echo( site_url('carrinho') ); ?>" class="color-white">Carrinho</a></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			
			<?php $this->renderSection('content'); ?>

		</main>
	</div>
	<script>
		let URL_BASE = '<?php echo(site_url()); ?>';
	</script>

	<?php $this->renderSection('scripts'); ?>

</body>
</html>
