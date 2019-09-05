<?php
require "../config.php";
User::logout();
header("location: ../welcome.php");