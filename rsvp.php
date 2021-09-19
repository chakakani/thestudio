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
		$code = $mysqli->real_escape_string($_POST['code']);
		
		$sql = "INSERT INTO codes (code)"
				. "VALUES ('$code')";

		if($mysqli->query($sql)===TRUE){
?>
			<script type="text/javascript">
				window.location = "submission_form.php";
			</script>   
<?php
		}



		$mysqli -> close();
	}
?>
<!DOCTYPE html>
<html> 
<head>
	<meta content="width=device-width" name="viewport">
	<title>RSVP</title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Fira+Mono:400');

		body{ 
		  display: flex;
		  width: 100vw;
		  height: 100vh;
		  align-items: center;
		  justify-content: center;
		  margin: 0;
		  background: black;
		  color: #fff;
		  font-size: 120px;
		  font-family: 'Helvetica New', monospace;
		  letter-spacing: -7px;
		  margin-top: -25%;
		  overflow: auto;
		}

		#rsvp{
		  animation: glitch 1s linear infinite;
		}

		.box{
			position: absolute;
			left: 50%;
			transform: translateX(-50%);
		}

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
			font-size: 20px;
			font-family: Helvetica Neue;
			font-weight: bold;
			position:absolute;
			left:0;
			top:0;
			letter-spacing: 1px;
			margin-top: 5%;
			margin-left: 1%;
		}
		img{
			position: absolute;
			right: 0px;
			bottom: 0px;
		}
		a {
  			color: inherit;
  			text-decoration: none;
		}

		@keyframes glitch{
		  2%,64%{
		    transform: translate(2px,0) skew(0deg);
		  }
		  4%,60%{
		    transform: translate(-2px,0) skew(0deg);
		  }
		  62%{
		    transform: translate(0,0) skew(5deg); 
		  }
		}

		#rsvp:before,
		#rsvp:after{
		  content: attr(title);
		  position: absolute;
		  left: 0;
		}

		#rsvp:before{
		  animation: glitchTop 1s linear infinite;
		  clip-path: polygon(0 0, 100% 0, 100% 33%, 0 33%);
		  -webkit-clip-path: polygon(0 0, 100% 0, 100% 33%, 0 33%);
		}

		@keyframes glitchTop{
		  2%,64%{
		    transform: translate(2px,-2px);
		  }
		  4%,60%{
		    transform: translate(-2px,2px);
		  }
		  62%{
		    transform: translate(13px,-1px) skew(-13deg); 
		  }
		}

		#rsvp:after{
		  animation: glitchBotom 1.5s linear infinite;
		  clip-path: polygon(0 67%, 100% 67%, 100% 100%, 0 100%);
		  -webkit-clip-path: polygon(0 67%, 100% 67%, 100% 100%, 0 100%);
		}

		@keyframes glitchBotom{
		  2%,64%{
		    transform: translate(-2px,0);
		  }
		  4%,60%{
		    transform: translate(-2px,0);
		  }
		  62%{
		    transform: translate(-22px,5px) skew(21deg); 
		  }
		}

		input:focus::placeholder {
  			color: transparent;
		}

		@media screen and (max-width: 1024px) {
			body{ 
		 		display: flex;
		  		width: 100vw;
		  		height: 100vh;
		  		align-items: center;
		  		justify-content: center;
		  		margin: 0;
		  		background: black;
		  		color: #fff;
		  		font-size: 86px;
		  		font-family: 'Helvetica New', monospace;
		  		letter-spacing: -7px;
		  		margin-top: -28%;
		 		 overflow: auto;
			}
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
				margin-top: 5%;
				margin-left: 1%;
			}
		}
		@media screen and (max-width: 768px) {
			body{ 
		 		display: flex;
		  		width: 100vw;
		  		height: 100vh;
		  		align-items: center;
		  		justify-content: center;
		  		margin: 0;
		  		background: black;
		  		color: #fff;
		  		font-size: 80px;
		  		font-family: 'Helvetica New', monospace;
		  		letter-spacing: -7px;
		  		margin-top: -33%;
		 		 overflow: auto;
			}
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
				margin-top: 5%;
				margin-left: 1%;
			}
		}
		@media screen and (max-width: 480px) {
			body{ 
		 		display: flex;
		  		width: 100vw;
		  		height: 100vh;
		  		align-items: center;
		  		justify-content: center;
		  		margin: 0;
		  		background: black;
		  		color: #fff;
		  		font-size: 60px;
		  		font-family: 'Helvetica New', monospace;
		  		letter-spacing: -7px;
		  		margin-top: -75%;
		 		 overflow: auto;
			}
			#logo{
				max-width: 30%;
				max-height: 60%;
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
				margin-top: 20%;
				margin-left: 1%;
			}
		}
	</style>
</head>
<body>
	<div id="topleft">
		
		<a href=landing_page.html>home</a>
		
		
	</div>
	<div id="rsvp" title="RSVP">RSVP</div>
	<form action="rsvp.php" name="submission_form" method="post">
	<br><br><br><br><br><br><br><span style="position: absolute; left: 50%; top: 25%; transform: translateX(-50%); text-align: center;"><input type="text" name="code" id="code" placeholder="enter code here" class="form-control" style="text-align: center; font-family: 'Helvetica New', monospace;"><br><input type="submit" name="go" id="go" value="welcome" style="visibility: hidden; text-align: center; font-family: 'Helvetica Neue';"></span>
	<img id="logo" src="the_studio_branding_square_knocked_out.png"></img>
	</form>
</body>

<script type="text/javascript">
	function pressHandler(e) {
        console.log(this.value);
        if (this.value == "3175" || this.value == "2150" || this.value == "5458" || this.value == "3542" || this.value == "2999" || this.value == "4984" || this.value == "5760" || this.value == "1498" || this.value == "2823" || this.value == "5212" || this.value == "5171" || this.value == "3389" || this.value == "4665" || this.value == "1717" || this.value == "2018" || this.value == "1134" || this.value == "1282" || this.value == "3636" || this.value == "4889" || this.value == "4074" || this.value == "1932" || this.value == "3173" || this.value == "2275" || this.value == "1832" || this.value == "1787" || this.value == "5881" || this.value == "4760" || this.value == "1535" || this.value == "2116" || this.value == "1963" || this.value == "3088" || this.value == "5722" || this.value == "5065" || this.value == "1260" || this.value == "4871" || this.value == "2973" || this.value == "2344" || this.value == "5647" || this.value == "4475" || this.value == "4437" || this.value == "5999" || this.value == "5373" || this.value == "4584" || this.value == "5457" || this.value == "1494" || this.value == "1801" || this.value == "1047" || this.value == "2403") {
            document.getElementById("go").style.visibility = 'visible';
        } else {
            document.getElementById("go").style.visibility = 'hidden';
        }
    }

    document.getElementById("code").addEventListener("keyup",pressHandler);

    document.getElementById("go").onclick = function () {
        location.href = "submission_form.php";
    };
</script>
</html>