<?php
/** Load Essentials & Database */
require_once(__DIR__ . '/../../config/app.php');
require_once($db_url);

/** Model Area */
$sql = "SELECT * FROM order_image_gallery WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$image = null;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $image = $row['image_url'];
} else {
    echo "<p>User not found.</p>";
}

$id_to_delete = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM order_image_gallery WHERE id = ?");
$stmt->bind_param("i", $id_to_delete);

if ($stmt->execute()) {
    if (file_exists(__DIR__ . "/../../public/uploads/" . $image)) {
        unlink(__DIR__ . '/../../public/uploads/' . $image);
    }
}

$stmt->close();
$conn->close();

header("Location: /src/orders/edit.php?id=" . $_GET['order_id']);
