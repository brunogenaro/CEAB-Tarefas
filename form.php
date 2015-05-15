<?php
	require_once('actions.php');

	if ($_GET['task_id']) {
		$sql_can = "SELECT * FROM tasks  WHERE id_task = " . $_GET['task_id'];

		$sql_can =  mysql_query($sql_can, $conectado_ceabonline);

		  $row_can = mysql_num_rows($sql_can);

		  if (($row_can > 0) and ($sql_can == true)) {
		    while($data_can = mysql_fetch_array($sql_can)) {
		      $id_task  = $data_can["id_task"];
		      $task     = $data_can["task_name"];
		      $deadline = date("d/m/Y", strtotime($data_can["deadline"]));
		      $to_user  = $data_can["to_user"];
		      $action   = 'edit';
		    }
		  }
	}

	if (!$action) {
		$action = 'insert';
	}

?>
<form id="addTask" method="POST">
  <input type="hidden" name="from_user" id="from_user" value="<?php echo $_SESSION['user_task_logged']; ?>" />
  <input type="hidden" name="id_task" id="id_task" value="<?php echo $id_task; ?>" />
  <input type="hidden" name="action" id="action" value="<?php echo $action; ?>" />
  <div class="form-group">
	<label for="to_user">Para:</label>
	<select class="form-control" name="to_user" id="to_user" multiple="multiple"<?php if ($to_user) { ?> disabled<?php } ?>>
	  <?php
	  $sql = "SELECT * FROM tb_admin_users WHERE status = 1 ORDER BY name ASC";

		$query = mysql_query($sql, $conectado_ceabonline) or die(mysql_error());

		 while($data = mysql_fetch_array($query)) {

			$user_id 		= $data['id_user'];
			$user_name 	= $data['name'];

			if ($to_user) {
				if ($to_user == $user_id) {
					echo "<option value='$user_id' selected>$user_name</option>";
				} else {
					echo "<option value='$user_id'>$user_name</option>";
				}
			} else {
				echo "<option value='$user_id'>$user_name</option>";
			}


		}

		?>

	</select>
  </div>
  <div class="form-group">
	<label for="task">Tarefa</label>
	<input type="text" class="form-control" id="task" placeholder="Tarefa" value="<?php echo $task; ?>">
  </div>
  <div class="form-group">
	<label for="deadline">Prazo</label>
	<input type="text" class="form-control datepicker" id="deadline" readonly placeholder="Prazo" value="<?php echo $deadline; ?>">
  </div>
	<?php
	if ($action == 'insert') {
		$text = "Adicionar";
	} else {
		$text = "Editar";
	}

	?>
  <button type="submit" class="btn btn-primary" id="btnText"><?php echo $text; ?> Tarefa</button>
</form>