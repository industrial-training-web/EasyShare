<?php


if (!isset($_SESSION['name']) && !isset($_SESSION['id']) && !isset($_SESSION['email'])) {
    header("Location: index.php");
}
