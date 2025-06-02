<?php  
include 'database.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Books</title>
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

    .sidebar a:hover {
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

    /* Search bar + dropdown container */
    .search-bar {
      display: flex;
      gap: 15px;
      align-items: center;
      margin-bottom: 20px;
    }

    .search-bar input {
      padding: 8px;
      width: 300px;
      border: 1px solid #ccc;
      border-radius: 5px;
      flex-grow: 1;
      max-width: 300px;
    }

    .search-bar select {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background: white;
      cursor: pointer;
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

    .status-in {
      color: green;
    }

    .status-out {
      color: red;
    }
  </style>
</head>
<body>

  <div class="header">
    <h1>Book Inventory</h1>
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
      <h2>View Books</h2>

      <div class="search-bar">
        <input
          type="text"
          id="searchInput"
          onkeyup="filterTable()"
          placeholder="Search for title, author..."
        />

        <select id="genreFilter" onchange="filterTable()">
          <option value="">All Genres</option>
          <?php
            $genreSql = "SELECT DISTINCT genre FROM books ORDER BY genre ASC";
            $genreResult = mysqli_query($conn, $genreSql);
            while($genreRow = mysqli_fetch_assoc($genreResult)) {
              $genre = htmlspecialchars($genreRow['genre']);
              echo "<option value=\"$genre\">$genre</option>";
            }
          ?>
        </select>
      </div>

      <table id="booksTable">
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Published</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM books";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0):
            while($row = mysqli_fetch_assoc($result)):
              $status = ($row['stock'] > 0) ? "<span class='status-in'>In Stock</span>" : "<span class='status-out'>Out of Stock</span>";
          ?>
            <tr>
              <td><?= htmlspecialchars($row['title']) ?></td>
              <td><?= htmlspecialchars($row['author']) ?></td>
              <td><?= htmlspecialchars($row['genre']) ?></td>
              <td>₱<?= number_format($row['price'], 2) ?></td>
              <td><?= $row['stock'] ?></td>
              <td><?= $status ?></td>
              <td><?= isset($row['published_date']) ? htmlspecialchars($row['published_date']) : 'N/A' ?></td>
            </tr>
          <?php
            endwhile;
          else:
          ?>
            <tr>
              <td colspan="7">No books found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </main>
  </div>

  <script>
    function filterTable() {
      const searchInput = document.getElementById("searchInput").value.toLowerCase();
      const genreFilter = document.getElementById("genreFilter").value.toLowerCase();
      const rows = document.querySelectorAll("#booksTable tbody tr");

      rows.forEach(row => {
        const title = row.cells[0].textContent.toLowerCase();
        const author = row.cells[1].textContent.toLowerCase();
        const genre = row.cells[2].textContent.toLowerCase();

        const matchesSearch = title.includes(searchInput) || author.includes(searchInput);
        const matchesGenre = genreFilter === "" || genre === genreFilter;

        row.style.display = (matchesSearch && matchesGenre) ? "" : "none";
      });
    }
  </script>
</body>
</html>
