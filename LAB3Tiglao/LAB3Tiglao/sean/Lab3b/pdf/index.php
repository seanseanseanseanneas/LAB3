<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>

<body style="background-color: pink;">
<div class="u-fixed-width">
  <div class="p-logo-section">
    <div class="p-logo-section__items">
      <div class="p-logo-section__item">
        <img class="p-logo-section__logo" src="https://www.auf.edu.ph/home/images/logo2.png" alt="Angeles University Foundation">
      </div>
    </div>
  </div>
</div>

<div class="row--50-50 grid-demo">
  <div class="col">
    <h4>File Upload</h4>

    <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="p-card">
            <h3>PDF File</h3>
            <p class="p-card__content">
            <input type="file" id="pdf-file" name="pdfFile" accept=".pdf" required />
            </p>
        </div>

        <div>
            <button type="submit">Upload</button>
        </div>
    </form>
  </div>
  <div class="col">
    <img class="p-logo-section__logo" src="https://www.auf.edu.ph/home/images/mascot/CCS.png" alt="College of Computing Studies">
  </div>
</div>

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
            echo "<div id='pdf-display' style='margin-top: 20px;'>";
            echo "<h4>Uploaded PDF:</h4>";
            echo "<iframe id='pdf-frame' src='$filePath' style='width:100%; height:600px;' frameborder='0'></iframe>";
            echo "</div>";
        } else {
            echo "<p style='color:red;'>Error uploading file.</p>";
        }
    } else {
        echo "<p style='color:red;'>Please upload a valid PDF file.</p>";
    }
}
?>

</body>
</html>
