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

	<!-- VueJs -->
	<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.22.0/axios.min.js" integrity="sha512-m2ssMAtdCEYGWXQ8hXVG4Q39uKYtbfaJL5QMTbhl2kc6vYyubrKHhr6aLLXW4ITeXSywQLn1AhsAaqrJl8Acfg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body class="bg-blue-gradient">
	<div id="app">

		<main class="flex-align">
			
			<?php $this->renderSection('content'); ?>

		</main>

	</div>
	<script>
		let URL_BASE = '<?php echo(site_url()); ?>';
	</script>

	<?php $this->renderSection('scripts'); ?>

</body>
</html>
