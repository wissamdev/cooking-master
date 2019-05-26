<?php

include("inc/init.inc.php");


if (!isset($_SESSION['login'])) {
        header('Location: ../index.php');
        exit();
}