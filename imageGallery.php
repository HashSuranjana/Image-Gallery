<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="ImageGallery.css">
    <title>Image Gallery</title>
</head>
<body>
    <?php 

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["Upload"])) {
            $startValue = true;
            $errors = [];

            $fileName = $_FILES['file-input']['name'];
            $fileSize = $_FILES['file-input']['size'];
            $fileType = $_FILES['file-input']['type'];
            $tmpName  = $_FILES['file-input']['tmp_name'];

            $uploadTo = 'ImageStore/';

            if ($fileType !== 'image/jpeg') {
                $errors[] = 'Only JPG files can be uploaded!';
            }
            if ($fileSize > 5000000) {
                $errors[] = 'File size is too high!';
            }

            
        }
    ?>
    <nav class="navbar navbar-light bg-light p-4 sticky-top">
        <h3 class="float-start fw-bolder fst-italic">MyGallery.</h3>
        <button id="show-upload-form" class="btn btn-primary float-end sticky-top">Upload an Image</button>        
    </nav>

    <div class="container-fluid pt-10">
        <div class="upload-items border border-primary border-2 bg-light me-1" id="upload-form" style="display: none; z-index: 2 ;">
            <form action="imageGallery.php" class = "container-sm" method="post" enctype="multipart/form-data">
                <input type="file" name="file-input" class="form-control form-control-sm mb-3" required>
                <?php 
                    

                    if($startValue == true) {
                        if (empty($errors)) {
                            if (move_uploaded_file($tmpName, $uploadTo . basename($fileName))) {
                                echo "<div class='alert alert-success'>File uploaded successfully!</div>";
                            } else {
                                $errors[] = 'There was an error uploading your file.';
                            }
                        }
    
                        if (!empty($errors)) {
                            foreach ($errors as $error) {
                                echo "<div class='alert alert-danger'>" . htmlspecialchars($error) . "</div>";
                            }
                        }
                    }
                    $startValue = false;
                ?>
                <input type="submit" name="Upload" value="Upload" class="btn btn-primary">
            </form>
        </div>
    </div>

    <?php 
   
        $imageList = scandir("ImageStore/") ;

        echo "<div class= 'container pt-10 xxl-mx-auto'>";

        foreach ($imageList as $image) {

            if(substr($image,strlen($image)-3) == "jpg") {
                echo "<img src='" . htmlspecialchars($uploadTo . $image) . "' alt='" . htmlspecialchars($fileName) . "'class='img-fluid col-sm-5 col-md-5 col-xxl-2 rounded mx-1 my-1'/>" ;
            }
        }
        echo "</div>";
        
    ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="imageGallery.js"></script>
</body>
</html>
