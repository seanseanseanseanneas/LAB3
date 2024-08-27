<?php
if (isset($_FILES['pdfFile'])) {
    $fileName = $_FILES['pdfFile']['name'];
    $fileTmp = $_FILES['pdfFile']['tmp_name'];
    $fileType = $_FILES['pdfFile']['type'];

    // Ensure the uploaded file is a PDF
    if ($fileType == "application/pdf") {
        $uploadDir = "uploads/";

        // Ensure the uploads directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filePath = $uploadDir . basename($fileName);

        if (move_uploaded_file($fileTmp, $filePath)) {
            echo "<h3>Uploaded PDF:</h3>";
            echo "<iframe src='$filePath' width='100%' height='600px'></iframe>";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Please upload a valid PDF file.";
    }
} else {
    echo "Failed to upload file";
    print_r($_FILES);
}
?>
