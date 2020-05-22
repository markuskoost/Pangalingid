<?php
require_once 'autoload.php';

$payment_action = filter_input(INPUT_GET, 'payment_action', FILTER_SANITIZE_STRING);

if ($payment_action == 'cancel') {
    $_SESSION['message'] = 'Payment Canceled';
    header('Location: https://pangalingid.tak17koost.itmajakas.ee/');
}