<?php
    session_start();
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Application</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Main -->
			<div id="main">
				<div class="inner">

					<!-- Header -->
					<header id="header">
						<a href="index.html" class="logo"><strong>Application</strong> page</a>
						<ul class="icons">
							<li><a href="https://www.facebook.com/profile.php?id=100009472169635&ref=bookmarks" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/dimasuk_00/?hl=uk" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="https://github.com/Dmytro-yakymuk" class="icon brands fa-github"><span class="label">Github</span></a></li>
						</ul>
					</header>


					<section>
					<?php


						if(isset($_SESSION['success_message'])) {
							echo "<ul class='message_session'>";
								foreach($_SESSION['success_message'] as $error){
									echo "<li class='alert alert-success'>". $error . "</li>";
								}
							echo "</ul>";
						}

						unset($_SESSION['success_message']);

						?>


						<ul class="message"></ul>
						

                        <form method="POST">
                            <h3>Send application form</h3>

                            <input type="text" name="name" id="name" required placeholder="Name">

                            <br>
                            <input type="email" name="email" id="email" required placeholder="Email">

                            <br>
							<textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>

							<script>
								CKEDITOR.replace('editor1');
							</script>
							<br>
                            <button type="button" id="send_application">Send</button>

                        </form> 



	
					</section>
				</div>
			</div>

			<!-- Sidebar -->
			<?php include_once('includes/sidebar.php') ?>

		</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {

				

				
				$('#send_application').click(function() {
					$( ".message_session" ).html('');
					$(".message").css({"display":"none"});
					$( ".message" ).html('');

					var name = $("#name").val();
                    var email = $("#email").val();
					var text = CKEDITOR.instances.editor1.getData();

					if( name != "" && email != "" && text != "") {

						$.ajax({
							type:'POST',
							url:'/send_application',
							data:{
								name:name,
                                email:email,
								text:text
							},
							success:function(response) {
								
								if(response == 'success') {
									window.location.href="application";
								} else if(response) {
									var message;
									message = "<li class='alert alert-danger'>"+ response +"</li>";
									
									$(".message").css({"display":"block"});
									$( ".message" ).append(message);
								}
								
							}
						});

					} else {
						var message;
						message = "<li class='alert alert-danger'>Enter all the fields</li>";
						
						$(".message").css({"display":"block"});
						$( ".message" ).append(message);
					}

					return false;
				});
			});
		</script>
	
		<script src="assets/js/browser.js"></script>
		<script src="assets/js/breakpoints.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>