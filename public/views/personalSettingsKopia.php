<!DOCTYPE html>
<head>
    <title> personalSettings </title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/public/css/inputs.css">
    <link rel="stylesheet" type="text/css" href="/public/css/personalSettings.css">
    <link rel="stylesheet" href="/public/font-awesome-4.7.0/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="header">
        <div class="item">
            <p class="group-name">Super grupa</p>
        </div>
    </div>

    <div class="placement-navigation">
        <div class="menu">
            <?php
            if (!isset($_COOKIE['globUser'])) {
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/logging");
            }

            if (!isset($_COOKIE['IDgroup'])) {
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

            <a href="personalSettings">
                <div class="settings-icon">
                    <i class="fa fa-cog"></i>
                </div>
            </a>


            <div class id="avatar">
                <img src="/public/uploads/<?= $globUser->getGlobPhoto() ?>">
            </div>

            <a href="main">
                <div class="icon"><i class="fa fa-home"></i></div>
            </a>
            <a href="creatingEvent">
                <div class="icon"><i class="fa fa-plus-circle"></i></div>
            </a>
            <a href="calendar">
                <div class="icon"><i class="fa fa-calendar"></i></div>
            </a>
            <a href="groupDetails">
                <div class="icon"><i class="fa fa-users"></i></div>
            </a>
            <a href="chosen">
                <div class="icon"><i class="fa fa-check"></i></div>
            </a>
        </div>

        <div class="clock">22:22</div>
    </div>

    <!--................................ -->
    <div class="placement-content">
        <div class="panel">
            <a href="logging">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
        </div>
        <form class="placement-settings" action="setPersonalAccount" method="POST">
            <div class="left-box">
                <div class="input-header-placement">
                    <div class="input-header">Details :</div>
                </div>

                <div class="inputs-placement-up">
                    <div class="inputs-placement">
                        <div class="inputs-names-placement">
                            <div class="input-name">phone number:</div>
                            <div class="input-name">email:</div>
                        </div>
                        <div class="inputs-spaces-placement">
                            <input type="text" class="input-space" name="globPhoneNumber" maxlength="9" minlength="9">
                            <input type="email" class="input-space" name="globEmail" minlength="4" maxlength="30">
                        </div>
                    </div>
                </div>

                <div class="input-header-placement">
                    <div class="input-header">Password :</div>
                </div>

                <div class="inputs-placement-down">
                    <div class="inputs-placement">
                        <div class="inputs-names-placement">
                            <div class="input-name">old password:</div>
                            <div class="input-name">new password:</div>
                            <div class="input-name">confirm password:</div>
                        </div>
                        <div class="inputs-spaces-placement">
                            <input type="password" class="input-space" name="globPassword" minlength="4" maxlength="30">
                            <input type="password" class="input-space" name="newGlobPassword" minlength="4"
                                   maxlength="30">
                            <input type="password" class="input-space" name="newGlobPasswordConfirmed" minlength="4"
                                   maxlength="30">
                        </div>
                    </div>
                </div>

                <?php if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                } ?>

                <div class="button-placement">
                    <button class="confirm-button" type="submit">CONFIRM</button>
                </div>


            </div>

            <div class="right-box">
                <div class="placement-profile">
                    <div class="profile-block">
                        <div class="profile-block-avatar-block">
                            <div class="big-avatar">
                                <img src="/public/img/main_avatar.jpg">
                            </div>
                        </div>
                        <input type="file" class="localPhoto">

                        <input type="text" class="profile-block-nickname-block" name="nickname" minlength="3"
                               maxlength="20" size="10" placeholder="localName">
                        <textarea name="localDescription" class="profile-block-description-block" maxlength="135">Write something here</textarea>


                    </div>
                </div>

            </div>
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


<!-- <div class="button">
  <i class="fa fa-cog"></i>
</div> -->

<!-- <i class="fa fa-home"></i>
<i class="fa fa-plus-circle"></i>
<i class="fa fa-calendar"></i>
<i class="fa fa-users"></i> -->