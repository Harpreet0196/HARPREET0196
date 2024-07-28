<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Player - Cricket World</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Add Player</h1>
        <nav>
            <ul>
                <li><a href="admin_players.php">Players</a></li>
                <li><a href="add_player.php">Add Player</a></li>
                <li><a href="index.php">Home</a></li>
                    <li><a href="matches.php">Matches</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="about.php">About Me</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="add_player.php" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="role">Role:</label>
            <input type="text" id="role" name="role" required>
            
            <label for="team_id">Team:</label>
            <select id="team_id" name="team_id" required>
                <?php
                $teams_sql = "SELECT id, name FROM teams";
                $teams_result = $conn->query($teams_sql);
                if ($teams_result->num_rows > 0) {
                    while($team = $teams_result->fetch_assoc()) {
                        echo "<option value='" . $team['id'] . "'>" . $team['name'] . "</option>";
                    }
                }
                ?>
            </select>
            
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" required>
            
            <input type="submit" value="Add Player">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $role = $_POST['role'];
            $team_id = $_POST['team_id'];
            $photo = $_FILES['photo']['name'];
            
            // Upload the photo
            $target_dir = "download";
            $target_file = $target_dir . basename($photo);
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                // Insert the new player into the database
                $sql = "INSERT INTO players (name, role, team_id, photo) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("ssis", $name, $role, $team_id, $photo);
                    if ($stmt->execute()) {
                        echo "New player added successfully.";
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Error preparing statement: " . $conn->error;
                }
            } else {
                echo "Error uploading the file.";
            }
        }
        ?>

    </main>
    <footer>
        <p>&copy; 2024 Cricket World. All rights reserved.</p>
    </footer>
</body>
</html>
<?php $conn->close(); ?>
