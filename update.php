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
			'First_name' => array(
				'required' => true,
				'min' => 2,
				'max' => 50 
				),
			'Last_name' => array(
				'required' => true,
				'min' => true,
				'max' => 50
				)
			));

		if($validation->passed()){
			try{
				$user->update(array(
					'First_name' => Input::get('First_name'),
					'Last_name' => Input::get('Last_name')

					));

				Session::flash('home', 'Profile Updated!');
				Redirect::to('index.php');

			}catch(Exception $e){
				die($e->getMessage());
			}
		}else{
			foreach($validation->errors() as $error){
				echo $echo, '<br>';
			}
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update@PASS</title>
	<link rel="stylesheet" href="passcss.css">
</head>
<body class="home_pg">

	<header class="pgtitle">
	<h1>Update@CS</h1>
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


	<form action="" method="post">
	<label for='First_name'>First Name</label>
	<input type="text" name="First_name" value="<?php echo escape($user->data()->First_name); ?>">
	<label for='Last_name'>Last Name</label>
	<input type="text" name="Last_name" value="<?php echo escape($user->data()->Last_name); ?>">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" value="Update">
</form>
</body>
</html>



