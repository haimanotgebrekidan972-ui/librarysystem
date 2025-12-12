<?php 
include("../db.php");

$result = mysqli_query($conn, "SELECT * FROM author");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Author List</title>
</head>
<body>

<h2>List of Authors</h2>

<a href="add_author.php">➕ Add New Author</a>
<br><br>

<table border="1" cellpadding="10">
<tr>
    <th>Author Code</th>
    <th>Author Name</th>
    <th>Actions</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['author_code'] ?></td>
    <td><?= $row['author_name'] ?></td>

    <td>
        <a href="edit_author.php?code=<?= $row['author_code'] ?>">Edit</a> |
        <a href="delete_author.php?code=<?= $row['author_code'] ?>" onclick="return confirm('Delete this author?');">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
