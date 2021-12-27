<!DOCTYPE html>
<head>
    <title> home page</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/event.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/font-awesome-4.7.0/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php include 'verifyCookies.php'; ?>
<?php include 'createUserViaCookie.php'; ?>
<?php include 'createGroupViaCookies.php'; ?>

<div class="container">
    <?php include 'header.php';?>

    <div class="placement-navigation">
        <?php include 'navigation.php'; ?>
    </div>

    <div class="placement-content">

        <!-- .......................................EVENT................................................... -->

        <div class="placement-event">
            <div class="event-border">
                <div class="event-border-time">02 h</div>
                <div class="event-border-time">13 m</div>
            </div>
            <div class="event-background">
                <div class="event-avatar">
                    <div class="big-avatar">
                        <img src="/public/img/main_avatar.jpg">
                    </div>
                </div>
                <div class="event-details">
                    <div class="event-details-message">Hello, let's dance tonight!</div>
                    <div class="event-details-location-and-choosebar">
                        <div class="event-location">

                            <div class="location-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>

                            <p>Kraków</p>

                        </div>
                        <form class="event-choosebar">
                            <button class="event-left">
                                <i class="fa fa-check"></i>
                            </button>
                            <button class="event-right">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                    </div>
                    <!-- <div class="event-grip-lines">
                      <i class="fa fa-bug"></i>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- .......................................EVENT-END................................................... -->


    </div>

    <?php include 'footer.php'; ?>
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


<!--                <div class="menu">-->
<!---->
<!---->
<!--            <a href="personalSettings">-->
<!--                <div class="settings-icon">-->
<!--                    <i class="fa fa-cog"></i>-->
<!--                </div>-->
<!--            </a>-->
<!---->
<!---->
<!--            <div class id="avatar">-->
<!--                <img src="/public/uploads/--><?//= $globUser->getGlobPhoto() ?><!--">-->
<!--            </div>-->
<!---->
<!--            <a href="main">-->
<!--                <div class="icon"><i class="fa fa-home"></i></div>-->
<!--            </a>-->
<!--            <a href="creatingEvent">-->
<!--                <div class="icon"><i class="fa fa-plus-circle"></i></div>-->
<!--            </a>-->
<!--            <a href="calendar">-->
<!--                <div class="icon"><i class="fa fa-calendar"></i></div>-->
<!--            </a>-->
<!--            <a href="groupDetails">-->
<!--                <div class="icon"><i class="fa fa-users"></i></div>-->
<!--            </a>-->
<!--            <a href="chosen">-->
<!--                <div class="icon"><i class="fa fa-check"></i></div>-->
<!--            </a>-->
<!--        </div>-->
<!---->
<!--        <div class="clock">22:22</div>-->

<!--    <div class="header">-->
<!--        <div class="item">-->
<!--            <p class="group-name">--><?//= $group->getGroupName()?><!--</p>-->
<!--        </div>-->
<!--    </div>-->