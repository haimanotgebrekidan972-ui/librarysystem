<?php
// db.php
include 'connection.php';

// Fetch all books along with author, library, and publisher info
$sql = "
    SELECT 
        b.book_code,
        b.publish_date,
        b.book_price,
        b.book_status,
        a.author_name,
        l.library_code,
        p.publisher_name
    FROM books b
    LEFT JOIN author a ON b.author_code = a.author_code
    LEFT JOIN library l ON b.library_code = l.library_code
    LEFT JOIN publisher p ON b.publisher_cod = p.publisher_cod
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
