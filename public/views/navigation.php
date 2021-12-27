<?php
echo '
<div class="menu">


            <a href="personalSettings">
                <div class="settings-icon">
                    <i class="fa fa-cog"></i>
                </div>
            </a>


            <div class id="avatar">
                <img src="/public/uploads/', $globUser->getGlobPhoto() ,'">
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
      ';