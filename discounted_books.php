<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Discounted Books</title>
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

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 12px 15px;
      text-align: center;
      border-bottom: 1px solid #ddd;
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

    .no-data {
      text-align: center;
      margin-top: 20px;
      color: #888;
    }
  </style>
</head>
<body>

  <div class="header">
    <h1>Discounted Books</h1>
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
      <h2>Discounted Books</h2>

      <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>Original Price</th>
            <th>Discount Price</th>
            <th>Discount (%)</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT title, price, discount_price FROM books 
                  WHERE discount_price IS NOT NULL AND discount_price < price";

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $discount = round((($row['price'] - $row['discount_price']) / $row['price']) * 100, 2);
            echo "<tr>
                    <td>" . htmlspecialchars($row['title']) . "</td>
                    <td>₱" . number_format($row['price'], 2) . "</td>
                    <td>₱" . number_format($row['discount_price'], 2) . "</td>
                    <td>{$discount}%</td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='4' class='no-data'>No discounted books available.</td></tr>";
        }
        ?>
        </tbody>
      </table>
    </main>
  </div>

</body>
</html>
