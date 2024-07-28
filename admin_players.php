<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Players</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Panel - Manage Players</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="admin_players.php">Players</a></li>
                <li><a href="add_player.php">Add Player</a></li>
                    <li><a href="matches.php">Matches</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="about.php">About Me</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Players List</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Team</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $players_sql = "SELECT players.id, players.name, players.role, players.photo, teams.name AS team_name 
                                FROM players 
                                JOIN teams ON players.team_id = teams.id";
                $players_result = $conn->query($players_sql);
                if ($players_result->num_rows > 0) {
                    while($player = $players_result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $player['name'] . "</td>";
                        echo "<td>" . $player['role'] . "</td>";
                        echo "<td>" . $player['team_name'] . "</td>";
                        echo '<td><img src="'. $player['photo'] .'" alt="'. $player['name'] . '" width="50"></td>';
                        echo "<td>
                            
                            <a href='delete_player.php?id=" . $player['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            </td>";
                        echo "</tr>";
                        echo "<td>
        <a href='edit_player.php?id=" . $player['id'] . "'>Edit</a>
      </td>";

                    }
                } else {
                    echo "<tr><td colspan='5'>No players found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 Cricket World. All rights reserved.</p>
    </footer>
</body>
</html>
<?php $conn->close(); ?>
