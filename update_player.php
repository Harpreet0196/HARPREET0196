<?php
include 'config.php'; // Include your database configuration file

// Check if the ID parameter is set and fetch the player data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM players WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $player = $result->fetch_assoc();
    } else {
        echo "Player not found.";
        exit;
    }
}

// Update player data if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $team = $_POST['team'];
    $image = $player['image']; // Keep the old image by default

    // Handle file upload
    if ($_FILES['image']['name']) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        } else {
            echo "Error uploading the file.";
        }
    }

    // Update the player data
    $sql = "UPDATE players SET name='$name', position='$position', team='$team', image='$image' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_players.php"); // Redirect to the players list page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Player</title>
</head>
<body>
    <h2>Update Player</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $player['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $player['name']; ?>" required><br>
        <label for="position">Position:</label>
        <input type="text" name="position" value="<?php echo $player['position']; ?>" required><br>
        <label for="team">Team:</label>
        <input type="text" name="team" value="<?php echo $player['team']; ?>" required><br>
        <label for="image">Image:</label>
        <input type="file" name="image"><br>
        <img src="<?php echo $player['image']; ?>" alt="Current Image" width="100"><br>
        <input type="submit" value="Update Player">
    </form>
    <a href="admin_players.php">Back to Players List</a>
</body>
</html>
