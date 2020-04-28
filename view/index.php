<!DOCTYPE HTML>

<html>
	<head>
		<title>My Portfolio</title>
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
						<a href="index.html" class="logo"><strong>Home</strong> page</a>
						<ul class="icons">
							<li><a href="https://www.facebook.com/profile.php?id=100009472169635&ref=bookmarks" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/dimasuk_00/?hl=uk" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="https://github.com/Dmytro-yakymuk" class="icon brands fa-github"><span class="label">Github</span></a></li>
						</ul>
					</header>

					<!-- Banner -->
					<section id="banner">
						<div class="content">
							<header>
								<h1>Hi, I’m Dmytro<br />
									and I’m Programmer</h1>
								<p>A few words about yourself</p>
							</header>
							<?php echo $about_me[0]['text']; ?>
							<ul class="actions">
								<li><a href="/about" class="button big">Learn More</a></li>
							</ul>
						</div>
						<span class="image object">
							<img src="images/IMG_20160527_125823.jpg" alt="" />
						</span>
					</section>

					<!-- Section -->
					<section>
						<header class="major" id="learn_more">
							<h2>My Skills</h2>
						</header>
						<div class="features">

							<?php 
							foreach($skills as $skill)
							{
								if($skill['parent_id'] == 0)
								{
							?>
								<article>
									<span class="icon solid <?php echo $skill['icon']; ?>"></span>
									<div class="content">
										<h3><?php echo $skill['name']; ?></h3>
										<ul>
											<?php
											foreach($skills as $sk)
											{
												if($skill['id'] == $sk['parent_id'])
												{
											?>
													<li><?php echo $sk['name']; ?></li>
											<?php 
												}
											}
											?>
										</ul>
									</div>
								</article>
							<?php 
								}
							}
							?>

						</div>
					</section>
				</div>
			</div>

			<!-- Sidebar -->
			<?php include_once('includes/sidebar.php') ?>
			
		</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.js"></script>
		<script src="assets/js/breakpoints.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>