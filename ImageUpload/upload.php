<?php
  require_once "../ImageUpload/Moduls/config.php";


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//echo ("fileToUpload: " . basename($_FILES["fileToUpload"]["name"]). "<hr>");
$filename = basename($_FILES["fileToUpload"]["name"]);




// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size 
if ($_FILES["fileToUpload"]["size"] > 50000) {
  
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $systemName = rand(100000000000,999999999999);

    $key = hash('sha256','mein_16byte_schluessel');
    $iv = substr(hash('sha256','mein_16byte_iv'),0,16);
    $encrypted = openssl_encrypt( $systemName , "AES-256-CBC", $key, 0, $iv);

    $db->checkSystemName($servername , $username, $password, $databasename, $encrypted);
    
    
    
    $target_file = $target_dir . $encrypted . ".". $imageFileType;



  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //create System Name for file

    
    //$geheimer_text = $_FILES["fileToUpload"]["tmp_name"];



 
    //$systemName = $encrypted;   
    //echo "System NAme: ". $systemName. "<hr>";

    // name of file add to db
    //echo ("fileToUpload: " . $filename . "<hr>");
    $db-> addPreparedStatmentFile($servername , $username, $password, $databasename, basename($_FILES["fileToUpload"]["name"]), $systemName);

    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


?>

<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Image Upload</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="flex-box">

	<h1 style="background-color:powderblue; color:crimson;text-align:center">Ihr Bild <?php echo basename($_FILES["fileToUpload"]["name"])?> wurde gespeichert</h1>
	
	<div class="flex-container">
		<div style="flex-grow: 1"><img src="..\ImageUpload\upload_Pic.jpg" alt="Upload Picture" width="200" height="200"></div>
		<div style="flex-grow: 1"><img src="..\ImageUpload\upload_Pic.jpg" alt="Upload Picture" width="200" height="200"></div>
		<div style="flex-grow: 1"><img src="..\ImageUpload\upload_Pic.jpg" alt="Upload Picture" width="200" height="200"></div>
	</div>	
	    <form action="upload.php" method="post" enctype="multipart/form-data">
			<fieldset>
	            <hr>

              <p><a href="" onclick="window.history.back();">back</a>
              <br><br>


			</fieldset>
		</form>
	</div>
</div>
</body>

</html>