<!DOCTYPE html>
<head>
    <title> logging </title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/inputs.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/public/css/logging.css">
    <link rel="stylesheet" href="/public/font-awesome-4.7.0/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="container">
    <div class="header">
        <div class="item">
        </div>
    </div>

    <div class="placement-navigation">
        <div class="menu">

            <div class id="avatar">
                <img src="img/main_avatar.jpg">
            </div>
        </div>

        <div class="clock">22:22</div>
    </div>
    <div class="placement-content">

        <form class="logging-placement" action="logIntoAccount" method="POST">

            <div class="logo"><img src="/public/img/logo.svg"></div>

            <div class="inputs-placement">
                <input type="email" class="input-space" name="globEmail" placeholder="email" required minlength="4"
                       maxlength="30">
                <input type="password" class="input-space" name="globPassword" placeholder="password" required
                       minlength="4" maxlength="30">
            </div>

            <?php if (isset($message)) {
                echo $message;
            } ?>


            <div class="button-placement">
                <button type="submit" class="confirm-button">log in</button>
            </div>

            <a class="create-account" id="bottom" href="register">or register</a>
        </form>
    </div>


    <div class="footer">
        <a href="groups">
            <i class="fa fa-bug"></i>
        </a>
    </div>
</div>


</div>
</body>

