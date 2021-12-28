<!DOCTYPE html>
<head>
    <title> creating event</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/event.css">
    <link rel="stylesheet" type="text/css" href="/public/css/inputs.css">
    <link rel="stylesheet" type="text/css" href="/public/css/creatingEvent.css">
    <link rel="stylesheet" href="/public/font-awesome-4.7.0/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../public/js/eventCreating.js" defer></script>
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
        <form class="placement-event-creating" action="createEvent" method="POST">
            <!-- Cały event z main-->
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
                        <input type="text" name="eventDescription" class="event-details-message" required maxlength="30"
                               placeholder="Type here your description">
                        <div class="event-details-location-and-choosebar">
                            <div class="event-location">

                                <div class="location-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>

                                <input type="text" class="event-location" name="eventLocation" required placeholder="Type event's location" maxlength="30">

                            </div>
                            <div class="event-choosebar">
                                <i class="fa fa-check"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="event-grip-lines">
                            <i class="fa fa-bug"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- KONIEC-->
            <!--........FRAME........... -->

            <div class="event-creating-frame">
                <div class="inputs-placement">
                    <div class="inputs-names-placement">
                        <div class="input-name">time:</div>
                        <div class="input-name">date:</div>
                        <div class="input-name">deadline time:</div>
                        <div class="input-name">deadline :</div>
                    </div>
                    <div class="inputs-spaces-placement">
                        <input type="time" class="input-space" name="time" required minlength="4" maxlength="8"
                               size="10">
                        <input type="date" class="input-space" name="date"  required minlength="4" maxlength="8"
                               size="10">
                        <input type="time" class="input-space" name="deadlineTime" required minlength="4" maxlength="8"
                               size="10">
                        <input type="checkbox" name="eventDeadlineModeOn" class="input-space" checked >
                    </div>
                </div>
                <div class="button-placement">
                    <button type="submit" class="confirm-button" >create event</button>
                </div>

            </div>

            <!--........FRAME........... -->


        </form>

    </div>

    <?php include 'footer.php'; ?>
</body>


<template id ="event">
    <form class="placement-event-creating" action="createEvent" method="POST">
        <!-- Cały event z main-->
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
                    <input type="text" name="eventDescription" class="event-details-message" required maxlength="30"
                           placeholder="Type here your description">
                    <div class="event-details-location-and-choosebar">
                        <div class="event-location">

                            <div class="location-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>

                            <input type="text" class="event-location" name="eventLocation" required placeholder="Type event's location" maxlength="30">

                        </div>
                        <div class="event-choosebar">
                            <i class="fa fa-check"></i>
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="event-grip-lines">
                        <i class="fa fa-bug"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- KONIEC-->
        <!--........FRAME........... -->

        <div class="event-creating-frame">
            <div class="inputs-placement">
                <div class="inputs-names-placement">
                    <div class="input-name">time:</div>
                    <div class="input-name">date:</div>
                    <div class="input-name" id="nameToHide">deadline time:</div>
                    <div class="input-name">deadline :</div>
                </div>
                <div class="inputs-spaces-placement">
                    <input type="time" class="input-space" name="time" required minlength="4" maxlength="8"
                           size="10">
                    <input type="date" class="input-space" name="date" required minlength="4" maxlength="8"
                           size="10">
                    <input type="time" class="input-space" id="spaceToHide" name="deadlineTime"  minlength="4" maxlength="8"
                           size="10">
                    <input type="checkbox" name="eventDeadlineModeOn" class="input-space" >
                </div>
            </div>
            <div class="button-placement">
                <button type="submit" class="confirm-button" >create event</button>
            </div>

        </div>

        <!--........FRAME........... -->

    </form>
</template>

<!-- <div class="button">
  <i class="fa fa-cog"></i>
</div> -->

<!-- <i class="fa fa-home"></i>
<i class="fa fa-plus-circle"></i>
<i class="fa fa-calendar"></i>
<i class="fa fa-users"></i> -->