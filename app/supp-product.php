<?php

declare(strict_types=1);
require 'include/config.php';
require '_sqlFetchSingle.php';

if (!$user) {
    header('Location:index.php?error=unauthorizedAccess');
    exit();
}

$product_id = filter_input(INPUT_POST, 'product_id');
$token = filter_input(INPUT_POST, 'csrf_token');

if ($token !== $_SESSION['token']) {
    header('Location:index.php?error=csrfAttempt');
    exit();
}

