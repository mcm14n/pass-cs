<?php
require_once 'core/init.php';


$user = new User();

if($user->isLoggedIn()){
	if($user->hasPermission('admin')){

?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Admin@Pass</title>
		<link rel="stylesheet" href="passcss.css">
	</head>

	<body class="home_pg">
		<header class="pgtitle">
		<h1>PASS@CS</h1>
		<pre><h2>	FLORIDA STATE UNIVERSITY</h2></pre>
		</header>

		<nav class="top_navbar_style">
		<ul class="top_navbar">
		<li><a href="index.php">Home</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="search.php">Search</a></li>
		<li><a href="tools.php">Tools</a></li>
		<li><a href="contact.php">Contact</a></li>
		</ul>
		</nav>


		<nav class="navsidebar">
			<p> Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->First_name);?></a>!</p>	
	
		<ul class="profile_links">
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

		<header>
		<h2>Welcome, Admin!</h2>
		<pre><h3>	Remember! With great power, comes great responsibility</h3></pre>
		</header>
		<main>
			<section>
				<header>
					<h2>Insert</h2>
				</header>
				<p>

				</p>
			</section>

			<section>
				<header>
					<h2>Delete</h2>
				</header>
				<p>
					
				</p>
			</section>

			<section>
				<header>
					<h2>Update</h2>
				</header>
				<p>
					
				</p>
			</section>

		</main>

	</body>

</html>





<?php

	}else{
		Redirect::to('502');
	}

}else{
	Redirect::to('index.php');
}



?>