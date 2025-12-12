<?php
session_start();
include '../db.php'; // go back one folder

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Handle form submission
if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $fname = $_POST['m_fname'];
    $mname = $_POST['m_mname'];
    $lname = $_POST['m_lname'];
    $address = $_POST['m_address'];
    $contact = $_POST['contact_no'];

    // Insert into members table
    $query = "INSERT INTO members (user_id, m_fname, m_mname, m_lname, m_address) 
              VALUES ('$user_id', '$fname', '$mname', '$lname', '$address')";
    mysqli_query($conn, $query);

    // Insert into membercontact table
    $query2 = "INSERT INTO membercontact (user_id, contact_no) VALUES ('$user_id', '$contact')";
    mysqli_query($conn, $query2);

    echo "<script>alert('Member added successfully'); window.location.href='view_members.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2>Add New Member</h2>
    <form method="POST">
        <div class="mb-3">
            <label>User ID</label>
            <input type="text" name="user_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="m_fname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Middle Name</label>
            <input type="text" name="m_mname" class="form-control">
        </div>
        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="m_lname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="m_address" class="form-control">
        </div>
        <div class="mb-3">
            <label>Contact Number</label>
            <input type="text" name="contact_no" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Member</button>
    </form>
</body>
</html>
