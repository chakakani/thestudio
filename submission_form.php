<?php
	session_start();
	$_SESSION['message'] = '';
	$servername = "localhost";
	$username = "studio";
	$password = "lakers24";
	$dbname = "miami";
	$mysqli = new mysqli($servername, $username, $password, $dbname);
	$mysqli->set_charset('utf8');
	if ($mysqli -> connect_errno) {
  		echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  		exit();
	}


	if(isset($_POST['go'])){
		$name = $mysqli->real_escape_string($_POST['name']);
		$phone = $mysqli->real_escape_string($_POST['phone']);
		$email = $mysqli->real_escape_string($_POST['email']);
		$plusonename = $mysqli->real_escape_string($_POST['plusonename']);
		$plusonephone = $mysqli->real_escape_string($_POST['plusonephone']);
		$plusoneemail = $mysqli->real_escape_string($_POST['plusoneemail']);

		$sql = "INSERT INTO guests (name, phone, email, plusonename, plusonephone, plusoneemail)"
				. "VALUES ('$name', '$phone', '$email', '$plusonename', '$plusonephone', '$plusoneemail')";

		if($mysqli->query($sql)===TRUE){
			
			$_SESSION['message'] = 'we&#39ll txt you the address soon' ;

		}



		$mysqli -> close();
	}
?>

<!DOCTYPE html>
<html> 
<head>
	<meta content="width=device-width" name="viewport">
	<title>Guest Form</title>
	<style>
		html{
			background: black;
			font-family: Helvetica Neue;
  		    font-weight: bold;
  		    color: snow;

		}
		a {
  			color: inherit;
  			text-decoration: none;
		}
		#go{
			margin-top: 3%;
		}
		#logo{
			max-width: 15%;
		   	max-height: 30%;
			display: block;
		  	margin-left: auto;
		  	margin-right: auto;
		  	width: 50%;
		}
		#age{
			font-size: 11px;
		}
		.input-wrap {
		  position: relative;
		  margin-bottom: 22px;
		}

		.label {
		  position: absolute; 
		  left: -117px; 
		  display: inline-block;
		  width: 102px;
		  text-align: right;
		  font-size: 20px;
		  
		}

		.input {
		  width: 172px;
		  height: 30px;
		  font-size: 20px;
		  border: 1px solid black;
		}

		#topleft{
			color: palevioletred;
			font-size: 20px;
			font-family: Helvetica Neue;
			font-weight: bold;
			position:absolute;
			left:0;
			top:0;
			letter-spacing: 1px;
			margin-top: 10%;
			margin-left: 1%;
		}

		form {
		  display: flex; 
		  flex-direction: column; 
		  align-items: center; 
		  position: relative;
		  margin: 0 auto;
		  margin-top: 44px;
		}

		h1 {
		  text-align: center;
		}
		@media screen and (max-width: 1024px) {
			#logo{
				max-width: 15%;
				max-height: 30%;
			    display: block;
				margin-left: auto;
				margin-right: auto;
				width: 50%;
			}
			#topleft{
					color: palevioletred;
					font-size: 16px;
					font-family: Helvetica Neue;
					font-weight: bold;
					position:absolute;
					left:0;
					top:0;
					letter-spacing: 1px;
					margin-top: 10%;
					margin-left: 1%;
			}
		}
		@media screen and (max-width: 768px) {
			#logo{
				max-width: 18%;
				max-height: 38%;
				display: block;
				margin-left: auto;
				margin-right: auto;
				width: 50%;
			}
			#topleft{
					color: palevioletred;
					font-size: 16px;
					font-family: Helvetica Neue;
					font-weight: bold;
					position:absolute;
					left:0;
					top:0;
					letter-spacing: 1px;
					margin-top: 10%;
					margin-left: 1%;
			}

		}

		@media screen and (max-width: 480px) {
			
			#logo{
				max-width: 40%;
				max-height: 80%;
				display: block;
				margin-left: auto;
				margin-right: auto;
				width: 50%;
			}
			#topleft{
					color: palevioletred;
					font-size: 13px;
					font-family: Helvetica Neue;
					font-weight: bold;
					position:absolute;
					left:0;
					top:0;
					letter-spacing: 1px;
					margin-top: 15%;
					margin-left: 1%;
			}

		}

	</style>
</head>
<body>

	<form action="submission_form.php" name="submission_form" method="post">
<div id="age" style="font-family: 'Helvetica Neue';">must be 21+ to attend</div>
<div class="alert alert-error" style="font-family: 'Helvetica Neue';"><?= $_SESSION['message']?>
	<div id="topleft">
		
		<a href=landing_page.html>home</a>
		
		
	</div>
</div>
	<h1>guest</h1>

  		<div class="input-wrap">
    		
    			<input type="text" id="name" name="name" class="input" placeholder="name" style="text-align: center; font-family: 'Helvetica Neue';">
  		</div>
  
 		 <div class="input-wrap">
    		
    			<input type="tel" id="phone" name="phone" class="input" placeholder="phone" style="text-align: center; font-family: 'Helvetica Neue';" pattern=".{10,}">
  		</div>

  		<div class="input-wrap">
    		
    			<input  type="email"  id="email" name="email" class="input" placeholder="email" style="text-align: center; font-family: 'Helvetica Neue';">
  		</div>

  	<h1>+1</h1>


  		<div class="input-wrap">
    		
    			<input type="text" id="plusonename" name="plusonename" class="input" placeholder="name" style="text-align: center; font-family: 'Helvetica Neue';">
  		</div>
  
 		 <div class="input-wrap">
    		
    			<input type="tel" id="plusonephone" name="plusonephone" class="input" placeholder="phone" style="text-align: center; font-family: 'Helvetica Neue';" pattern=".{10,}">
  		</div>

  		<div class="input-wrap">
    		
    			<input type="email" id="plusoneemail" name="plusoneemail" class="input" placeholder="email" style="text-align: center; font-family: 'Helvetica Neue';">
  		</div>
  		
  		<input type="submit" name="go" id="go" value="rsvp" style="font-family: Helvetica Neue;">
	</form>

	
</body>

<script type="text/javascript">
	
</script>
</html>