<!DOCTYPE html>
<head>
    <title> adding-group </title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/inputs.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/public/css/addingGroup.css">
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

            <?php

            if(!isset($_COOKIE['globUser'])){
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/logging");
            }

            $globUserWithIDArray = json_decode($_COOKIE['globUser'], true);
            $globUser = new GlobUser($globUserWithIDArray['globName'],
                $globUserWithIDArray['globPhoneNumber'],
                $globUserWithIDArray['globEmail'],
                $globUserWithIDArray['globPassword'],
                $globUserWithIDArray['globSalt'],
                $globUserWithIDArray['globPhoto'])

            ?>

            <div class id="avatar">
                <img src="/public/uploads/<?= $globUser->getGlobPhoto() ?>">
            </div>

        </div>

        <div class="clock">22:22</div>
    </div>
    <div class="placement-content">
        <form class="creating-placement" action="createNewGroup" method="POST">
            <div class="profile-block">
                <input type="text" class="profile-block-nickname-block" name="groupName" placeholder="group name here"
                       required minlength="3" maxlength="30" size="10">

                <div class="inputs-placement">
                    <label for="lname">password:</label>
                    <input type="password" class="input-space" id="top" name="groupPassword" required minlength="4"
                           maxlength="30"
                           size="10">
                    <label for="lname">confirm password:</label>
                    <input type="password" class="input-space" id="top" name="groupPasswordConfirmed" required
                           minlength="4" maxlength="30"
                           size="10">
                </div>

                <div class="button-placement">
                    <button class="confirm-button" type="submit">CREATE</button>
                </div>

                <?php if (isset($message)) {
                    echo $message;
                } ?>

            </div>

        </form>
    </div>


    <div class="footer">
        <a href="groups.php">
            <i class="fa fa-bug"></i>
        </a>
    </div>
</div>


</div>
</body>

