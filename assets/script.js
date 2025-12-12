function toggleSubmenu(id) {
  var submenu = document.getElementById(id);
  if (submenu.style.display === "block") {
    submenu.style.display = "none";
  } else {
    submenu.style.display = "block";
  }
}

// Logout confirmation popup
function confirmLogout() {
  if (confirm("Are you sure you want to log out?")) {
    window.location.href = "logout.php";
  }
}
