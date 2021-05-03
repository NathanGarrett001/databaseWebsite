<head>
    <meta name="Marvins Movers" content= "Final project using CRUD">
	<meta name="Nathan Garrett" content="Sign-in page">
	<link href="CSS/homePageStyles.css" type="text/css" rel="stylesheet">
	<link rel="icon" href="IMAGES/favicon.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    
    <?php
    session_start();
    
    if($_SESSION["valid"] == true){
        $currentUser = $_SESSION["username"];
        $currentPassword = $_SESSION["password"];
        
        
        $servername = "localhost";  
        $username = "ngarrett001";  
        $password = "Javaman001";  
        $databasename = "csci3632";  
  
        try   
        {  
            $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);  
            // set the PDO error mode to exception  
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
              
            $stmt = $conn->prepare("SELECT * FROM `marvinsMovers` WHERE `USERNAME` LIKE '$currentUser' AND `PASSWORD` LIKE '$currentPassword'");   
            $stmt->execute();  
            // set the resulting array to associative  
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  
            
            $USERS_DATABASE = $result;
            
            $userID = $USERS_DATABASE["0"]["USER_ID"];
            $oldAddress = $USERS_DATABASE["0"]["OLDADDRESS"];
            $newAddress = $USERS_DATABASE["0"]["NEWADDRESS"];
            $xsmlBox = $USERS_DATABASE["0"]["XSMLBOX"];
            $smlBox = $USERS_DATABASE["0"]["SMLBOX"];
            $medBox = $USERS_DATABASE["0"]["MEDBOX"];
            $lgBox = $USERS_DATABASE["0"]["LGBOX"];
            $xLgBox = $USERS_DATABASE["0"]["XLGBOX"];
            $smlBag = $USERS_DATABASE["0"]["SMLBAG"];
            $lgBag = $USERS_DATABASE["0"]["LGBAG"];
            $bulk = $USERS_DATABASE["0"]["BULK"];
            $beds = $USERS_DATABASE["0"]["BEDS"];
            $needVan = $USERS_DATABASE["0"]["NEEDVAN"];
                if($needVan == 1){
                    $needVanInput = "need a van";
                }
                else{
                    $needVanInput = "don't need a van";
                }
            $movDate = $USERS_DATABASE["0"]["MOVDATE"];
            
            
      
        } catch (PDOException $e)   
        {  
            echo "Error: " . $e->getMessage();  
        }  
        
        echo "<h1 class='menuHeader'>Welcome " . $currentUser . "!</h1>";
        
        echo "<div class='signOutButton' style='text-align: right'>";
            echo "<form style='padding-right: 40px' action='signOut.php'>";
                echo "<button class='buttonStyle' type='submit'>Sign Out</button>";
            echo "</form>";
        echo "</div>";
        echo "<div>";
            echo "<form action='DBWebService/update.php' method='get'>";
            echo "<input type='hidden' name='uID' value='" . $userID . "'/>";
                echo "<div class='topTableDiv'>";
                    echo "<table class='menuTables' style='margin: auto'>";
                        echo "<tr class='menuTableRows'>";
                            echo "<td style='font-weight: bold' class='menuTableData'><label for='oAddr'>Old Address<br></label><input type='text' name='oAddr' id='oAddr' value='" . $oldAddress . "'/></td>";
                            echo "<td style='font-weight: bold' class='menuTableData'><label for='nAddr'>New Address<br></label><input type='text' name='nAddr' id='nAddr' value='" . $newAddress . "'/></td>";
                            echo "<td style='font-weight: bold' class='menuTableData'><label for='movDate'>Moving Date<br></label><input type='date' name='movDate' id='movDate' value='" . $movDate . "'/></td>";
                        echo "</tr>";
                    echo "</table>";
                echo"</div>";
                echo "<div class='bottomTableDiv'>";
                    echo "<table class='menuTables' style='margin: auto'>";
                        echo"<tr class='menuTableRows'>";
                            echo "<td style='font-weight: bold' class='menuTableData'><label for='xsBox'>Extra Small Boxes<br></label><input type='number' name='xsBox' id='xsBox' value='" . $xsmlBox . "' min='0'/><br></td>";
                            echo "<td style='font-weight: bold' class='menuTableData'><label for='sBox'>Small Boxes<br></label><input type='number' name='sBox' id='sBox' value='" . $smlBox . "' min='0'/><br></td>";
                            echo "<td style='font-weight: bold' class='menuTableData'><label for='mBox'>Medium Boxes<br></label><input type='number' name='mBox' id='mBox' value='" . $medBox . "' min='0'/><br></td>";
                            echo "<td style='font-weight: bold' class='menuTableData'><label for='lBox'>Large Boxes<br></label><input type='number' name='lBox' id='lBox' value='" . $lgBox . "' min='0'/><br></td>";
                            echo "<td style='font-weight: bold' class='menuTableData'><label for='xlBox'>Xtra Large Boxes<br></label><input type='number' name='xlBox' id='xlBox' value='" . $xLgBox . "' min='0'/><br></td>";
                        echo "</tr>";
                        echo "<tr class='menuTableRows'>";
                            echo "<td style='font-weight: bold' class='menuTableData'><label for='sBag'>Small Bags<br></label><input type='number' name='sBag' id='sBag' value='" . $smlBag . "' min='0'/>";
                            echo "<td style='font-weight: bold' class='menuTableData'><label for='lBag'>Large Bags<br></label><input type='number' name='lBag' id='lBag' value='" . $lgBag . "' min='0'/>";
                            echo "<td style='font-weight: bold' class='menuTableData'><label for='bulk'>Bulk Items<br></label><input type='number' name='bulk' id='bulk' value='" . $bulk . "' min='0'/>";
                            echo "<td style='font-weight: bold' class='menuTableData'><label for='beds'>Mattresses<br></label><input type='number' name='beds' id='xsBox' value='" . $beds . "' min='0'/>";
                            echo "<td style='font-weight: bold' class='menuTableData'>Need a Van?<br><input type='radio' name='needVan' id='yes' value='1'/>Yes<br>";
                            echo "<input type='radio' name='needVan' id='no' value='0'/>No<br>Last checked : I " . $needVanInput . "!";
                        echo "</tr>";
                    echo "</table>";
                echo "</div><br><br>";
            echo "<button class='buttonStyle' type='submit'>Update Inventory!</button>";
            echo "</form>";
        echo "</div>";
        echo "<div class='clrFieldDiv'>";
            echo "<br><br><br>";
            echo "<h3>Press to clear data</h3>";
            echo "<form action='DBWebService/update.php' method='get'>";
                echo "<input type='hidden' name='uID' value='" . $userID . "'/>";
                        echo "<button class='buttonStyle' type='submit'>Clear all fields</button>";
            echo "</form>";
        echo "</div>";
        echo "<div class='deleteDiv'>";
            echo "<form action='DBWebService/delete.php' method='get'>";
            echo "<input type='hidden' name='uID' value='" . $userID . "'/>";
                echo "<h4>Press below to delete user</h4>";
                echo "<h4>WARNING!THIS IS PERMANENT!</h4><br>";
                echo "<button class='buttonStyle' type='submit'>Delete User</button>";
            echo "</form>";
        echo "</div>";
        echo "<div style='position:relative'>";
            echo "<img src='IMAGES/marvinFace.png' alt='marvinPeeking' width='15%' style='position:absolute; right: 200px; bottom: -25;'>";
        echo "</div>";
    }
    
    else{
        echo "<header>";
            echo "<div class='logInOverlay'>";
                echo "<h1 class='logInHeader'>Welcome to Marvin's Movers!</h1>";
                echo "<form action='DBWebService/logInValidate.php?request=login' method='post'>";
                    echo "<table>";
                        echo "<tr><td style='text-align:center'><img id='sideImages' src='IMAGES/marvinQuote.png' alt='marvinStanding'></td>";
                            echo "<td style='text-align:center'>";
                                echo "<h2 class='loginLabel'>Login</h2>";
                                echo "<div class='signInBox'>";
                                    echo "<h3>User Name</h3>";
                                    echo "<input id='uName' name='uName' type='text' required='true'/>";
                                    echo "<br>";
                                    echo "<h3>Select a Password</h3>";
                                    echo "<input id='pw' name='pw' type='password' required='true'/>";
                                    echo "<br><br>";
                                    echo "<button type='submit' class='buttonStyle'>Sign in!</button>";
                                echo "</div>";
                            echo "</td>";
                        echo "<td style='text-align:center'><img id='sideImages' src='IMAGES/dontPanic.png' alt='marvinStanding'></td></tr>";
                    echo "</table>";
                    echo "<div class='logInLink'>";
                        echo "<a href='signup.php' title='Click to Sign up!'>Sign up now!</a>";
                    echo "</div>";
                echo "</form>";
            echo "</div>";
        echo "</header>";
    }
    ?>
    
</body>
