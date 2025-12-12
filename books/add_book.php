<?php
include '../db.php';
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_code = $_POST['book_code'];
    $author_code = $_POST['author_code'];
    $library_code = $_POST['library_code'];
    $publisher_cod = $_POST['publisher_cod'];
    $publish_date = $_POST['publish_date'];
    $book_price = $_POST['book_price'];
    $book_status = $_POST['book_status'];

    $sql = "INSERT INTO books (book_code, author_code, library_code, publisher_cod, publish_date, book_price, book_status)
            VALUES ('$book_code', '$author_code', '$library_code', '$publisher_cod', '$publish_date', '$book_price', '$book_status')";

    if (mysqli_query($conn, $sql)) {
        $message = "Book added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2>Add New Book</h2>
    <?php if (!empty($message)) echo "<div class='alert alert-info'>$message</div>"; ?>
    <form method="post">
        <div class="mb-3">
            <label>Book Code</label>
            <input type="text" name="book_code" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Author Code</label>
            <input type="text" name="author_code" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Library Code</label>
            <input type="text" name="library_code" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Publisher Code</label>
            <input type="text" name="publisher_cod" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Publish Date</label>
            <input type="text" name="publish_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Book Price</label>
            <input type="number" step="0.01" name="book_price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Book Status</label>
            <input type="text" name="book_status" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
</body>
</html>
