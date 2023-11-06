<?php
require_once("../../core/Controller.php");

session_start();
unset($_SESSION['authorization']);
Controller::redirect('/views/login.php');