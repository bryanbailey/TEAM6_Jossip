<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jossip company rankings page</title>

    <link rel="stylesheet" type="text/css" href="./resources/css/jossstyle.css" />

</head>
<body>

<div id = "container">

    <div id = "content">

        <div id = "header">
            <h1>Jossip</h1>
        </div>

        <div id = "nav">

            <ul>
                <li><a class="selected" href="index.php">Home</a></li><br>
                <li><a class="selected" href="register.php">New user?<br>Create an<br>account by<br>clicking here</a></li><br>
            </ul>

        </div>

<!-- Again, the following division is just mocked up for appearance, needs to be hooked to the database to produce the live
results we are looking for -bb -->

        <div id = "main">
            <h3>Current company rankings</h3>
            <?php
            $companies = array (
                array ("IBM", 4.5),
                array ("Wells Fargo", 3),
                array ("Bank of America", 3),
                array ("Swisher", 2),
            );

            for ($row = 0; $row <  4; $row++) {
                echo "<br><br><b>";
                echo $row+1;
                echo ". ";
                echo $companies[$row][0]."</b><br>";
                echo "Rating: ".$companies[$row][1];
            }
              ?>
        </div>

<!-- This, again, needs to be relevant to whether the user is logged in or not. -bb -->

        <div id = "logout">

            <form action="login.php">
                <input type="submit" value="Login">
            </form>

        </div>

    </div>

</div>

</body>
</html>