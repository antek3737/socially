<!DOCTYPE html>
<head>
    <title> calendar </title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/event.css">
    <link rel="stylesheet" type="text/css" href="/public/css/calendar.css">
    <link rel="stylesheet" href="/public/font-awesome-4.7.0/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../public/js/calendarHiding.js" defer></script>
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
            <?php foreach ($events

            as $event): ?>
            <?php
            $given = strtotime($event->getEventTime());
            $current = new DateTime('now');
            $date = new DateTime();
            $date->setTimestamp(strtotime($event->getEventTime()));
            //            echo "current: " . $current->format("H:i");
            $current = $current->getTimestamp();
            $rest = $given - $current;
            //            echo "rest: " .$rest;
            $hours = intval($rest / 3600);
            $minutes = intval(($rest - ($hours * 3600)) / 60);
            ?>


            <?php


            if ($minutes < 0 || $hours < 0) {
                continue;
            }
            ?>
            <div class="calendar-top-placement">
                <div class="calendar-date-block">
                    <div class="calendar-date-text">
                        <p class="calendarDate"><?= $date->format("d M Y") ?> </p>
                    </div>
                </div>
                <div class="calendar-frame"></div>
            </div>
            <div class="calendar-bottom-placement">

                <div class="placement-event">
                    <div class="event-border">
                        <div class="event-border-time"><?= $hours ?> h</div>
                        <div class="event-border-time"><?= $minutes ?> m</div>
                    </div>
                    <div class="event-background">
                        <div class="event-avatar">
                            <div class="big-avatar">
                                <img src="/public/uploads/<?= $event->getEventPhoto() ?>">
                            </div>
                        </div>
                        <div class="event-details">
                            <div class="event-details-message"><?= $event->getEventDescription() ?></div>
                            <div class="event-details-location-and-choosebar">
                                <div class="event-location">

                                    <div class="location-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>

                                    <p><?= $event->getEventLocation() ?></p>

                                </div>
                                <div class="event-choosebar" id="chosen">
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <!-- <div class="event-grip-lines">
                              <i class="fa fa-bug"></i>
                            </div> -->
                        </div>
                    </div>


                <!--
                  .....................................................
                 -->


            </div>

                <?php endforeach; ?>
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
