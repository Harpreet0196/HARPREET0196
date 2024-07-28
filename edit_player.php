<?php
include 'db.php';

if (isset($_GET['id'])) {
    $player_id = $_GET['id'];

    // Fetch player information from the database
    $player_sql = "SELECT * FROM players WHERE id = $player_id";
    $player_result = $conn->query($player_sql);

    if ($player_result->num_rows > 0) {
        $player = $player_result->fetch_assoc();
    } else {
        echo "Player not found.";
        exit;
    }
} else {
    echo "No player ID provided.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $role = $_POST['role'];
    $team_id = $_POST['team_id'];
    $photo = $_POST['photo'];  // Assuming the photo is a URL or similar

    // Update player information in the database
    $update_sql = "UPDATE players SET name = '$name', role = '$role', team_id = $team_id, photo = '$photo' WHERE id = $player_id";

    if ($conn->query($update_sql) === TRUE) {
        echo "Player updated successfully.";
        header("Location: admin_players.php");
        exit;
    } else {
        echo "Error updating player: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Player</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Edit Player</h1>
    </header>
    <main>
        <form action="edit_player.php?id=<?php echo $player_id; ?>" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $player['name']; ?>" required>

            <label for="role">Role:</label>
            <input type="text" id="role" name="role" value="<?php echo $player['role']; ?>" required>

            <label for="team_id">Team:</label>
            <input type="number" id="team_id" name="team_id" value="<?php echo $player['team_id']; ?>" required>

            <label for="photo">Photo URL:</label>
            <input type="text" id="photo" name="photo" value="<?php echo $player['photo']; ?>" required>

            <button type="submit">Update Player</button>
        </form>
    </main>
</body>
</html>
