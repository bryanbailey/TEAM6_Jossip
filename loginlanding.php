<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jossip login landing page</title>

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
            </ul>

        </div>

        <div id = "main">
            <h3>Welcome to Jossip</h3>
            <p>You've successfully created an account with Jossip!</p><br>
            <p>Would you like to:</p>
            <ol>
                <li><a href="newaccount.php">Change your account details?</a></li>
                <li><a href="postrate.php">Post and rate a position/company?</a></li>
            </ol>

        </div>
        <div id = "login">

            <form action="index.php">
                <input type="submit" value="Logout">
            </form>

        </div>
</div>

</body>
</html>