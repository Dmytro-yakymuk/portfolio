<?php
    session_start();
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Main -->
			<div id="main">
				<div class="inner">

					<!-- Header -->
					<header id="header">
						<a href="index.html" class="logo"><strong>Login</strong> page</a>
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
							<h3>Login form</h3>
							<input type="text" name="login" id="login" required placeholder="Login">
							<br>
							<input type="password" name="password" id="password" required placeholder="Password">
							<br>
							<button type="button" id="login_button">login</button>

							<!-- <div>
								<span> Don’t have an account? </span>

								<a href="/register">
									Sign Up
								</a>
							</div> -->

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
				$('#login_button').click(function() {

					$( ".message_session" ).html('');
					$(".message").css({"display":"none"});
					$( ".message" ).html('');

					var login = $("#login").val();
					var password = $("#password").val();

					if(login != "" && password != "") {

						$.ajax({
							type:'POST',
							url:'/auth',
							data:{
								login:login,
								password:password
							},
							success:function(response) {
								
								if(response == 'success') {
									window.location.href="/";
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
						message = "<li class='alert alert-danger'>Заповніть всі поля</li>";
						
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