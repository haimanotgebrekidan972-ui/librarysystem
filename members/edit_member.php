<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Fetch all members
$result = mysqli_query($conn, "SELECT m.user_id, m.m_fname, m.m_mname, m.m_lname, m.m_address, mc.contact_no 
FROM members m LEFT JOIN membercontact mc ON m.user_id = mc.user_id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2>Members List</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['user_id'] ?></td>
                <td><?= $row['m_fname'].' '.$row['m_mname'].' '.$row['m_lname'] ?></td>
                <td><?= $row['m_address'] ?></td>
                <td><?= $row['contact_no'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
