<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Cricket World</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                    <li><a href="admin_players.php">Players</a></li>
                    <li><a href="matches.php">Matches</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="about.php">About Me</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Get in Touch</h2>
        <form action="contact_form.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            
            <input type="submit" value="Send Message">
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Cricket World. All rights reserved.</p>
    </footer>
</body>
</html>
