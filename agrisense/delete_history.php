<?php
session_start();
include('config/config.php');

if (isset($_POST['delete'])) {
    // Get the inputID from the form
    $inputID = $_POST['inputID'];

    // Perform the deletion query
    $deleteQuery = "DELETE FROM inputs WHERE inputID = '$inputID'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Deletion successful
        $_SESSION['success_message'] = 'Record deleted successfully.';
    } else {
        // Deletion failed
        $_SESSION['error_message'] = 'Error deleting record: ' . mysqli_error($conn);
    }

    // Redirect back to the page where the form was submitted
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    // If the form was not submitted properly, redirect to the home page or any other appropriate page
    header('Location: index.php');
    exit;
}
?>
