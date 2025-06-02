<?php 
include 'database.php'; 
$message = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Staff Dashboard (View Only)</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #2c3e50;
      color: white;
      padding: 20px;
      text-align: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      height: 120px;
    }

    .sidebar {
      width: 220px;
      background: #34495e;
      height: 100vh;
      padding-top: 130px; /* pushes below the fixed header */
      position: fixed;
      top: 0;
      left: 0;
      overflow-y: auto;
    }

    .sidebar a {
      display: block;
      color: white;
      padding: 15px;
      text-decoration: none;
    }

    .sidebar a:hover {
      background: #1abc9c;
    }

    .main {
      margin-left: 220px;
      padding: 160px 30px 30px 30px; /* top padding for header */
      height: calc(100vh - 70px);
      overflow-y: auto;
    }

    .summary-boxes {
      display: flex;
      gap: 20px;
      margin-bottom: 60px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .summary-box {
      flex: 1;
      max-width: 300px;
      background-color:rgb(219, 228, 231);
      padding: 40px;
      border-radius: 8px;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      transition: 0.3s;
    }

    .summary-box:hover {
      background-color: #d0d7de;
    }

    .summary-box a {
      text-decoration: none;
      color: #2c3e50;
      font-size: 20px;
      font-weight: bold;
    }

    .tables-container {
      display: flex;
      gap: 30px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .table-box {
      flex: 1;
      min-width: 300px;
      max-width: 600px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      overflow: hidden;
    }

    .table-title {
      background-color: #2c3e50;
      padding: 15px 20px;
      font-size: 20px;
      color: #f9f9f9;
      text-align: center;
      font-weight: bold;
      border-bottom: 1px solid #ccc;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 16px;
    }

    thead {
      background-color:rgb(106, 128, 151);
      color: #fff;
    }

    th, td {
      padding: 15px 20px;
      text-align: left;
    }

    tbody tr {
      background-color: #f9f9f9;
      transition: background-color 0.3s ease;
    }

    tbody tr:hover {
      background-color: #d0e8f2;
    }

    tbody td:first-child {
      font-weight: bold;
      color: #1abc9c;
      width: 50px;
    }
  </style>
</head>
<body>

<div class="header">
  <h1>Staff Dashboard (View Only)</h1>
</div>

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


<div class="main">
  <div class="summary-boxes">
    <div class="summary-box">
      <a href="view_books.php">View Books</a>
    </div>
    <div class="summary-box">
      <a href="discounted_books.php">Discounted Books</a>
    </div>
    <div class="summary-box">
      <a href="view_sales.php">View Sales</a>
    </div>
    <div class="summary-box">
      <a href="view_users.php">View Users</a>
    </div>
  </div>

  <div class="tables-container">
    <!-- Top Selling Books -->
    <div class="table-box">
      <div class="table-title">Top Selling Books</div>
      <table>
        <thead>
          <tr>
            <th>Rank</th>
            <th>Book Title</th>
            <th>Total Sold</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT books.title, SUM(sales.quantity) AS total_sold
                    FROM sales
                    JOIN books ON sales.book_title = books.title
                    GROUP BY sales.book_title
                    ORDER BY total_sold DESC
                    LIMIT 5";
          $result = mysqli_query($conn, $query);
          $rank = 1;
          if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                      <td>{$rank}</td>
                      <td>".htmlspecialchars($row['title'])."</td>
                      <td>{$row['total_sold']}</td>
                    </tr>";
              $rank++;
            }
          } else {
            echo "<tr><td colspan='3'>No sales data available.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Top Customers -->
    <div class="table-box">
      <div class="table-title">Top Customers</div>
      <table>
        <thead>
          <tr>
            <th>Rank</th>
            <th>Customer Name</th>
            <th>Total Purchases</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT customer_name, SUM(total_price) AS total_spent
                    FROM sales
                    GROUP BY customer_name
                    ORDER BY total_spent DESC
                    LIMIT 5";
          $result = mysqli_query($conn, $query);
          $rank = 1;
          if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                      <td>{$rank}</td>
                      <td>".htmlspecialchars($row['customer_name'])."</td>
                      <td>₱".number_format($row['total_spent'], 2)."</td>
                    </tr>";
              $rank++;
            }
          } else {
            echo "<tr><td colspan='3'>No customer data available.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
