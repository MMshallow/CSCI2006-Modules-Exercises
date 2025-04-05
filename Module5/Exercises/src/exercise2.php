<?php 
declare(strict_types=1);
/*
                Exercise 2: File Upload Handling
                ================================
    Write a PHP program to handle file uploads. Use the template provided to 
    write a function that handles the file upload. if the upload is successful,
    the function returns true, otherwise false.
*/
final class Module52 {
    public function upload_is_successful(): bool {
        $success = false;
        // Write your solution below this line

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
            $fileTmpPath = $_FILES["file"]["tmp_name"];
            $fileName = basename($_FILES["file"]["name"]);
            $fileError = $_FILES["file"]["error"];

            // Destination folder
            $uploadDir = "uploads/";

            // Create the folder if it doesn't exist
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $destination = $uploadDir . $fileName;

            // Check if there were no upload errors and move the file
            if ($fileError === 0 && move_uploaded_file($fileTmpPath, $destination)) {
                $success = true;
            }
        }


        return $success;
    }
}


// DO NOT REMOVE or EDIT the following code
$upload = new Module52();
$result = $upload->upload_is_successful();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="file">Select a file to upload</label><br>
        <p><input name="file" id="file" type="file" /></p>
        <button type="submit">Upload File</button>
    </form>
    <!-- Message logic -->
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <?php if ($result): ?>
            <p style="color: green;">File uploaded successfully!</p>
        <?php else: ?>
            <p style="color: red;">File upload failed. Please try again.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>

