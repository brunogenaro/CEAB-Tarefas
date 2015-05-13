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
	
});