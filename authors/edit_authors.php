<?php 
include("../db.php");

$code = $_GET['code'];

$result = mysqli_query($conn, "SELECT * FROM author WHERE author_code='$code'");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Author not found!");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $new_name = $_POST['author_name'];

    $sql = "UPDATE author SET author_name='$new_name' WHERE author_code='$code'";

    if (mysqli_query($conn, $sql)) {
        header("Location: list_authors.php?msg=Author updated");
        exit();
    } else {
        echo "Error updating: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Author</title>
</head>
<body>

<h2>Edit Author</h2>

<form method="POST">
    <label>Author Code: (cannot change)</label><br>
    <input type="text" value="<?= $data['author_code'] ?>" disabled><br><br>

    <label>Author Name:</label><br>
    <input type="text" name="author_name" value="<?= $data['author_name'] ?>" required><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
