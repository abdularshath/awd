<?php
$customer = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "bank_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM customers WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
    } else {
        echo "No customer found with ID $id";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Customer</title>
</head>
<body>
    <h1>Search Customer</h1>
    <form method="post" action="">
        <label for="id">Customer ID:</label>
        <input type="number" id="id" name="id" required><br><br>
        <input type="submit" value="Search Customer">
    </form>

    <?php if ($customer): ?>
    <h2>Customer Details</h2>
    <p><strong>Name:</strong> <?= $customer['name'] ?></p>
    <p><strong>Email:</strong> <?= $customer['email'] ?></p>
    <p><strong>Phone:</strong> <?= $customer['phone'] ?></p>
    <p><strong>Address:</strong> <?= $customer['address'] ?></p>
    <?php endif; ?>
</body>
</html>
