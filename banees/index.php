<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banees Assesment</title>
    <link rel="stylesheet" href="Assets/css/style.css"/>
</head>
<body> 
<h1>Welcome to the Portal</h1>
    
  
<div class="content">
	<div class="container">
		<img class="bg-img" src="Assets/images/bg.jpg" alt="">
			<div class="menu">
				<a href="#connexion" class="btn-connexion"><h2>SIGN IN</h2></a>
				<a href="#enregistrer" class="btn-enregistrer active"><h2>SIGN UP</h2></a>
			</div>
			<div class="connexion">
				<form id="loginForm">
					<div class="contact-form">
						<label>USERNAME</label>
						<input placeholder="" name= "username" type="text" required>
						
						<label>PASSWORD</label>
						<input placeholder="" name="password" type="password" required>
						<br/>
						<input class="submit" id="LoginBtn" name="LoginBtn" value="SIGN IN" type="submit">
					</div>
				</form>
			</div>
			<form id="registerForm">
                <div class="enregistrer active-section">
                    <div class="contact-form">
                        <label>Full Name</label>
                        <input placeholder="Enter Your Full Name" id="FullName" name ="FullName" type="text" required>
                        
                        <label>Cell</label>
                        <input placeholder="Type your contact Number" id="cell" name ="cell" type="text"required>	
                        
                        <label>E-Mail</label>
                        <input placeholder="Type Your Email Address" id="email" name ="email"  type="email" required>	
                        
                        <label>Password</label>
                        <input placeholder="Create Password" id="passcode" name ="passcode" type="password" required>
                        <small style="color:red">min 6 char with at least one uppercase, one lowercase, and one digit</small>
                        
                        <label>Confirm Password</label>
                        <input placeholder="Confirm Your Password" id="passcodeConfirm"  type="password" required>
                        <br/>					
                        <input class="submit" name="registerMe" id="registerMe" value="SIGN UP" type="submit">	    
                    </div>
                </div>
			</form>
	</div>
</div>
</body> 
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="Assets/js/web.js"></script>
</html>