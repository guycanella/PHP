
<!DOCTYPE html>

<html>
	<head>
		<title>Chat with PHP and AJAX</title>
		<meta charset="utf-8" >
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<style>
			.chatBox{
				border:1px solid #ccc;
				border-radius:2px;
				width:50%;
				min-height:200px;
				padding:1%;
				margin-bottom:1%;
							}
			input[type=text]{
				margin-bottom:0.5%;
			}
		</style>
		<script>
			jQuery(document).ready(function(){
				$('.chatBox').load("msgs.php");
				function poll(){
					$('.chatBox').load("msgs.php");
				}
				setInterval(poll, 5000);

				$("#textIn").keyup(function(event){
					if(event.keyCode == 13){
						var data = $('form').serialize();
						$.ajax({
							url		: 'link.php',
							data	: data,
							method	: 'POST',
							dataType: 'json',
							success	: function(res){
								if(res){
									$('#nomeIn').val('');
									$('#textIn').val('');
									$('.chatBox').load("msgs.php");
								}
							}
						});
					}
				});

				$('#send').click(function(e){
					e.preventDefault();
					var data = $('form').serialize();
					$.ajax({
						url		: 'link.php',
						data	: data,
						method	: 'POST',
						dataType: 'json',
						success	: function(res){
							if(res){
								$('#nameIn').val('');
								$('#textIn').val('');
								$('.chatBox').load("msgs.php");
							}
						}
					});
				});
			});
		</script>
	</head><!-- END HEAD -->

	<body>
		<div class="chatBox"></div> <!-- END DIV -->

		<div class="msgBox">
			<form method="post" >
				<input type="text" name="nome" id="nameIn"><br />
				<textarea name="msg" rows="5" cols="30" id="textIn"></textarea><br />
				<input type="submit" id="send" value="Enviar">
			</form><!-- END FORM -->

		</div> <!-- END DIV -->

	</body><!-- END BODY -->

</html><!-- END HTML -->
