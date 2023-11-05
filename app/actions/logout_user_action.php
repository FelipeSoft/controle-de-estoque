<?php
require_once("../../core/View.php");

session_start();
unset($_SESSION['authorization']);
View::redirect('/views/login.php');