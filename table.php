<?php

require_once('actions.php');

if (!$table) {
  $table = $_GET['table'];
}

if (isset($_GET['search'])) {
  $add_search = " AND t.task_name LIKE '%" .$_GET['search']. "%' ";
}

if ($table == 'opened') { ?>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Tarefa</th>
      <th>Prazo</th>
      <th>Para</th>
      <?php if ($_SESSION['user_task_logged'] == 1) { ?><th>Ações</th><?php } ?>
    </tr>
  </thead>
  <tbody>
  <?php
  if ($_SESSION['user_task_logged'] == 1) {
    $sql_can =  "SELECT t.*, ta.name AS to_name FROM tasks t INNER JOIN tb_admin_users ta ON t.to_user = ta.id_user WHERE t.status = 0 $add_search ORDER BY t.deadline ASC";
  } else {
    $sql_can = "SELECT t.*, ta.name AS to_name FROM tasks t INNER JOIN tb_admin_users ta ON t.to_user = ta.id_user WHERE t.status = 0 $add_search AND t.to_user = " . $_SESSION['user_task_logged'] . " ORDER BY t.deadline ASC";
  }

  $sql_can =  mysql_query($sql_can, $conectado_ceabonline);

    $row_can = mysql_num_rows($sql_can);

    if (($row_can > 0) and ($sql_can == true)) {
      while($data_can = mysql_fetch_array($sql_can)) {
        $id_task = $data_can["id_task"];
        $to_user = $data_can["to_name"];
        $deadline = strtotime($data_can["deadline"]);
        $deadlineFormatted = date('d/m/Y', strtotime($data_can["deadline"]));
        $task_name = $data_can["task_name"];
        $created_on = date('d/m/Y', strtotime($data_can["created_on"]));
  ?>
    <tr<?php if ($deadline < strtotime(date('Y-m-d'))) { ?> class="missed-deadline"<?php } ?>>
      <td><input type="checkbox" name="task_id" class="task_id" value="<?php echo $id_task; ?>" /></td>
      <td>
        <?php echo $task_name; ?>
      </td>
      <td><?php echo $deadlineFormatted; ?></td>
      <td><?php echo $to_user; ?></td>
      <?php if ($_SESSION['user_task_logged'] == 1) { ?>
      <td>
        <i class="glyphicon glyphicon-pencil edit" data-id="<?php echo $id_task; ?>"></i>
        <i class="glyphicon glyphicon-remove delete" data-id="<?php echo $id_task; ?>"></i>
      </td>
      <?php } ?>
    </tr>
    <?php
        }
      }
    ?>
  </tbody>
</table>
<?php  } ?>

<?php if ($table == 'completed') { ?>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Tarefa</th>
      <th>Prazo</th>
      <th>Completa Em</th>
      <th>Para</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if ($_SESSION['user_task_logged'] == 1) {
    $sql_can =  "SELECT t.*, ta.name AS to_name FROM tasks t INNER JOIN tb_admin_users ta ON t.to_user = ta.id_user WHERE t.status = 1 $add_search ORDER BY t.finalized_on DESC";
  } else {
    $sql_can = "SELECT t.*, ta.name AS to_name FROM tasks t INNER JOIN tb_admin_users ta ON t.to_user = ta.id_user WHERE t.status = 1 $add_search AND t.to_user = " . $_SESSION['user_task_logged'] . " ORDER BY t.finalized_on DESC";

  }
  $sql_can =  mysql_query($sql_can, $conectado_ceabonline);

    $row_can = mysql_num_rows($sql_can);

    if (($row_can > 0) and ($sql_can == true)) {
      while($data_can = mysql_fetch_array($sql_can)) {
        $id_task = $data_can["id_task"];
        $to_user = $data_can["to_user"];
        $to_name = $data_can["to_name"];
        $deadline = strtotime($data_can["deadline"]);
        $deadlineFormatted = date('d/m/Y', strtotime($data_can["deadline"]));
        $task_name = $data_can["task_name"];
        $finalized_on = date('d/m/Y H:i:s', strtotime($data_can["finalized_on"]));
  ?>
    <tr class="completed">
      <td>
        <strike><?php echo $task_name; ?></strike>
      </td>
      <td><?php echo $deadlineFormatted; ?></td>
      <td><?php echo $finalized_on; ?></td>
      <td><?php echo $to_name; ?></td>
    </tr>
    <?php
        }
      }
    ?>
  </tbody>
</table>
<?php  } ?>