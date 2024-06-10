<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "bank_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO customers (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
    if ($conn->query($sql) === TRUE) {
        echo "New customer added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
</head>
<body>
    <h1>Add New Customer</h1>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>
        <input type="submit" value="Add Customer">
    </form>
</body>
</html>
