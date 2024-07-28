<?php
include 'db.php';

if (isset($_GET['id'])) {
    $player_id = (int)$_GET['id'];

    $sql = "DELETE FROM players WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $player_id);
        if ($stmt->execute()) {
            echo "Player deleted successfully.";
        } else {
            echo "Error deleting player: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
header("Location: admin_players.php");
exit();
?>
