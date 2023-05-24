<?php

session_start();

require 'actions.php';

$protocol_number = $_POST['protocol_number'];
$issue_date = $_POST['issue_date'];
$name = $_POST['employee_name'];
$compliance = $_POST['compliance'];

$dataCheck = mysqli_fetch_assoc(mysqli_query(createConnect(),
    "SELECT * FROM `protocol_table` WHERE `protocol_number`='$protocol_number' LIMIT 1"));

if(isset($dataCheck)) {
    $_SESSION['message'] = 'User with this data has already registered';
    header('Location: /protocol.php');
} else {
    mysqli_query(createConnect(), "INSERT INTO `protocol_table`(`protocol_number`, `issue_date`, `responsible_employee`, `compliance_flag`) VALUES ('$protocol_number','$issue_date', '$name', '$compliance')");
    $_SESSION['message'] = 'You have successfully registered';
    unset($_SESSION['message']);
    header('Location: /protocol.php');
}
