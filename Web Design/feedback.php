<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Taste of Thess</title>
    <link rel="stylesheet" href="FA.css">
</head>
<body>
    <header>
        <h1 style="text-align: center;">Taste of Thess</h1>
        <nav>
      <ul>
        <li><a href="FA.html">Home</a></li>
        <li><a href="about.html">About Me</a></li>
        <li><a href="review.html">Food Review</a></li>
        <li><a href="feedback.php">Feedback</a></li>
      </ul>
    </nav>
    </header>
    <main>
    <h2>We’d Love Your Feedback!</h2>
    <p style="text-align:center;">Please fill out the form below to share your thoughts.</p>

    <form action="feedback.php" method="POST" class="feedback-form">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="rating">Rating:</label>
      <select id="rating" name="rating" required>
        <option value="">Select rating</option>
        <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
        <option value="4">⭐⭐⭐⭐ Good</option>
        <option value="3">⭐⭐⭐ Average</option>
        <option value="2">⭐⭐ Poor</option>
        <option value="1">⭐ Terrible</option>
      </select>

      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="5" required></textarea>

      <button type="submit">Submit Feedback</button>
    </form>
    <hr>
    <!-- PHP SECTION TO HANDLE FORM & SHOW COMMENTS -->
    <?php
 

    $filename = "feedback.txt"; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $rating = htmlspecialchars($_POST['rating']);
        $message = htmlspecialchars($_POST['message']);

        $entry = "Name: $name\nRating: $rating\nMessage: $message\n---\n";
        file_put_contents($filename, $entry, FILE_APPEND);

        
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    // Display feedback below
    if (file_exists($filename)) {
        echo "<h3>Previous Feedback</h3>";
        $contents = file_get_contents($filename);
        $entries = array_filter(explode("---", $contents));

        foreach ($entries as $entry) {
            $lines = array_filter(explode("\n", trim($entry)));
            echo "<div class='feedback-box'>";
            foreach ($lines as $line) {
                echo "<p>" . htmlspecialchars($line) . "</p>";
            }
            echo "</div><hr>";
        }
    } else {
        echo "<p>No feedback yet — be the first to comment!</p>";
    }
    ?>
  </main>

     <footer>
  <p>© 2025 Taste of Thess. All rights reserved.</p>
</footer>