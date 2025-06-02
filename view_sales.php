<?php
include 'database.php';

$sql = "
  SELECT 
    s.book_title,
    s.quantity,
    s.sale_date,
    s.unit_price,
    s.total_price,
    s.customer_name,
    s.email,
    s.payment_method,
    s.notes
  FROM sales s
  ORDER BY s.sale_date DESC
";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sales Report</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      margin: 0;
      padding: 0;
      height: 100vh;
      overflow: hidden;
      display: flex;
      flex-direction: column;
    }

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

    .container {
      display: flex;
      flex-grow: 1;
      margin-top: 70px;
      height: calc(100vh - 70px);
    }

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

    .main {
      margin-left: 220px;
      padding: 30px;
      overflow-y: auto;
      flex-grow: 1;
      background: #fff;
    }

    .main h2 {
      margin-top: 40px;
      color: #2c3e50;
    }

    .search-bar {
      margin-bottom: 20px;
    }

    .search-bar input {
      padding: 8px;
      width: 300px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
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

    .notes {
      font-style: italic;
      color: #555;
    }
  </style>
</head>
<body>

  <div class="header">
    <h1>Sales Report</h1>
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
      <h2>Sales Report</h2>

      <div class="search-bar">
        <input
          type="text"
          id="searchInput"
          placeholder="Search by customer, email, payment..."
          onkeyup="filterTable()"
        />
      </div>

      <table id="salesTable">
        <thead>
          <tr>
            <th>Book Title</th>
            <th>Quantity</th>
            <th>Sale Date</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Payment Method</th>
            <th>Notes</th>
          </tr>
        </thead>
        <tbody>
          <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= htmlspecialchars($row['book_title']) ?></td>
                <td><?= $row['quantity'] ?></td>
                <td><?= $row['sale_date'] ?></td>
                <td>₱<?= number_format($row['unit_price'], 2) ?></td>
                <td>₱<?= number_format($row['total_price'], 2) ?></td>
                <td><?= htmlspecialchars($row['customer_name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['payment_method']) ?></td>
                <td class="notes"><?= htmlspecialchars($row['notes']) ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="9">No sales found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </main>
  </div>

  <script>
    function filterTable() {
      const input = document.getElementById("searchInput").value.toLowerCase();
      const rows = document.querySelectorAll("#salesTable tbody tr");

      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(input) ? "" : "none";
      });
    }
  </script>

</body>
</html>
