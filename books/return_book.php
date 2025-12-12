<?php
include '../connection.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_code = $_POST['book_code'];
    $user_id = $_POST['user_id'];
    $return_date = $_POST['return_date'];
    
    // Update borrow table with return date
    $sql = "UPDATE borrow SET return_date='$return_date' 
            WHERE book_code='$book_code' AND user_id='$user_id'";
    
    if (mysqli_query($conn, $sql)) {
        $message = "Book returned successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Return Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2>Return Book</h2>
    <?php if ($message) echo "<div class='alert alert-info'>$message</div>"; ?>
    
    <form method="post">
        <div class="mb-3">
            <label>Book Code</label>
            <input type="text" name="book_code" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>User ID</label>
            <input type="text" name="user_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Return Date</label>
            <input type="date" name="return_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Return Book</button>
    </form>
</div>
</body>
</html>
