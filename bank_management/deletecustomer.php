<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "bank_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM customers WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Customer deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Customer</title>
</head>
<body>
    <h1>Delete Customer</h1>
    <form method="post" action="">
        <label for="id">Customer ID:</label>
        <input type="number" id="id" name="id" required><br><br>
        <input type="submit" value="Delete Customer">
    </form>
</body>
</html>
