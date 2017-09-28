<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
	Redirect::to('index.php');
}

if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'password_current' => array(
				'required' => true,
				'min' => 8
				),
			'password_new' => array(
				'required' => true,
				'min' => 8

				),
			'password_new_again' => array(
				'required' => true,
				'min' => 8,
				'matches' => 'password_new'
				)

			));

		if($validation->passed()){
			if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password){
				echo "Password Could Not Be Changed! Please Enter Valid Password.";
			}else{
				$salt=Hash::salt(32);
				$user->update(array(
					'password' => Hash::make(Input::get('password_new'),$salt),
					'salt' => $salt

					));

				Session::flash('home', 'Password Changed!');
				Redirect::to('index.php');
			}
		}else{
			foreach($validation->errors() as $error){
				echo $error, '<br>';

			}

		}
	}
}

?>

<html>
<head>
	<meta charset="utf-8">
	<title>Change Password@PASS</title>
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


	<fieldset>
	<h2>Change Password</h2>
	<form action="" method="post">
	<label for='password_current'>Current Password</label>
	<input type="password" name="password_current" id="password_current"><br>
	<label for='password_new'>New Password</label>
	<input type="password_new" name="password_new" id="password_new"><br>
	<label for='password_new_again'>Confirm Password</label>
	<input type="password_new_again" name="password_new_again" id="password_new_again"><br>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" value="Change">
	</form>
	</fieldset>

</body>

</html>