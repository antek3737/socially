<!DOCTYPE html>
<head>
    <title> groups </title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/inputs.css">
    <link rel="stylesheet" type="text/css" href="../public/css/groups.css">
    <link rel="stylesheet" href="/public/font-awesome-4.7.0/css/font-awesome.css">
    <script type="text/javascript" src="../public/js/search.js" defer></script>
    <script type="text/javascript" src="../public/js/getToGroup.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">

    <div class="header">
        <div class="item"></div>
    </div>

    <div class="placement-navigation">
        <div class="menu">
            <?php
            if (!isset($_COOKIE['globUser'])) {
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
        <div class="groups-placement">
            <input type="search" class="search-bar" placeholder="Search group" name="groupSearcher" required
                   minlength="3"
                   maxlength="20" size="10">
            <a href="addingGroup"> OR ADD </a>
            <div class="groups">
                <?php foreach ($groups as $group): ?>
                    <div class="one-group" id= <?= $group->getIDgroup() ?> > <?= $group->getGroupName() ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <a href="groups">
            <i class="fa fa-bug"></i>
        </a>
    </div>
</div>
</body>

<template id="group-template">
    <div class="one-group" id = "test">tekst</div>
</template>



<!-- <div class="button">
  <i class="fa fa-cog"></i>
</div> -->

<!-- <i class="fa fa-home"></i>
<i class="fa fa-plus-circle"></i>
<i class="fa fa-calendar"></i>
<i class="fa fa-users"></i> -->