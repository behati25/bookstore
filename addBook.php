<?php
include '../includes/auth.php';
include '.database.php';

if ($_SESSION['role'] !== 'admin') exit("Access denied.");

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $genre = $_POST['genre'];
    $publisher = $_POST['publisher'];
    $year = $_POST['publication_year'];
    $price = $_POST['price'];
    $stock = $_POST['stock_quantity'];
    $reorder = $_POST['reorder_level'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO books (title, author, isbn, genre, publisher, publication_year, price, stock_quantity, reorder_level, description) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiddds", $title, $author, $isbn, $genre, $publisher, $year, $price, $stock, $reorder, $description);

    if ($stmt->execute()) {
        $message = "Book added successfully.";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Book</title>
  <style>
    form {
      max-width: 600px;
      margin: auto;
      padding: 20px;
      background: #f4f4f4;
      border-radius: 8px;
    }
    input, textarea, select {
      width: 100%;
      margin: 10px 0;
      padding: 8px;
    }
    button {
      padding: 10px 20px;
      background: #2c3e50;
      color: white;
      border: none;
      cursor: pointer;
    }
    .message {
      text-align: center;
      color: green;
    }
  </style>
</head>
<body>

<h2 style="text-align:center;">Add New Book</h2>
<?php if ($message): ?>
  <p class="message"><?= $message ?></p>
<?php endif; ?>

<form method="POST">
  <label>Title:</label>
  <input type="text" name="title" required>

  <label>Author:</label>
  <input type="text" name="author" required>

  <label>ISBN:</label>
  <input type="text" name="isbn" required pattern="\d{10}|\d{13}" title="ISBN must be 10 or 13 digits">

  <label>Genre:</label>
  <input type="text" name="genre">

  <label>Publisher:</label>
  <input type="text" name="publisher">

  <label>Publication Year:</label>
  <input type="number" name="publication_year" min="1000" max="9999">

  <label>Price:</label>
  <input type="number" name="price" step="0.01" required>

  <label>Stock Quantity:</label>
  <input type="number" name="stock_quantity" required>

  <label>Reorder Level:</label>
  <input type="number" name="reorder_level" required>

  <label>Description:</label>
  <textarea name="description" rows="4"></textarea>

  <button type="submit">Add Book</button>
</form>

</body>
</html>