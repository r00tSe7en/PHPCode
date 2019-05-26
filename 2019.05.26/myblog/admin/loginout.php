<?php
include('../conn.php');
session_start();
$_session=[];
session_destroy();
alert('注销成功！','login.php');