<?php 
include("../db.php");

$code = $_GET['code'];

$sql = "DELETE FROM author WHERE author_code='$code'";

if (mysqli_query($conn, $sql)) {
    header("Location: list_authors.php?msg=Author deleted");
} else {
    echo "Error deleting: " . mysqli_error($conn);
}
?>
