<?php
$firstName = filter_input(INPUT_POST, firstName, FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, lastName, FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, email, FILTER_VALIDATE_EMAIL);
$number = filter_input(INPUT_POST, number, FILTER_VALIDATE_INT);

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$number = $_POST['number'];
$seb = $_POST['SEB'];
$paymentOption = $_POST['paymentOption'];

if (isset($_POST['submit']) && $paymentOption == 'SEB') {
    echo "You have selected : SEB";
} else if (isset($_POST['submit']) && $paymentOption == 'SWED') {
    echo "You have selected : SWED";
}