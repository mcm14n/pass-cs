<?php
require_once 'core/init.php';

if (Input::exists()){
	if( Token::check(Input::get('token')) ) {
	$validate = new Validate();
	$validation = $validate->check($_POST, array(
			'Username' => array(
				'required' => true,
				'min' => 5,
				'max' => 20,
				'unique' => 'users'
				),
			'Password' => array(
				'required' => true,
				'min' => 8
				),
			'Confirm_Password' => array(
				'required'=>true,
				'matches' => 'Password'
				),
			'First_name' => array(
				'required' => true,
				'min' => 2,
				'max' => 50
				),
			'Last_name' => array(
				'required' => true,
				'min' => 2,
				'max' => 50
				),
			'Email' => array(
				'required' => true,
				'domain' => '@my.fsu.edu',
				'unique' => 'users'
				),

		));

		if($validation->passed()){
			$user = new User();

			$salt = Hash::salt(32);
			try{
				$user->create(array(
					'username' => Input::get('Username'),
					'password' => Hash::make(Input::get('Password'), $salt),
					'salt' => $salt,
					'First_name' => Input::get('First_name'),
					'Last_name' => Input::get('Last_name'),
					'email' => Input::get('Email'),
					'joined' => date('Y-m-d H:i:s'),
					'group' => 1

					));

				Session::flash('home', 'Registration Successful! You can now log in!');
				Redirect::to('index.php');

			}catch(Exception $e){
				die($e->getMessage());
			}
		}else{
			foreach($validation->errors() as $error){
				echo $error, '<br>';
			};
		} 
	}
}

?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Register@PASS</title>
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
		<li><a href="login.php">Login</a></li>
	</ul>
	</nav>

<fieldset id="fieldboxr">
<h2 class="loginhd">Register</h2>
	<form action="register.php" method="POST">
		<input type="text" name="First_name" class="ipform" placeholder="First Name" autocomplete="off" value="<?php echo escape(Input::get('First_name'));?>">
		<input type="text" name="Last_name" class="ipform" placeholder="Last Name" autocomplete="off"  value="<?php echo escape(Input::get('Last_name'));?>"><br><br>
		<input type="email" name="Email" class="ipform" placeholder="xxx#x@my.fsu.edu" autocomplete="off"  value="<?php echo escape(Input::get('Email'));?>"><br><br>
		<input type="text" name="Username" class="ipform" placeholder="Username" autocomplete="off"  value="<?php echo escape(Input::get('Username'));?>"><br><br>
		<input type="password" name="Password" class="ipform" placeholder="New Password" autocomplete="off"s><br><br>
		<input type="password" name="Confirm_Password" class="ipform" placeholder="Confirm Password" autocomplete="off"s><br><br>
		
		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		<input type="submit" value="Submit" id="registersubmit" class="form2">

	</form>
</fieldset>

</body>
</html>