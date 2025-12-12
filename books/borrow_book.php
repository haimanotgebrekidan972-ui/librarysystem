<?php
include '../connection.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_code = $_POST['book_code'];
    $user_id = $_POST['user_id'];
    $due_date = $_POST['due_date'];
    $issue = $_POST['issue'];
    
    // Insert into borrow table
    $sql = "INSERT INTO borrow (book_code, user_id, due_date, issue)
            VALUES ('$book_code', '$user_id', '$due_date', '$issue')";
    
    if (mysqli_query($conn, $sql)) {
        $message = "Book borrowed successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Borrow Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2>Borrow Book</h2>
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
            <label>Due Date</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Issue Reason</label>
            <input type="text" name="issue" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Borrow</button>
    </form>
</div>
</body>
</html>
