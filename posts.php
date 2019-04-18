<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#0047AB">
		<title>Posts</title>
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/css/main.css" type="text/css">
		<link rel="stylesheet" href="/css/posts.css" type="text/css">
	</head>
	<body>
		<header>
			<a id="logo" href="/">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/img/logo.svg")?>
			</a>
			<nav id="nav">
				<ul>
					<li><a href="/posts">Posts</a></li>
					<li><a href="#">Projects</a></li>
				</ul>
			</nav>
			<nav id="social">
				<a href="https://github.com/WeeRox/"><?php include($_SERVER["DOCUMENT_ROOT"] . "/img/social/github.svg")?></a>
				<a href="https://www.linkedin.com/in/aronbergman/"><?php include($_SERVER["DOCUMENT_ROOT"] . "/img/social/linkedin.svg")?></a>
				<a href="https://twitter.com/WeeRoxs"><?php include($_SERVER["DOCUMENT_ROOT"] . "/img/social/twitter.svg")?></a>
				<a href="https://www.facebook.com/aronbergman00"><?php include($_SERVER["DOCUMENT_ROOT"] . "/img/social/facebook.svg")?></a>
			</nav>
		</header>
		<main>
			<h1>Posts</h1>
			<div class="card">
				<a href="/posts/install-postfix-and-berkeley-db-from-source/">
					<h2>Install Postfix and Berkeley DB from source</h2>
				</a>
			</div>
		</main>
	</body>
</html>
