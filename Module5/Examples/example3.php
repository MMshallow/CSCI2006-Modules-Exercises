<?php 
declare(strict_types=1);

/*
                        Example 3: File Upload
                        ======================
    PHP programming language provides an easy way to upload files to a dedicated directory
    in your filesystem. Here is an example of how you can upload various file types. You can 
    tweak and adjust the code to meet your requirements.
*/
// Check if the user submitted the form. If so, catch some properties of the file.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    // Get the file name.
    $fileName = $_FILES["file"]["name"];
    // Get the file size
    $fileSize = $_FILES["file"]["size"];
    // Provide the file path or location to save the file.
    $uploadDir = "uploads/";

    // Move the file to the upload directory. If successful,display success message
    // if not, display error message.
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadDir . $fileName)) {
        echo "Uploaded: $fileName ($fileSize bytes)";
    } else {
        echo "Upload failed!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        Select file: <input type="file" name="file">
        <button type="submit">Upload</button>
    </form>

</body>
</html>