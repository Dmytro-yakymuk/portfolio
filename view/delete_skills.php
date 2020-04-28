<?php
    session_start();
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Delete skills</title>
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
						<a href="index.html" class="logo"><strong>Delete skills</strong> page</a>
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
                            <h3>Delete skills form</h3>
                          
                            <select name="name_select">
                                <option value="">Please select a skill for delete</option>

                                <?php
                                    foreach($skills as $skill) {
                                ?>
                                    <option value="<?php echo $skill['id']; ?>"><?php echo $skill['name']; ?></option>
                                <?php 
                                    }
                                ?>
                            </select>

							<br>
                            <button type="button" id="delete_skill_button">Delete</button>

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

				$('#delete_skill_button').click(function() {

					var id = $('select[name="name_select"] option:selected').val();

					$( ".message_session" ).html('');
					$(".message").css({"display":"none"});
					$( ".message" ).html('');

					if(id != "" ) {
						
						$.ajax({
							type:'POST',
							url:'/destroy_skills',
							data:{
								id:id
							},
							success:function(response) {
								
								if(response == 'success') {
									window.location.href="delete_skills";
								} else if(response) {
									var message = "<li class='alert alert-danger'>"+ response +"</li>";
									
									$(".message").css({"display":"block"});
									$( ".message" ).append(message);
								}
								
							}
						});
					} else {
						var message = "<li class='alert alert-danger'>Select skill!!!</li>";
						
						$(".message").css({"display":"block"});
						$( ".message" ).append(message);
					}
				});

			});
		</script>
	
		<script src="assets/js/browser.js"></script>
		<script src="assets/js/breakpoints.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>