<?php
require_once 'core/init.php';


$user = new User();
if($user->isLoggedIn()){

?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>About@PASS</title>
		<link rel="stylesheet" href="webstyle.css">
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
				<li><a href="index.php">Home</a></li>
				<li><a class="topactive" href="about.php">About</a></li>
				<li><a href="search.php">Search</a></li>
				<li><a href="tools.php">Tools</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>

		<nav class="sidenav">
			<ul>
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

		<main>
		<section>
				<header>
					<h2 class="sectionhd">Statement</h2>
				</header>
			<article>
				     <h3>Thesis</h3>
			</article>
		</section>

		<section>
			<header>
				<h2 class="sectionhd">The Team</h2>
			</header>

			<article class="articlep1">
				<header>
					<h3 class="articlehd">Michael Mullings</h3>
					<h4 class="articlesub">Profile</h4>
				</header>
				<p>
				</p>
			</article>

			<article class="articlep2">
				<header>
					<h3 class="articlehd">James "Dustin" Moody </h3>
					<h4 class="articlesub">Profile</h4>
				</header>
				<p>
				</p>
			</article>

		</section>


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
<html>


<?php
}else{
	Redirect::to('index.php');

}

?>
