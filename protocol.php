<?php

session_start();
require 'actions.php';
?>

<!doctype HTML>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <title>Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="main">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Protocol number</th>
            <th scope="col">Issue date</th>
            <th scope="col">Responsible employee</th>
            <th scope="col">Compliance</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach (getProtocols() as $protocol): ?>
            <tr>
                <td><?php echo $protocol['protocol_number']; ?></td>
                <td><?php echo $protocol['issue_date']; ?></td>
                <td><?php echo $protocol['responsible_employee']; ?></td>
                <td><?php echo $protocol['compliance_flag']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="add-button">
    <button type="button" class="btn btn-primary"  onclick="toggleForm()">Add protocol</button>
        <div>
    <div class="form-input">
    <form id="survey-form" style="display: none;" action="inputProcessing.php" method="POST">
    <div class="input-group input-group-sm mb-3">
        <input type="number" name="protocol_number" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Protocol number" required>
    </div>
    <div class="input-group input-group-sm mb-3">
        <input type="date" name="issue_date" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
    </div>
    <div class="input-group input-group-sm mb-3">
        <input type="text" name="employee_name" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Responsible employee" required>
    </div>
    <div class="input-group input-group-sm mb-3">
        <input type="text" name="compliance" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Compliance (yes or no)" required>
    </div>
        <button type="submit" id="submit"
               class="btn btn-success""> Submit</button>
    </form>
    </div>
    <?php
    if(isset($_SESSION['message'])){
        echo '<p class="message">' . $_SESSION['message'] . '</p>';
    } unset($_SESSION['message']);
    ?>
</div>
</body>
<script src="front.js"></script>
</html>

