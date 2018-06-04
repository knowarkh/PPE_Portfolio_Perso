<?php
require_once "recaptchalib.php";

// enregistrer domaine API keys at https://www.google.com/recaptcha/admin
$siteKey = "6LeSDVUUAAAAAKbj0qGa8BUYviT-_I2KTF40Fz_Q";
$secret = "6LeSDVUUAAAAACtz20AdrRhhqbgDwbQo7egHwg1d";

// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = "fr";

// The response from reCAPTCHA
$resp = null;

// The error code from reCAPTCHA
$error = null;
$reCaptcha = new ReCaptcha($secret);

// Was there a reCAPTCHA response?
if (isset($_POST["g-recaptcha-response"])) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
        );
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<title>Contact Arnaud COLLET</title>

<!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="assets/css/main.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/chart.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>
<?php
if ($resp != null && $resp->success) {
    echo "Validé!";
}
?>
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html"><i class="fa fa-home"></i></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-left">
					<!--<li><a href="../index.php">Retour au site</a></li>-->
					<li><a class="nav-item nav-link" href="tabTemp.html">Tableau de compétences</a></li>
					<li><a class="nav-item nav-link" href="page_PPE.html">PPE</a></li>
					<li><a class="nav-item nav-link" href="page_stage.html">Stage</a></li>
					<li><a class="nav-item nav-link" href="page_doc.html">Documentation</a></li>
					<li><a class="nav-item nav-link" href="page_veille.html">Veille</a></li>
					<li><a class="nav-item nav-link" href="templateCV/index.html" target="_blank">CV</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="text-center" style="position:relative; top:100px;">
		<div class="container">
			<div class="section-title center">
				<h2>Contactez-moi !</h2>
				<div>
					<i class="fa fa-envelope"></i>
					<p>pro@collet-arnaud.fr</p>
				</div>
				<hr>
			</div>
			<div class="col-md-8 col-md-offset-2">
			<h3>Par mail ou par ce formulaire</h3>
				<form action="envoi.php" method="post" accept-charset="utf-8">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="name" id="name" class="form-control"
									placeholder="Votre nom" required="required">
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control"
									placeholder="Votre Email" required="required">
								<p class="help-block text-danger"></p>
							</div>
						</div>
					</div>
					<div class="form-group">
						<textarea name="message" id="message" class="form-control"
							rows="4" placeholder="Votre message" required="required"></textarea>
						<p class="help-block text-danger"></p>
					</div>
					<div id="success"></div>
					<!--Recaptcha fonctionne uniquement en ligne https://www.collet-arnaud.fr-->
					<div class="row">	
						<div align="center" class="g-recaptcha" data-sitekey="6LeSDVUUAAAAAKbj0qGa8BUYviT-_I2KTF40Fz_Q"></div>
						<input type="submit" class="btn btn-theme" value="Envoyer">
					</div>
				</form>
				<script src='https://www.google.com/recaptcha/api.js'></script>
			</div>
		</div>
	</div>
<!-- 	<script src="assets/js/script.js"></script> -->
</body>	
</html>