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
        
        <div class="p-card">
            <h3>MP3 File</h3>
            <p class="p-card__content">
            <input type="file" id="mp3-file" name="mp3File" accept=".mp3" required />
            </p>
        </div>

        <div class="p-card">
            <h3>Image File</h3>
            <p class="p-card__content">
            <input type="file" id="image-file" name="imageFile" accept="image/*" required />
            </p>
        </div>

        <div class="p-card">
            <h3>MP4 Video File</h3>
            <p class="p-card__content">
            <input type="file" id="video-file" name="videoFile" accept=".mp4" required />
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
if (isset($_FILES['pdfFile']) && $_FILES['pdfFile']['error'] == UPLOAD_ERR_OK) {
    $fileName = $_FILES['pdfFile']['name'];
    $fileTmp = $_FILES['pdfFile']['tmp_name'];
    $fileType = $_FILES['pdfFile']['type'];

    if ($fileType == "application/pdf") {
        $uploadDir = "uploads/";

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
            echo "<p style='color:red;'>Error uploading PDF file.</p>";
        }
    } else {
        echo "<p style='color:red;'>Please upload a valid PDF file.</p>";
    }
}

if (isset($_FILES['mp3File']) && $_FILES['mp3File']['error'] == UPLOAD_ERR_OK) {
    $fileName = $_FILES['mp3File']['name'];
    $fileTmp = $_FILES['mp3File']['tmp_name'];
    $fileType = $_FILES['mp3File']['type'];

    if ($fileType == "audio/mpeg" || $fileType == "audio/mp3") {
        $uploadDir = "uploads/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filePath = $uploadDir . basename($fileName);

        if (move_uploaded_file($fileTmp, $filePath)) {
            echo "<div id='audio-display' style='margin-top: 20px;'>";
            echo "<h4>Uploaded MP3:</h4>";
            echo "<audio controls>";
            echo "<source src='$filePath' type='$fileType'>";
            echo "Your browser does not support the audio element.";
            echo "</audio>";
            echo "</div>";
        } else {
            echo "<p style='color:red;'>Error uploading MP3 file.</p>";
        }
    } else {
        echo "<p style='color:red;'>Please upload a valid MP3 file.</p>";
    }
}

if (isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] == UPLOAD_ERR_OK) {
    $fileName = $_FILES['imageFile']['name'];
    $fileTmp = $_FILES['imageFile']['tmp_name'];
    $fileType = $_FILES['imageFile']['type'];

    if (strpos($fileType, 'image/') === 0) {
        $uploadDir = "uploads/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filePath = $uploadDir . basename($fileName);

        if (move_uploaded_file($fileTmp, $filePath)) {
            echo "<div id='image-display' style='margin-top: 20px;'>";
            echo "<h4>Uploaded Image:</h4>";
            echo "<img src='$filePath' alt='Uploaded Image' style='max-width:100%; height:auto;' />";
            echo "</div>";
        } else {
            echo "<p style='color:red;'>Error uploading image file.</p>";
        }
    } else {
        echo "<p style='color:red;'>Please upload a valid image file.</p>";
    }
}

if (isset($_FILES['videoFile']) && $_FILES['videoFile']['error'] == UPLOAD_ERR_OK) {
    $fileName = $_FILES['videoFile']['name'];
    $fileTmp = $_FILES['videoFile']['tmp_name'];
    $fileType = $_FILES['videoFile']['type'];

    if ($fileType == "video/mp4") {
        $uploadDir = "uploads/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filePath = $uploadDir . basename($fileName);

        if (move_uploaded_file($fileTmp, $filePath)) {
            echo "<div id='video-display' style='margin-top: 20px;'>";
            echo "<h4>Uploaded Video:</h4>";
            echo "<video controls style='max-width:100%; height:auto;'>";
            echo "<source src='$filePath' type='$fileType'>";
            echo "Your browser does not support the video tag.";
            echo "</video>";
            echo "</div>";
        } else {
            echo "<p style='color:red;'>Error uploading video file.</p>";
        }
    } else {
        echo "<p style='color:red;'>Please upload a valid MP4 video file.</p>";
    }
}
?>

</body>
</html>
