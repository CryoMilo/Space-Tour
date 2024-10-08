<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon-32x32.png">

	<!-- Google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;700&family=Bellefair&family=Barlow:wght@400;700&display=swap" rel="stylesheet">

	<!-- My CSS -->
	<link rel="stylesheet" href="index.css">
	<link rel="stylesheet" href="/css/button.css">

	<title>Space Tour</title>
</head>

<body>
	<header class="primary-header flex">
		<a href="./index.php">
			<img src="./assets/shared/logo.svg" alt="space tourism logo" class="logo">
		</a>
		<button class="mobile-nav-toggle" aria-controls="primary-navigation">
			<span class="sr-only" aria-expanded="false">Menu</span>
		</button>
		<nav>
			<ul id="primary-navigation" data-visible="false" class="primary-navigation underline-indicators flex">
				<li class="active"><a class="ff-sans-cond uppercase text-white letter-spacing-2" href="index.php"><span
							aria-hidden="true">00</span>Home</a></li>
				<li><a class="ff-sans-cond uppercase text-white letter-spacing-2" href="destination.html"><span
							aria-hidden="true">01</span>Destination</a></li>
				<li><a class="ff-sans-cond uppercase text-white letter-spacing-2" href="crew.html"><span
							aria-hidden="true">02</span>Crew</a></li>
				<li><a class="ff-sans-cond uppercase text-white letter-spacing-2" href="ship.html"><span
							aria-hidden="true">03</span>Ship</a></li>

				<!-- Conditionally display Login or Logout based on session -->
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
					<li><a class="ff-sans-cond uppercase text-white letter-spacing-2" href="logout.php"><span
								aria-hidden="true"></span>Logout</a></li>
				<?php else: ?>
					<li><a class="ff-sans-cond uppercase text-white letter-spacing-2" href="login.php"><span
								aria-hidden="true"></span>Login</a></li>
				<?php endif; ?>
			</ul>
		</nav>
	</header>

	<section class="grid-container grid-container--home home">
		<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
			<!-- Display user information if logged in -->
			<div style="display: flex; flex-direction: column; gap: 1rem;">
				<h1 class="text-accent fs-500 ff-sans-cond uppercase">Welcome back, <?php echo $_SESSION['username']; ?>!</h1>
				<p class="text-accent">
					You are all set for your next space adventure.
				</p>
				<p class="text-accent">If you wish to change your details, feel free to update them <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&pp=ygUJcmljayByb2xs">here</a>.</p>
			</div>
		<?php else: ?>
			<!-- Display default content if not logged in -->
			<div style="display: flex; flex-direction: column; gap: 1rem;">
				<h1 class="text-accent fs-500 ff-sans-cond uppercase">So, you want to travel to <span
						class="fs-900 ff-serif text-white d-block">Space</span> </h1>

				<p class="text-accent">
					Let’s face it; if you want to go to space, you might as well genuinely go to
					outer space and not hover kind of on the edge of it. Well sit back, and relax
					because we’ll give you a truly out of this world experience!</p>
			</div>

			<div>
				<a href="./form.html" class="uppercase large-button ff-serif fs-600 text-dark bg-white">Explore</a>
			</div>
		<?php endif; ?>

		<video autoplay muted loop id="earthVideo">
			<source src="./assets/home/earth-spinning.mp4" type="video/mp4">
		</video>

	</section>

	<script src="./index.js"></script>

</body>

</html>
