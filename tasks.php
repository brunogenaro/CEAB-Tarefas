<?php
	require_once('actions.php');
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
	<link rel="icon" href="../../favicon.ico">

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

  <body>

	<?php is_logged(); ?>

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
		<div id="navbar" class="navbar-collapse collapse">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="#" id="logout">Log Out</a></li>
		  </ul>
		  <form class="navbar-form navbar-right">
			<input type="text" id="search" class="form-control" placeholder="Procurar Tarefa...">
		  </form>
		</div>
	  </div>
	</nav>

	<div class="container-fluid">
	  <div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
		  <ul class="nav nav-sidebar">
			<li class="active"><a href="#all">Todas Tarefas <span class="sr-only">(current)</span></a></li>
			<li><a href="#submit-form">Adicionar Tarefa</a></li>
			<li><a href="#completed-tasks">Tarefas Completas</a></li>
			<li><a href="#opened-tasks">Tarefas em Aberto</a></li>
			<li><a href="#missed-deadline">Tarefas Atrasadas</a></li>
		  </ul>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		  <h1 class="page-header">Tarefas</h1>

		  <div class="submit-form toggle" id="formTask">
			<?php include('form.php'); ?>
		  </div>


		  <div class="opened-tasks toggle">
			<h2 class="sub-header">Tarefas em Aberto</h2>
			<div class="table-responsive" id="tasksOpened">
			  <?php $table = 'opened'; ?>
			  <?php include('table.php'); ?>
			</div>
		  </div>

		  <div class="completed-tasks toggle">
			  <h2 class="sub-header">Tarefas Completas</h2>
			  <div class="table-responsive" id="tasksCompleted">
				<?php $table = 'completed'; ?>
				<?php include('table.php'); ?>
			  </div>
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
