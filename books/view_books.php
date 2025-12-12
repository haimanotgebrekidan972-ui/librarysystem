<?php
include '../db.php';
include '../connection.php'
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2>All Books</h2>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Book Code</th>
                    <th>Author</th>
                    <th>Library</th>
                    <th>Publisher</th>
                    <th>Publish Date</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['book_code'] ?></td>
                    <td><?= $row['author_name'] ?></td>
                    <td><?= $row['library_code'] ?></td>
                    <td><?= $row['publisher_name'] ?></td>
                    <td><?= $row['publish_date'] ?></td>
                    <td><?= $row['book_price'] ?></td>
                    <td><?= $row['book_status'] ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    <?php else: ?>
        <p>No books found.</p>
    <?php endif; ?>
</div>
</body>
</html>
