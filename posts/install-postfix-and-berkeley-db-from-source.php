<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#0047AB">
		<title>Install Postfix and Berkeley DB from source</title>
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/css/main.css" type="text/css">
	</head>
	<body>
		<header>
			<a id="logo" href="/">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/img/logo.svg")?>
			</a>
			<nav id="nav">
				<ul>
					<li><a href="/posts/">Posts</a></li>
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
			<article>
				<h1>Install Postfix and Berkeley DB from source</h1>
				<time datetime="2019-04-04">2019-04-04</time>
				<p>A couple of months ago I started thinking about setting up an email address using my domain name. Naturally, I decided to set up my own email server, so I started reading up about <a href="https://en.wikipedia.org/wiki/Message_transfer_agent">Mail Transfer Agents</a> and <a href="https://en.wikipedia.org/wiki/Mail_delivery_agent">Mail Delivery Agents</a>. </p>
				<p>As you might have guessed I decided to use <a href="http://www.postfix.org/">Postfix</a> for the MTA and <a href="https://www.oracle.com/database/technologies/related/berkeleydb.html">Berkeley DB</a> for the database. </p>
				<h2>Requirements</h2>
				<p>Since we are going to install the software from source, you'll have to install the relevant build tools. Note that <code>m4</code> is required. It took me too long to figure out that it isn't installed in Ubuntu using <code>apt get build-essential</code></p>
				<h2>Berkeley DB</h2>
				<h2>Postfix</h2>
			</article>
		</main>
	</body>
</html>
