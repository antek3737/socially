<!DOCTYPE html>
<head>
    <title> register </title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/public/css/inputs.css">
    <link rel="stylesheet" type="text/css" href="/public/css/personalSettings.css">
    <link rel="stylesheet" type="text/css" href="/public/css/register.css">
    <link rel="stylesheet" href="/public/font-awesome-4.7.0/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="container">
    <div class="header">
        <div class="item">
            <p class="group-name">All groups</p>
        </div>
    </div>

    <div class="placement-content">

        <form class="placement-settings" action="createNewAccount" method="POST" ENCTYPE="multipart/form-data">

            <div class="left-box">
                <div class="input-header-placement">
                    <div class="input-header">Registration :</div>
                </div>

                <div class="inputs-placement-up">
                    <div class="inputs-placement">
                        <div class="inputs-names-placement">
                            <div class="input-name">name:</div>
                            <div class="input-name">phone number:</div>
                            <div class="input-name">email:</div>
                        </div>
                        <div class="inputs-spaces-placement">
                            <input type="text" class="input-space" name="globName" required minlength="4"
                                   maxlength="30">
                            <input type="text" class="input-space" name="globPhoneNumber" required minlength="9"
                                   maxlength="9">
                            <input type="email" class="input-space" name="globEmail" required minlength="4"
                                   maxlength="30">
                        </div>
                    </div>
                </div>

                <div class="input-header-placement">
                    <div class="input-header">Password settings :</div>
                </div>

                <div class="inputs-placement-down">
                    <div class="inputs-placement">
                        <div class="inputs-names-placement">
                            <div class="input-name">new password:</div>
                            <div class="input-name">confirm password:</div>
                        </div>
                        <div class="inputs-spaces-placement">
                            <input type="password" class="input-space" name="globPassword" required minlength="4"
                                   maxlength="30">
                            <input type="password" class="input-space" name="globPasswordConfirmed" required
                                   minlength="4" maxlength="30">
                        </div>
                    </div>
                </div>

                <div class="button-placement">
                    <button type="submit" class="confirm-button">CONFIRM</button>
                </div>

                <?php if (isset($message)) {
                    echo $message;
                } ?>

            </div>

            <div class="right-box">

                <div class="input-header-placement" id="addPhoto">
                    <div class="input-header"> Add photo :</div>
                </div>

                <div class="profile-block">
                    <i class="fa fa-camera" aria-hidden="true"></i>
                    <input type="file" name="globPhoto">
                </div>

            </div>
        </form>
    </div>


    <div class="footer">

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