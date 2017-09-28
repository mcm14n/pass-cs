<?php
require_once 'core/init.php';


if (Session::exists('home')){
	echo '<p>'.Session::flash('home').'</p>';
}
 
$user = new User();
if($user->isLoggedIn()){
?>
<html>
	<head>
	<meta charset="UTF-8">
	<title>PASS@CS</title>
	<link rel="stylesheet" text="text/css" href="webstyle.css">
	</head>
	<body>
<img style="float:right; margin-right:30px; margin-top:5px" src="http://saintpetersblog.com/wp-content/uploads/2016/02/FSU.png" alt="FSU logo"
	height="100" width="100">
	<header class="pgtitle">
	<h1>PASS@CS</h1>
	<h2 class="fsuheading">FLORIDA STATE UNIVERSITY</h2>
	
	</header>


	
	<nav class="topnav">
	<ul>
	<li><a class="topactive" href="index.php">Home</a></li>
	<li><a href="about.php">About</a></li>
	<li><a href="search.php">Search</a></li>
	<li><a href="tools.php">Tools</a></li>
	<li><a href="contact.php">Contact</a></li>
	</ul>
	</nav>

	<div class="sidediv">
	<nav class="sidenav">	
	<ul>
	<li><p class="greet">Welcome</p>
    <li><a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->First_name); echo '!';?></a></li></li>	
	<li><a href="profile.php">Profile</a></li>
	<li><a href="update.php">Update Profile</a></li>
	<li><a href="changepassword.php">Change Password</a></li>

<?php
	
	if($user->hasPermission('admin')){
		echo '<li><a href="admin.php">Admin</a></li>';
	}

?>

	<li><a href="logout.php">Logout</a></li>
	</ul>
	</nav>
	</div>

	<main>
	<section>
		<header class="sectionhd">
			<h2>Important Announcements</h2>
		</header>

			<article>
				<header class="articlehd">
					<h3>CIS4360 - Intro to Computer Security *Fall 2016 Cancelled*</h3>
				</header>
					<p class="pformat">

					</p>
			</article>

			<article>
				<header class="articlehd">
					<h3></h3>
				<header>
					<p class="pformat">
					</p>
			</article>

			<article>
				<header class="articlehd">
					<h3></h3>
				</header>
					<p class="pformat">
					</p>
			</article>

	</section>


	<section>
		<header class="sectionhd">
			<h2>Helpful Tips</h2>
		</header>


		<article>
			<header class="articlehd">
					<h3></h3>
			</header>
					<p class="pformat">
					</p>
		</article>

		<article>
			<header class="articlehd">
					<h3></h3>
			</header>
					<p class="pformat">
					</p>
		</article>

		<article>
			<header class="articlehd">
					<h3></h3>
			</header>
					<p class="pformat">
					</p>
		</article>

	</section>

	</main>
	
	<footer>

			<nav class="botnav">
				<ul>
					<li class="quickhd">QUICK LINKS:</li>	
					<li><a href="http://www.cs.fsu.edu">Computer Science</a></li>
					<li><a title="top" href="#">|</a>
					<li><a  href="http:://www.my.fsu.edu">myFSU</a></li>
					<li><a title="top" href="#">|</a>
					<li><a  href="https://cas.fsu.edu/cas/login?service=https%3A%2F%2Fcampus.fsu.edu%2Fwebapps%2Fbb-auth-provider-cas-bb_bb60%2Fexecute%2FcasLogin%3Fcmd%3Dlogin%26authProviderId%3D_105_1%26redirectUrl%3Dhttps%253A%252F%252Fcampus.fsu.edu%252Fwebapps%252Fportal%252Fframeset.jsp%26sessionIdForLogout%3D9277570BC0CB5E053B78A740659D5980">Blackboard</a></li>
					<li><a title="top" href="#">|</a>
					<li><a href="https://www.webassign.net/login.html">Webassign</a><li>
					<li><a title="top" href="#">|</a>
					<li><a href="http://www.stackoverflow">Stack Overflow</a></li>
					<li><a title="top" href="#">|</a>
					<li><a href="http://www.w3schools.com">W3Schools</a></li>
					<li><a title="top" href="#">|</a>
					<li><a href="http://www.youtube.com">Youtube</a></li>
				</ul>
			</nav>
	</footer>

	</body>
</html>

<?php
}else{

?>
	<html>
	<head>
		<meta charset="UTF-8">
		<title>PASS@CS</title>
		<link rel="stylesheet" text="text/css" href="webstyle.css">
	</head>
	<body>
	<img style="float:right; margin-right:30px; margin-top:5px" src="http://saintpetersblog.com/wp-content/uploads/2016/02/FSU.png" alt="FSU logo"
	height="100" width="100">
	<header class="pgtitle">
	<h1>PASS@CS</h1>
	<h2 class="fsuheading">FLORIDA STATE UNIVERSITY</h2>
	
	</header>

	<nav class="topnav">
	<ul>
	<li><a href="login.php">Log In</a></li>
	<li><a href="register.php">Register</a></li>
	</ul>
	</nav>

	<img src="https://m.fsu.edu/_dynamic/default/fsuDefault-5b2299901d123848e7bc072d4b0fafe1/loader/resolve-kurogo/fileloader/images/1cb1da622422762b1c49d1f60f5b8488-061c1955f9b971888a037405804a61e6.jpg" width=1300px>

	</body>
	</html>

<?php

}

?>



