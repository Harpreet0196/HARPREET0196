<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matches - Cricket World</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-content">
        <h1>Matches</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="teams.php">Teams</a></li>
                    <li><a href="matches.php">Matches</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="about.php">About Me</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <h1>Matches</h1>
        <ul class="match-list">
            <?php
            $matches = [
                [
                    'title' => 'India vs Pakistan',
                    'date' => 'June 9, 2024',
                    'time' => '10:30',
                    'image' => 'india vs Pakistan.png'
                ],
                [
                    'title' => 'England vs Australia',
                    'date' => 'June 8, 2024',
                    'time' => '13:00',
                    'image' => 'england vs australia.png'
                ]
            ];

            foreach ($matches as $match) {
                echo "<li>
                        <h2>{$match['title']}</h2>
                        <p>Date: {$match['date']} Time: {$match['time']}</p>
                        <img src='{$match['image']}' alt='{$match['title']}' width='100px' height='100px'>
                    </li>";
            }
            ?>
        </ul>
    </main>
    <footer>
        <p>&copy; 2024 Cricket World. All rights reserved.</p>
    </footer>
</body>
</html>
