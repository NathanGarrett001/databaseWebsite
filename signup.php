<head>
    <meta name="Marvins Movers" content= "Final project using CRUD">
	<meta name="Nathan Garrett" content="Sign-in page">
	<link href="CSS/signUpStyles.css" type="text/css" rel="stylesheet">
	<link rel="icon" href="IMAGES/favicon.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <div class="signUpOverlay">
            <h2 class="signUpHeader">Create an Account!</h2>
            <form action="DBWebService/logInValidate.php?request=signup" method="post">
                <div class="signUpBox">
                    <br>
                    <h3>Select a User Name</h3>
                    <input id="uName" name="uName" type="text" required="true"/>
                    <br>
                    <h3>Select a Password</h3>
                    <input id="pw" name="pw" type="text" required="true"/>
                    <br>
                    <br>
                    <button type="submit" class="buttonStyle">Sign up!</button>
                </div>
            </form>
            <br>
            <a href='index.php' title='click to return to login!'>Return to Login</a>
        </div>
    </header>
</body>
