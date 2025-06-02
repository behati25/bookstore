<?php
include 'database.php'; // Make sure this is the correct path

// Fetch all books
$sql = "SELECT * FROM books ORDER BY title ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Browse Book Inventory</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding: 20px;
      background-color: #f9f9f9;
    }
    .table thead {
      background-color: #343a40;
      color: white;
    }
    .search-box {
      max-width: 400px;
      margin-bottom: 20px;
    }
    .back-btn {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <h1 class="mb-4 text-center">Bookstore Inventory</h1>

  <a href="dashboard.php" class="btn btn-secondary back-btn">← Back to Dashboard</a>

  <input type="text" class="form-control search-box" id="searchInput" placeholder="Search by title or author..." onkeyup="filterTable()">

  <div class="table-responsive">
    <table class="table table-bordered table-striped" id="booksTable">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Author</th>
          <th>Genre</th>
          <th>Price (₱)</th>
          <th>Stock</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
          <?php $count = 1; ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $count++ ?></td>
              <td><?= htmlspecialchars($row['title']) ?></td>
              <td><?= htmlspecialchars($row['author']) ?></td>
              <td><?= htmlspecialchars($row['genre']) ?></td>
              <td><?= number_format($row['price'], 2) ?></td>
              <td><?= $row['stock'] ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="6" class="text-center">No books found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
function filterTable() {
  const input = document.getElementById("searchInput");
  const filter = input.value.toLowerCase();
  const rows = document.querySelectorAll("#booksTable tbody tr");

  rows.forEach(row => {
    const title = row.cells[1].textContent.toLowerCase();
    const author = row.cells[2].textContent.toLowerCase();
    row.style.display = (title.includes(filter) || author.includes(filter)) ? "" : "none";
  });
}
</script>

</body>
</html>
