<form action="doUpload.php" method="post" enctype="multipart/form-data">

    <label for="fileToUpload">File da caricare</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <button>Carica</button>
</form>

<div class="gallery">
<?php
    $imagesDir = 'uploads/';
    $images = glob($imagesDir .'*.{jpg,jpeg,PNG,gif}', GLOB_BRACE);

    foreach ($images as $image) {
 
        echo '<img src="'.$image.'" alt="Image">';
    }
    ?>
</div>