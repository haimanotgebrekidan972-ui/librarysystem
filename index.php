<?php
session_start();
include 'db.php'; // Database connection

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch all books for the table
$result = mysqli_query($conn, "SELECT books.book_code, author.author_name, books.library_code, publisher.publisher_name, books.publish_date, books.book_price, books.book_status 
FROM books
LEFT JOIN author ON books.author_code = author.author_code
LEFT JOIN publisher ON books.publisher_cod = publisher.publisher_cod");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Library System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* Sidebar styling */
.sidebar {
    width: 0;
    height: 100%;
    background: #2c3e50;
    position: fixed;
    top: 0;
    left: 0;
    overflow-x: hidden;
    transition: 0.4s;
    padding-top: 60px;
    z-index: 999;
}

.sidebar .item {
    padding: 12px 25px;
    font-size: 18px;
    text-decoration: none;
    color: #ecf0f1;
    display: block;
    transition: 0.3s;
}

.sidebar .item:hover { background: #34495e; }
.sidebar .logout { color: #ff9b9b; font-weight: bold; }
.sidebar .logout:hover { background: #8b0000; color: #fff; }

/* Sidebar Header */
.sidebar-header { text-align: center; padding-bottom: 20px; }
.sidebar-header h2 { color: white; font-size: 22px; }

/* Hamburger button */
.menu-btn {
    font-size: 32px;
    cursor: pointer;
    padding: 15px;
    position: fixed;
    top: 10px;
    left: 15px;
    color: #2c3e50;
    z-index: 1000;
}

/* Popup for logout */
.popup {
    display: none;
    position: fixed;
    top:0; left:0; width:100%; height:100%;
    background: rgba(0,0,0,0.6);
    justify-content: center; align-items: center;
    z-index: 2000;
}

.popup-content {
    background:white;
    padding:25px 35px;
    border-radius:10px;
    text-align:center;
    width:300px;
}

.popup-content p { font-size:18px; margin-bottom:20px; }
.popup-content button { padding:10px 20px; margin:5px; border:none; font-weight:bold; border-radius:8px; cursor:pointer; }
.popup-content .yes { background:#e74c3c; color:white; }
.popup-content .no { background:#bdc3c7; }
/* Hamburger button fixed top-right with white color */
.menu-btn {
    font-size: 32px;          /* size of the hamburger */
    cursor: pointer;
    padding: 10px 15px;
    position: fixed;
    top: 10px;                 /* distance from top */
    right: 15px;               /* distance from right */
    color: white;              /* white color for the lines */
    background: rgba(0,0,0,0.3); /* semi-transparent background */
    border-radius: 5px;
    z-index: 1000;
    transition: background 0.3s;
}

.menu-btn:hover { 
    background: rgba(0,0,0,0.6); /* darker on hover */
}


</style>

</head>
<body class="p-4" >

<!-- Hamburger Menu Button -->
<div class="menu-btn" onclick="toggleMenu()">☰</div>

<!-- Sidebar Menu -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <h2>Library Menu</h2>
    </div>

    <!-- Books Entity -->
    <a href="#" class="item">📚 Books</a>
    <a href="books/add_book.php" class="item">Add Book</a>
    <a href="books/view_books.php" class="item">List Books</a>
    <a href="books/borrow_book.php" class="item">Borrow Book</a>
    <a href="books/return_book.php" class="item">Return Book</a>

    <!-- Members Entity -->
    <a href="#" class="item">👥 Members</a>
    <a href="members/add_member.php" class="item">Add Member</a>
    <a href="members/edit_member.php" class="item">Edit Member</a>
    <a href="members/view_members.php" class="item">List Members</a>

    <!-- Authors Entity -->
    <a href="#" class="item">✍ Authors</a>
    <a href="authors/add_author.php" class="item">Add Author</a>
    <a href="authors/list_authors.php" class="item">List Authors</a>
    <a href="authors/edit_authors.php" class="item">Edit Authors</a>
    <a href="authors/delete_authors.php" class="item">Delete Authors</a>
    
    <!-- Publishers Entity -->
    <a href="#" class="item">🏢 Publishers</a>
    <a href="add_publisher.php" class="item">Add Publisher</a>
    <a href="view_publishers.php" class="item">List Publishers</a>

    <!-- Librarians Entity -->
    <a href="#" class="item">🧑‍💼 Librarians</a>
    <a href="add_librarian.php" class="item">Add Librarian</a>
    <a href="view_librarians.php" class="item">List Librarians</a>

    <!-- Libraries Entity -->
    <a href="#" class="item">🏫 Libraries</a>
    <a href="add_library.php" class="item">Add Library</a>
    <a href="view_libraries.php" class="item">List Libraries</a>

    <!-- Logout -->
    <a href="#" class="item logout" onclick="confirmLogout()">🚪 Logout</a>
</div>

<!-- Logout Confirmation Popup -->
<div id="logoutPopup" class="popup">
    <div class="popup-content">
        <p>Are you sure you want to log out?</p>
        <button class="yes" onclick="window.location.href='logout.php'">Yes</button>
        <button class="no" onclick="closePopup()">No</button>
    </div>
</div>


<!-- Main Content: Books Table -->
<div class="container">
    <h2 class="mb-4">All Books</h2>
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

<script>
// Toggle sidebar
function toggleMenu() {
    var sidebar = document.getElementById("sidebar");
    sidebar.style.width = (sidebar.style.width === "250px") ? "0" : "250px";
}

// Logout popup
function confirmLogout() {
    document.getElementById('logoutPopup').style.display = 'flex';
}
function closePopup() {
    document.getElementById('logoutPopup').style.display = 'none';
}
</script>

</body>
</html>
