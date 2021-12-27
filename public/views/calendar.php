<!DOCTYPE html>
<head>
    <title> calendar </title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/event.css">
    <link rel="stylesheet" type="text/css" href="/public/css/calendar.css">
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
        <div class="placement-calendar">
            <div class="calendar-top-placement">
                <div class="calendar-date-block">
                    <div class="calendar-date-text">
                        <p>MONDAY, 15 Jan 2021</p>
                    </div>
                </div>
                <div class="calendar-frame"></div>
            </div>
            <div class="calendar-bottom-placement">
                <div class="placement-event">
                    <div class="event-border">
                        <div class="event-border-time">02 h</div>
                        <div class="event-border-time">13 m</div>
                    </div>
                    <div class="event-background">
                        <div class="event-avatar">
                            <div class="big-avatar">
                                <img src="/public/uploads/<?= $avatar ?>">
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
                                <div id="chosen" class="event-choosebar">
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="event-grip-lines">
                                <i class="fa fa-bug"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <!--
                  .....................................................
                 -->


            </div>

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