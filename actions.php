<?php
  include('con.php');

  $action = $_REQUEST['action'];


  if($action == 'login') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_admin_users WHERE login = '$username' AND senha = '$password'";

    $query = mysql_query($sql, $conectado_ceabonline) or die(mysql_error());
    $query = mysql_fetch_array($query);

    if($query){

      $_SESSION['user_task_logged'] = $query['id_user'];
      $_SESSION['user_task_username'] = $query['name'];

      echo 1;

    }else{
      echo "Usuário não encontrado!";
    }

  }

  if($action == 'logout'){
	  $_SESSION['user_task_logged'] = false;
    $_SESSION['user_task_username'] = false;
    unset($_SESSION['user_task_logged']);
    unset($_SESSION['user_task_username']);
  }

  if ($action === 'insert') {
    $task      = $_POST['task'];
    $deadline  = date('Y-m-d', strtotime($_POST['deadline']));
    $to_user   = $_POST['to_user'];
    $from_user = $_POST['from_user'];
    $id_task   = $_POST['id_task'];

    $sql_insert = "INSERT INTO tasks (from_user, to_user, deadline, task_name, created_on, status)
           VALUES ($from_user, $to_user, '$deadline', '$task', NOW(), 0)";

    $sql_start_answer = mysql_query($sql_insert, $conectado_ceabonline) or die (mysql_error());

    if ($sql_start_answer) {//success
     echo 1;
    } else {
     echo 0;
    }

  }

  if ($action === 'edit') {
    $task      = $_POST['task'];
    $deadline  = date('Y-m-d', strtotime($_POST['deadline']));
    $to_user   = $_POST['to_user'];
    $from_user = $_POST['from_user'];
    $id_task   = $_POST['id_task'];

    $sql_update = "UPDATE tasks SET to_user = $to_user, deadline = '$deadline', task_name = '$task' WHERE id_task = $id_task";

    $sql_updated = mysql_query($sql_update, $conectado_ceabonline) or die (mysql_error());

    if ($sql_updated) {//success
     echo 1;
    } else {
     echo 0;
    }

  }


  if ($action === 'completed') {
    $sql_insert = "UPDATE tasks SET status = 1, finalized_on = NOW() WHERE id_task = " . $_POST['task_id'];

    $sql_start_answer = mysql_query($sql_insert, $conectado_ceabonline) or die (mysql_error());

    if ($sql_start_answer) {//success
     echo 1;
    } else {
     echo 0;
    }
  }


  if ($action === 'delete') {
    $sql_insert = "DELETE FROM tasks WHERE id_task = " . $_POST['task_id'];

    $sql_start_answer = mysql_query($sql_insert, $conectado_ceabonline) or die (mysql_error());

    if ($sql_start_answer) {//success
     echo 1;
    } else {
     echo 0;
    }
  }

  function is_logged(){
    if(!$_SESSION['user_task_logged']){
    ?>
    <script>window.location.href = "index.php";</script>
    <?php
    }
  }



?>