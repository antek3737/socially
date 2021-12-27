<!DOCTYPE html>
<head>
    <title> groupDetails </title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/public/css/groupDetails.css">
    <link rel="stylesheet" href="/public/font-awesome-4.7.0/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php include 'verifyCookies.php'; ?>
<?php include 'createUserViaCookie.php'; ?>
<?php include 'createGroupViaCookies.php'; ?>

<div class="container">
    <?php include 'header.php'; ?>

    <div class="placement-navigation">
        <?php include 'navigation.php'; ?>
    </div>

    <div class="placement-content">
        <?php foreach ($localUsers as $localUser): ?>
            <div class="placement-profile">
                <div class="profile-block">
                    <div class="profile-block-avatar-block">
                        <div id="avatar-block">
                            <img src="/public/uploads/<?= $localUser->getLocalPhoto() ?>">
                        </div>
                    </div>
                    <div class="profile-block-nickname-block"> <?= $localUser->getLocalName() ?></div>
                    <div class="profile-block-description-block"><?= $localUser->getLocalDescription() ?></div>
                </div>
            </div>
        <? endforeach; ?>
    </div>

</div>
<?php include 'footer.php'; ?>

</body>


<!-- <div class="button">
  <i class="fa fa-cog"></i>
</div> -->

<!-- <i class="fa fa-home"></i>
<i class="fa fa-plus-circle"></i>
<i class="fa fa-calendar"></i>
<i class="fa fa-users"></i> -->