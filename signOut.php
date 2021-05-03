<link href="CSS/DBStyles.css" type="text/css" rel="stylesheet">
<link rel="icon" href="/IMAGES/favicon.ico">
<body>
<?php 
    echo "<div class='displayTextDiv'>";
        echo "<h2>Signed out Successfully";
    echo "</div>";
    session_start();
    unset($_SESSION['valid']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    session_destroy();
header("Refresh:2; url= index.php");
?>
</body>
