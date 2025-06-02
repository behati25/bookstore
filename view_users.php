<?php  
include 'database.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Users</title>
  <style>
    /* Reset */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      margin: 0;
      padding: 0;
      height: 100vh;
      overflow: hidden; /* prevent whole page scroll */
      display: flex;
      flex-direction: column;
    }

    /* Fixed header */
    .header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 70px;
      background-color: #2c3e50;
      color: white;
      padding: 20px 30px;
      display: flex;
      align-items: center;
      z-index: 1000;
    }

    /* Container with fixed sidebar and scrollable main */
    .container {
      display: flex;
      flex-grow: 1;
      margin-top: 70px; /* space for fixed header */
      height: calc(100vh - 70px);
    }

    /* Fixed sidebar */
    .sidebar {
      position: fixed;
      top: 70px;
      left: 0;
      width: 220px;
      height: calc(100vh - 70px);
      background: #34495e;
      padding-top: 30px;
      overflow: auto;
    }

    .sidebar a {
      display: block;
      color: white;
      padding: 15px 20px;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .sidebar a:hover, .sidebar a.active {
      background: #1abc9c;
    }

    /* Main content scrolls */
    .main {
      margin-left: 220px; /* space for sidebar */
      padding: 30px;
      overflow-y: auto;
      flex-grow: 1;
      background: #fff;
    }

    /* Space below header for h2 */
    .main h2 {
      margin-top: 40px;
      color: #2c3e50;
    }

    /* Filter container */
    .filter-bar {
      margin-bottom: 20px;
    }

    .filter-bar label {
      font-weight: bold;
      margin-right: 10px;
      color: #2c3e50;
    }

    .filter-bar select {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background: white;
      cursor: pointer;
      min-width: 150px;
    }

    /* Table styling */
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
    }

    th, td {
      padding: 12px 15px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #34495e;
      color: white;
      position: sticky;
      top: 0;
      z-index: 10;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    /* Responsive text wrap */
    td {
      word-wrap: break-word;
      max-width: 250px;
    }
  </style>
</head>
<body>

  <div class="header">
    <h1>User Management</h1>
  </div>

  <div class="container">
    <div class="sidebar">
      <a href="dashboard.php">Dashboard</a>
      <a href="view_books.php">View Books</a>
      <a href="discounted_books.php">Discounted Books</a>
      <a href="view_sales.php">View Sales</a>
      <a href="view_users.php">View Users</a>
      <a href="logout.php" onclick="return confirmLogout()">Logout</a>

</div>

<script>
function confirmLogout() {
    return confirm("Are you sure you want to log out?");
}
</script>

    <main class="main">
      <h2>View Users</h2>

      <div class="filter-bar">
        <label for="yearFilter">Filter by Year Created:</label>
        <select id="yearFilter" onchange="filterTable()">
          <option value="">All Years</option>
          <?php
          // Get distinct years from created_at
          $yearSql = "SELECT DISTINCT YEAR(created_at) AS year FROM users ORDER BY year DESC";
          $yearResult = mysqli_query($conn, $yearSql);
          while ($yearRow = mysqli_fetch_assoc($yearResult)) {
              $year = htmlspecialchars($yearRow['year']);
              echo "<option value=\"$year\">$year</option>";
          }
          ?>
        </select>
      </div>

      <table id="usersTable">
        <thead>
          <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date Created</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT user_id, username, name, email, created_at FROM users ORDER BY created_at DESC";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0):
            while($row = mysqli_fetch_assoc($result)):
          ?>
            <tr>
              <td><?= htmlspecialchars($row['user_id']) ?></td>
              <td><?= htmlspecialchars($row['username']) ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= htmlspecialchars($row['created_at']) ?></td>
            </tr>
          <?php
            endwhile;
          else:
          ?>
            <tr>
              <td colspan="5" style="text-align:center;">No users found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </main>
  </div>

  <script>
    function filterTable() {
      const yearFilter = document.getElementById("yearFilter").value;
      const rows = document.querySelectorAll("#usersTable tbody tr");

      rows.forEach(row => {
        const dateCreated = row.cells[4].textContent; // Date Created column
        const year = new Date(dateCreated).getFullYear().toString();

        if (yearFilter === "" || year === yearFilter) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    }
  </script>
</body>
</html>
