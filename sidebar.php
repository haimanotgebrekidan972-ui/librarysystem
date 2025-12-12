<div id="sidebar" class="sidebar">

    <div class="sidebar-header">
        <h2>Library System</h2>
    </div>

    <!-- Books Entity -->
    <a href="#" class="item" onclick="toggleSubmenu('booksSub')">📚 Books ▾</a>
    <div id="booksSub" class="submenu">
        <a href="books/add_book.php" class="item">Add Book</a>
        <a href="books/view_books.php" class="item">List Books</a>
        <a href="books/borrow_book.php" class="item">Borrow Book</a>
        <a href="books/return_book.php" class="item">Return Book</a>
    </div>

    <!-- Members Entity -->
    <a href="#" class="item" onclick="toggleSubmenu('membersSub')">👤 Members ▾</a>
    <div id="membersSub" class="submenu">
        <a href="members/add_member.php" class="item">Add Member</a>
        <a href="members/edit_member.php" class="item">Edit Member</a>
        <a href="members/view_members.php" class="item">List Members</a>
    </div>

    <!-- Authors Entity -->
    <a href="#" class="item" onclick="toggleSubmenu('authorsSub')">✍ Authors ▾</a>
    <div id="authorsSub" class="submenu">
        <a href="authors/add_author.php" class="item">Add Author</a>
        <a href="authors/view_authors.php" class="item">List Authors</a>
    </div>

    <!-- Publishers Entity -->
    <a href="#" class="item" onclick="toggleSubmenu('publishersSub')">🏢 Publishers ▾</a>
    <div id="publishersSub" class="submenu">
        <a href="publishers/add_publisher.php" class="item">Add Publisher</a>
        <a href="publishers/view_publishers.php" class="item">List Publishers</a>
    </div>

    <!-- Librarians Entity -->
    <a href="#" class="item" onclick="toggleSubmenu('librariansSub')">🧑‍💼 Librarians ▾</a>
    <div id="librariansSub" class="submenu">
        <a href="librarians/add_librarian.php" class="item">Add Librarian</a>
        <a href="librarians/view_librarians.php" class="item">List Librarians</a>
    </div>

    <!-- Libraries Entity -->
    <a href="#" class="item" onclick="toggleSubmenu('librariesSub')">🏛 Libraries ▾</a>
    <div id="librariesSub" class="submenu">
        <a href="librarys/add_library.php" class="item">Add Library</a>
        <a href="librarys/view_libraries.php" class="item">List Libraries</a>
    </div>

    <!-- Logout -->
    <a href="#" class="item logout" onclick="confirmLogout()">🚪 Logout</a>
</div>
