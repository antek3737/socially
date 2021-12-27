<!DOCTYPE html>
<head>
    <title> personalSettings </title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/public/css/inputs.css">
    <link rel="stylesheet" type="text/css" href="/public/css/personalSettings.css">
    <link rel="stylesheet" href="/public/font-awesome-4.7.0/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../public/js/logOut.js" defer></script>
</head>
<body>
<div class="container">
    <?php include 'verifyCookies.php'; ?>
    <?php include 'createUserViaCookie.php'; ?>
    <?php include 'createGroupViaCookies.php'; ?>

    <div class="container">
        <?php include 'header.php'; ?>

        <div class="placement-navigation">
            <?php include 'navigation.php'; ?>
        </div>

        <div class="placement-content">

            <div class="panel">
                    <button  name="logOut" class="fa fa-sign-out" aria-hidden="true"></button>
            </div>

            <form class="placement-settings" action="updateLocalUserAccount" method="POST" ENCTYPE="multipart/form-data">

                <div class="placement-profile">
                    <div class="profile-block">
                        <div class="profile-block-avatar-block">
                            <div class="big-avatar">
                                <img src="/public/uploads/<?= $avatar ?>">
                            </div>
                        </div>
                        <input type="file" class="localPhoto" name="localPhoto">

                        <input type="text" class="profile-block-nickname-block" name="localName" minlength="3"
                               maxlength="20" size="10" placeholder="localName">
                        <textarea name="localDescription" class="profile-block-description-block" maxlength="135">Write something here</textarea>
                    </div>
                </div>

                <div class="button-placement">
                    <button class="confirm-button" type="submit">CONFIRM</button>
                </div>
            </form>
        </div>


 <? include "footer.php";?>


</div>
</body>


<!-- <div class="button">
  <i class="fa fa-cog"></i>
</div> -->

<!-- <i class="fa fa-home"></i>
<i class="fa fa-plus-circle"></i>
<i class="fa fa-calendar"></i>
<i class="fa fa-users"></i> -->