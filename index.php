<?php
include("connect.php");
?>
<?php
   if (isset($_POST['upload'])) {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "image/" . $filename;
     $db = mysqli_connect("localhost", "root", "", "image");
    $sql = "INSERT INTO table_file (image) VALUES ('$filename')";
    mysqli_query($db, $sql);
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}
   ?>
   <form method="post" enctype="multipart/form-data">
   <div class="form-group">
                <label>Your Picture:</label>
                <input class="form-control" type="file" name="uploadfile" value="" >
            </div>
   <button type="submit"  name="upload">Submit</button>
   </form>
   