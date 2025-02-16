<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Connection Failed");

// Check if 'text' key exists in POST request
if(isset($_POST['text'])) {
    $userMessage = mysqli_real_escape_string($conn, $_POST['text']);

    // Introduce a 2-second delay
    sleep(1);

    // Fetch reply from database
    $query = "SELECT replies FROM chatbot WHERE queries LIKE '%$userMessage%'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['replies'];
    } else {
        echo "Sorry, I didn't understand that.";
    }
} else {
    echo "Invalid request!";
}
?>
