<?php
session_start();
include 'includes/db_connect.inc';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- Retrieve form data ---
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);
    $rate = filter_input(INPUT_POST, 'rate', FILTER_VALIDATE_FLOAT);
    $level = trim($_POST['level']);

    // --- Handle file upload ---
    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_size = $image['size'];
    $image_error = $image['error'];

    // --- Server-side validation ---
    if (empty($title) || empty($description) || empty($category) || $rate === false || empty($level)) {
        $_SESSION['message'] = "All fields are required.";
        $_SESSION['message_type'] = "danger";
        header("Location: add.php");
        exit();
    }

    if ($image_error !== 0) {
        $_SESSION['message'] = "There was an error uploading your file.";
        $_SESSION['message_type'] = "danger";
        header("Location: add.php");
        exit();
    }

    $file_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (!in_array($file_ext, $allowed_exts)) {
        $_SESSION['message'] = "Invalid file type. Only JPG, JPEG, PNG, GIF, and WEBP are allowed.";
        $_SESSION['message_type'] = "danger";
        header("Location: add.php");
        exit();
    }
    
    // Create a unique filename to prevent overwriting existing files
    $new_image_name = uniqid('', true) . "." . $file_ext;
    $target_dir = "assets/images/skills/";
    $target_file = $target_dir . $new_image_name;

    // --- Move file and insert into database ---
    if (move_uploaded_file($image_tmp_name, $target_file)) {
        // File uploaded successfully, now insert into DB using prepared statement
        $sql = "INSERT INTO skills (title, description, category, rate, level, image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssiss", $title, $description, $category, $rate, $level, $new_image_name);
            
            if (mysqli_stmt_execute($stmt)) {
                // Success
                $_SESSION['message'] = "New skill added successfully!";
                $_SESSION['message_type'] = "success";
                header("Location: skills.php");
                exit();
            } else {
                // DB Insert Error
                $_SESSION['message'] = "Error adding skill to the database: " . mysqli_stmt_error($stmt);
                $_SESSION['message_type'] = "danger";
                header("Location: add.php");
                exit();
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['message'] = "Error preparing database statement.";
            $_SESSION['message_type'] = "danger";
            header("Location: add.php");
            exit();
        }
    } else {
        // File Move Error
        $_SESSION['message'] = "Sorry, there was an error moving your uploaded file.";
        $_SESSION['message_type'] = "danger";
        header("Location: add.php");
        exit();
    }

    mysqli_close($conn);

} else {
    // If not a POST request, redirect
    header("Location: add.php");
    exit();
}
?>