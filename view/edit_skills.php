<?php
    session_start();
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Edit skills</title>
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
						<a href="index.html" class="logo"><strong>Edit skills</strong> page</a>
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
                            <h3>Edit skills form</h3>
                          
                            <select name="name_select">
                                <option value="">Please select a skill</option>

                                <?php
                                    foreach($skills as $skill) {
                                ?>
                                    <option value="<?php echo $skill['id']; ?>"><?php echo $skill['id']; ?>. <?php echo $skill['name']; ?></option>
                                <?php 
                                    }
                                ?>
                            </select>
							
							<input type="hidden" name="id" id="id">
							<br>
							<label for="name">Chenge name skill</label>
                            <input type="text" name="name" id="name" required placeholder="Name">
                            <br>
							<label for="name">Add parent id or 0 if skill is the primary</label>
                            <input type="text" name="parent_id" id="parent_id" required placeholder="Parent id">
                            <br>
							<label for="name">Add skill for primary skill</label>
                            <input type="text" name="icon" id="icon" placeholder="Icon">
                            <br>
                            <button type="button" id="edit_skill_button">Edit</button>

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

				

				$('select[name="name_select"]').change(function() {
					var id = $('select[name="name_select"] option:selected').val();
					
					$.ajax({
						type:'POST',
						url:'/select_skill',
						dataType: 'JSON',
						data:{
							id:id
						},
						success:function(result) {
							
							if(result != null) {
								$('input[name="id"]').val(result[0].id);
								$('input[name="name"]').val(result[0].name);
								$('input[name="parent_id"]').val(result[0].parent_id);
								$('input[name="icon"]').val(result[0].icon);

							} else if(result) {
								var message;
								message = "<li class='alert alert-danger'>"+ result +"</li>";
								
								$(".message").css({"display":"block"});
								$( ".message" ).append(message);
							}
							
						}
					});
				});

				$('#edit_skill_button').click(function() {
					$( ".message_session" ).html('');
					$(".message").css({"display":"none"});
					$( ".message" ).html('');

					var id = $("#id").val();
					var name = $("#name").val();
                    var parent_id = $("#parent_id").val();
					var icon = $("#icon").val();

					if(id != "" && name != "" && parent_id != "" && icon != "") {

						$.ajax({
							type:'POST',
							url:'/update_skills',
							data:{
								id:id,
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