<?php
$group = json_decode($_COOKIE['group'], true);
$group = new Group($group['groupName'], "", "", $group['groupID']);
?>