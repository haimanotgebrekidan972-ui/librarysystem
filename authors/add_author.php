<?php 
include("../db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $author_code = $_POST['author_code'];
    $author_name = $_POST['author_name'];

    $sql = "INSERT INTO author(author_code, author_name) VALUES('$author_code', '$author_name')";

    if (mysqli_query($conn, $sql)) {
        header("Location: list_authors.php?msg=Author added successfully");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Author</title>
</head>
<body>

<h2>Add Author</h2>

<form method="POST">
    <label>Author Code:</label><br>
    <input type="text" name="author_code" required><br><br>

    <label>Author Name:</label><br>
    <input type="text" name="author_name" required><br><br>

    <button type="submit">Add Author</button>
</form>

</body>
</html>
