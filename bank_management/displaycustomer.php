<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "bank_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Customers</title>
</head>
<body>
    <h1>All Customers</h1>
    <?php if ($result->num_rows > 0): ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['address'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
    <p>No customers found.</p>
    <?php endif; ?>
</body>
</html>
