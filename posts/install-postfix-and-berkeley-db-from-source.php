<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#0047AB">
		<title>Install Postfix and Berkeley DB from source</title>
		<meta name="description" content="A guide on how to build and install Postfix with support for the Berkeley DB database.">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/css/main.css" type="text/css">
	</head>
	<body>
		<?php include($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>
		<main>
			<article>
				<h1>Install Postfix and Berkeley DB from source</h1>
				<time datetime="2019-04-23">2019-04-23</time>
				<p>A couple of months ago I started thinking about setting up an email address using my domain name. Naturally, I decided to set up my own email server, so I started reading about <a href="https://en.wikipedia.org/wiki/Message_transfer_agent">Mail Transfer Agents</a> and <a href="https://en.wikipedia.org/wiki/Mail_delivery_agent">Mail Delivery Agents</a>. </p>
				<p>As you might have guessed I decided to use <a href="http://www.postfix.org/">Postfix</a> for the MTA and <a href="https://www.oracle.com/database/technologies/related/berkeleydb.html">Berkeley DB</a> for the database for aliases and such. </p>
				<h2>Requirements</h2>
				<p>Since we are going to install the software from source, you'll have to install the relevant build tools. Note that <code>m4</code> is required. It took me too long to figure out that it isn't installed in Ubuntu using <code>apt get build-essential</code>. </p>
				<h2>Berkeley DB</h2>
				<p>The most natural way to download Berkeley DB would be through <a href="https://www.oracle.com/technetwork/database/database-technologies/berkeleydb/downloads/index.html">Oracle's own website</a>, but for some reason it requires a login. After som searching I found a direct link to download the archive in <a href="http://www.linuxfromscratch.org/blfs/view/8.2/server/db.html">version 8.2 of the BLFS book</a>. I tried playing around with the version number, but this seems to be the latest version that can be downloaded this way. </p>
				<p>After downloading and unpacking the archive you can read the documentation in the <code>docs/</code> folder using a browser, since it is written in HTML. I also found <a href="https://docs.oracle.com/cd/E17076_05/html/installation/">the documentation online</a>.</p>
				<p>If you are building on Linux you can skip directly to <a href="https://docs.oracle.com/cd/E17076_05/html/installation/build_unix.html">"Building Berkeley DB for UNIX/POSIX"</a>. It will instruct you to change directory into <code>build_unix</code> and issue the commands <code>../dist/configure</code> and <code>make</code>, but before doing that you should take a look at the <a href="https://docs.oracle.com/cd/E17076_05/html/installation/build_unix_install.html">installation directories</a>. One thing that stands out is the default prefix, which is set to <code>/usr/local/BerkeleyDB.Major.Minor</code>, which is probably useful if you'd like to <a href="https://docs.oracle.com/cd/E17076_05/html/installation/install_multiple.html">install multiple versions of Berkeley DB</a>, so if you don't think that you will be doing that you may change the prefix to <code>/usr/local</code>. </p>
				<p>After running <code>../dist/configure --prefix=/usr/local</code> and <code>make</code> you may run <code>make install</code> to install Berkeley DB. </p>
				<h2>Postfix</h2>
				<p>When building Postfix you may consult the <a href="http://www.postfix.org/INSTALL.html">Postfix installation guide</a> and the <a href="http://www.postfix.org/DB_README.html">instruction on building Postfix with Berkeley DB</a>. </p>
				<p>If you've skimmed through the documentation you have probably noticed that Postfix doesn't use the common <code>./configure</code>, <code>make</code> and <code>make install</code>. It instead uses the <code>make makefiles</code> command instead of <code>./configure</code>, which invokes a bash script called <a href="https://github.com/vdukhovni/postfix/blob/master/postfix/makedefs"><code>makedefs</code></a> which is rather long. It starts with a switch case on the system name and version. </p>
				<p>If you scroll down to the Linux case you can see that it checks the <code>CCARGS</code> variable for <code>-DNO_DB</code> or <code>-DHAS_DB</code>. If it doens't contain any of these options it will search for the header file that presumably was installed with Berkeley DB, but it will only search in <code>/usr/include</code> and <code>/usr/include/db</code>, while the header file we installed is placed in <code>/usr/local/include</code> (if the <code>--prefix</code> option was set to <code>/usr/local</code>). If you see the error <code>No &lt;db.h&gt; include file found.</code>, this is most likely the problem. </p>
				<p>To make sure that Postfix can build correctly with Berkeley DB you should run the command <code>make makefiles CCARGS="-DHAS_DB -I/usr/local/include" AUXLIBS="-L/usr/local/lib -ldb"</code>. When that is done you can run <code>make</code>.</p>
				<p>The next step is to create a user and two groups that Postfix will use. Instructions on how to do that can be found in the Postfix installation guide under <a href="http://www.postfix.org/INSTALL.html#install">6.2 - Create account and groups</a> or in the <a href="http://www.linuxfromscratch.org/blfs/view/8.2/server/postfix.html">BLFS instructions on installing Postfix</a>. </p>
				<p>If this is the first time you install Postfix on this computer you should run <code>make install</code>, which will create configuration files and data directories. If you are doiing an upgrade, you should run <code>make upgrade</code>. </p>
				<p>If you run the <code>make install</code> command it will ask you for pathnames for commands and configurations etc. I find the default paths work very well. It will also ask for the names of the user and groups that were previously created. </p>
				<p>After the installation is complete you can start your new mail server with <code>postfix start</code>. </p>
				<p>To get the server to function properly, check out the <a href="http://www.postfix.org/BASIC_CONFIGURATION_README.html">basic configuration</a>. </p>
			</article>
		</main>
	</body>
</html>
