<?php
require_once 'core/init.php';

if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate = new Validate();

		$validation = $validate->check($_POST, array(
			'username' => array('required' => true),
			'password' => array('required' => true)
			));

			if($validation->passed()){
				$user = new User();

				$remember = (Input::get('remember') === 'on')? true : false;


				$login=$user->login(Input::get('username'), Input::get('password'), $remember);
				if($login){
					Redirect::to('index.php');
				}else{
					echo '<p>Log In Failed!</p>';
				}

			}else{
				foreach ($validation->errors() as $error) {
					echo  $error, '<br>';
				}

			}
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login@PASS</title>
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
		<li><a href="register.php">Register</a></li>
		</ul>
		</nav>
		
		<fieldset class="fieldbox"> 
		<h2 class="loginhd">Login</h2>  
		<form action="login.php" method="post" >
		<label for="username">Username: </label>
		<input type="text" name="username" id="username" class="form1"><br>
		<label for="password">Password: </label>
		<input type="password" name="password" id="password" class="form1"><br>
		<label for="remember">
		<input type="checkbox" name="remember" id="remember">Remember me 
		</label><br>
		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		<input type="submit" value="Login" class="form2">
		</form>
		</fieldset>

		<img id="loginpic" src="https://system.cs.fsu.edu/new/wp-content/uploads/2015/10/CS-LOGO-Colored.png" alt="fsu on">

</body>
</html>

