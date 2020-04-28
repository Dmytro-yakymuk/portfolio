<?php
    session_start();
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Add skills</title>
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
						<a href="index.html" class="logo"><strong>Add skills</strong> page</a>
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
                            <h3>Add skills form</h3>
                          
							<label for="name">Enter name skill</label>
                            <input type="text" name="name" id="name" required placeholder="Name">
                            <br>
							<label for="name">Add parent id or 0 if skill is the primary</label>
                            <input type="text" name="parent_id" id="parent_id" required placeholder="Parent id">
                            <br>
							<label for="name">Add skill for primary skill</label>
                            <input type="text" name="icon" id="icon" placeholder="Icon">
                            <br>
                            <button type="button" id="add_skill_button">Add</button>

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

				

				
				$('#add_skill_button').click(function() {
					console.log("sdfg");

					$( ".message_session" ).html('');
					$(".message").css({"display":"none"});
					$( ".message" ).html('');

					var name = $("#name").val();
                    var parent_id = $("#parent_id").val();
					var icon = $("#icon").val();

					if( name != "" && parent_id != "" && icon != "") {

						$.ajax({
							type:'POST',
							url:'/insert_skills',
							data:{
								name:name,
                                parent_id:parent_id,
								icon:icon
							},
							success:function(response) {
								
								if(response == 'success') {
									window.location.href="edit_skills";
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