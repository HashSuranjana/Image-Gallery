<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ImageGallery.css">
    <title>Image Gallery</title>
</head>
<body>

    <div class="upload">

        <div class="upload-items">

            <input type="button" value="Upload">

            <form action="imageGallery.php" method="post" enctype="multipart/form-data">
                <input type="file"  id="file-input">
                <input type="button" value="Upload">
            </form>

        </div>
        
    </div>
    
</body>
</html>