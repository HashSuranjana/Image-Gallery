<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ImageGallery.css">
    <title>Image Gallery</title>
</head>
<body>
    <?php 

        if(isset($_POST["Upload"])) {

            $errors = [] ;

            $fileName = $_FILES['file-input']['name'];
            $fileSize = $_FILES['file-input']['size'];
            $fileType = $_FILES['file-input']['type'];
            $tmpName  = $_FILES['file-input']['tmp_name'];

            $uploadTo = 'ImageStore/';

            if($fileType !='image/jpeg') {
                $errors[] = 'Only Jpg files can be uploaded !';
            }elseif ($fileSize > 5000000){
                $errors[] = 'File Size is too high !';
            }elseif($fileType !='image/jpeg' && $fileSize > 5000000) {
                $errors[] = "Doesn't match selected !";
            }

            if(empty($errors)) {
                move_uploaded_file($tmpName, $uploadTo.$fileName);
            }
        }
    
    
    ?>

    <div class="upload">

        <div class="upload-items">

            

            <form action="imageGallery.php" method="post" enctype="multipart/form-data">
                <input type="file"  name="file-input">
                
                <input type="submit" name="Upload">

            </form>

        </div>

        <?php 
                    if(isset($_POST["Upload"])) {
                        if(!(empty($errors))) {
                            foreach($errors as $error) {
                                echo "{$error}";
                            }
                            
                        }else {
                            echo  "<img src = '". $uploadTo.$fileName ."' alt = error />" ;
                        }
                    }

                ?>

    </div>

    

    <script src="imageGallery.js"></script>
    
</body>
</html>