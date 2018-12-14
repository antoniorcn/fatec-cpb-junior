<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>		
		<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>	
	</head>

	<body>
	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/img-02.png" alt="IMG"/>
			</div>

			<form class="contact1-form validate-form">
				<?php
					session_start();
					if (isset($_SESSION['MENSAGEM'])) {
						$msg = $_SESSION['MENSAGEM'];
				?>
					<span class="contact1-form-title">
						<strong><?=$msg?></strong>
					</span>
				<?php 
						unset($_SESSION['MENSAGEM']);
					} 
				?>			

				<div class="container-contact1-form-btn">
					<span>
						Você já pode fechar esta janela do navegador
					</span>
				</div>
			</form>
		</div>
	</div>
	<div>
		<p>personal development by Vectors Market from the Noun Project</p>
	</div>

	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	</body>

</html>
