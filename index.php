<?php
	require "actions.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png">
      <link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
      <link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
      <link rel="manifest" href="favicons/manifest.json">
      <meta name="msapplication-TileColor" content="#da532c">
      <meta name="theme-color" content="#ffffff">

    <title>CEAB Tarefas</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <link id="bsdp-css" href="css/bootstrap-datepicker.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="login">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CEAB Tarefas</a>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
    	<div class="row">
				<div class="col-md-offset-4 col-md-4">
					<div class="panel panel-default login-panel">
					  <div class="panel-heading">
					    <h3 class="panel-title"><img src="http://www.ceabonline.com.br/images/logocea.png" /></h3>
					  </div>
					  <div class="panel-body">
					    <form id="login-form">
							  <div class="form-group">
							    <label for="username">Nome de Usu&aacute;rio</label>
							    <input type="text" class="form-control" id="username" name="username" placeholder="Nome de Usu&aacute;rio">
							  </div>
							  <div class="form-group">
							    <label for="password">Senha</label>
							    <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
							  </div>
							  <button type="submit" class="btn btn-default">Logar</button>

							  <div class="alert alert-danger login-msg" id="login-message" role="alert">Usuário não encontrado!</div>

							</form>
					  </div>
					</div>
				</div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Datepickers -->
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="locales/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>

		<script src="js/script.js"></script>

  </body>
</html>
