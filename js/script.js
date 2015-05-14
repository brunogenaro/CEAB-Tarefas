jQuery(document).ready(function(){

	$('#login-form').on('submit',function(e){
		e.preventDefault();

		var data_html = $(this).serialize();

		$.post('actions.php?action=login', data_html, function(data){
			if(data == 1) {
				window.location.href = "tasks.php";
			}else{

				$('#login-message').html(data);

				$('#login-message').slideDown();

				setTimeout(function(){
					$('#login-message').slideUp();
				}, 4000);

			}
		});

	});

	$('#logout').click(function(e){
		e.preventDefault();

		$.post('actions.php', {action : 'logout'}, function(data){
			if(data == 1){
				window.location.href = "index.php";
			}else{
				alert(data);
			}
		});

	});


	$('body').on('focus', ".datepicker", function() {
		    $(this).datepicker({
				format: "dd/mm/yyyy",
				language: "pt-BR",
				autoclose: true,
				todayHighlight: true
			});
		});

		$('.nav-sidebar li').on('click', function(e) {
		  e.preventDefault();
		  e.stopPropagation();

		  var $this = $(this);

		  $('.nav-sidebar li').removeClass('active');
		  $this.addClass('active');

		  var target = $this.find('a').attr('href').replace('#', '');

		  if (target === 'all') {
			$('.opened-tasks tbody tr').show();
			$('.toggle').show();
		  } else if (target === 'missed-deadline') {
			$('.toggle').hide();
			$('.opened-tasks tbody tr:not(.missed-deadline)').hide();
			$('.opened-tasks').show();
		  } else {
			$('.toggle').hide();
			$('.opened-tasks tbody tr').show();
			$('.'+target).show();
		  }
		});


	$('#formTask').on('submit', '#addTask', function(e){
		e.preventDefault();
		e.stopPropagation();

		$.each($('#addTask input[type=text]'), function(index, el) {
		  if (!$(el).val()) {
			$(el).parent().addClass('has-error');
		  } else {
			$(el).parent().removeClass('has-error');
		  }
		});

		if ($('#task').val() && $('#deadline').val()) {
			var task              = $('#task').val();
			var deadline          = $('#deadline').val().split("/");
			//var deadlineFormatted = new Date(deadline[1] +'/'+ deadline[0] +'/'+ deadline[2]);
			var deadlineFormatted = deadline[1] +'/'+ deadline[0] +'/'+ deadline[2];
			var to_user           = $('#to_user').val();
			var from_user         = $('#from_user').val() || 1;
			var action            = $('#action').val();
			var id_task            = $('#id_task').val();

			$.post('actions.php', { action: action, task: task, deadline: deadlineFormatted, to_user: to_user, from_user: from_user, id_task: id_task }, function(data){
			  if (data == 1) {
				$.get('table.php', { table: 'opened' }, function(data2){
				  $('#tasksOpened').html(data2);
				});
			  }
			});

			//reload form
			$.get('form.php', function(data){
				$('#formTask').html(data);
			});

	  }

	});

	$('#tasksOpened').on('click', '.task_id', function(e) {
		var $this = $(this);
		var taskID = $(this).val();

		var r = confirm("Você confirma que a tarefa foi realizada?");
		if (r == true) {
		    $.post('actions.php', { action: 'completed', task_id: taskID }, function(data){
    		  if (data == 1) {
    			$.get('table.php', { table: 'completed' }, function(data2){
    			  $('#tasksCompleted').html(data2);
    			  $this.parent().parent().remove();
    			});
    		  }
    		});
		}
	});

	$('#tasksOpened').on('click', '.edit', function(e) {
		var $this = $(this);
		var taskID = $(this).data('id');

		$('html, body').animate({
	        scrollTop: $("#formTask").offset().top
	    }, 500);

		$.get('form.php', { task_id: taskID },  function(data){
			$('#formTask').html(data);
		});

	});

	$('#tasksOpened').on('click', '.delete', function(e) {
		var $this = $(this);
		var taskID = $(this).data('id');

		$.post('actions.php', { action: 'delete', task_id: taskID },  function(data){
			if (data == 1) {
				$this.parent().parent().remove();
			}
		});

	});

	$('#search').on('keyup', function(e) {
		$('html, body').animate({
	        scrollTop: $("#tasksOpened").offset().top
	    }, 500);

		$.get('table.php', { table: 'opened', search: $(this).val()  }, function(data2){
		  $('#tasksOpened').html(data2);
		});

		$.get('table.php', { table: 'completed', search: $(this).val()  }, function(data2){
		  $('#tasksCompleted').html(data2);
		});

	});

	var refreshTables = function(e) {
		$.get('table.php', { table: 'opened' }, function(data2){
		  $('#tasksOpened').html(data2);
		});

		$.get('table.php', { table: 'completed' }, function(data2){
		  $('#tasksCompleted').html(data2);
		});
	};
	$('#refresh').on('click', function(e){
		refreshTables();
	});

	setInterval(function() {
		refreshTables()
	}, 60000);

});