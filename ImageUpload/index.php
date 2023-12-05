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

	<h1 style="background-color:powderblue; color:crimson;text-align:center">Laden Sie Ihr Bild in unsere Datenbank</h1>
	
	<div class="flex-container">
		<div style="flex-grow: 1"><img src="..\ImageUpload\upload_Pic.jpg" alt="Upload" width="250" height="250"></div>
		<div style="flex-grow: 1"><img src="..\ImageUpload\upload_Pic.jpg" alt="Upload" width="250" height="250"></div>
		<div style="flex-grow: 1"><img src="..\ImageUpload\upload_Pic.jpg" alt="Upload" width="250" height="250"></div>
	</div>	
	    <form action="upload.php" method="post" enctype="multipart/form-data">
			<fieldset>
	            <hr>
				<legend style="color:darkmagenta"><b>Laden Sie Ihr Bild hoch.</b></legend>
	
	            <label for="tfName">Image to Upload:</label>
				<input type="file" id="fileToUpload" name="fileToUpload" placeholder="Image" value="">
				<br><br>
	
	
				<input type="submit" id="btSubmit" name="btSubmit" value="Upload Image">
					

				

				
			</fieldset>
		</form>
		<form action="showFiles.php" method="post" enctype="multipart/form-data">
			<input type="submit" id="showDB" name="showDB" value="Show DB">
		</form>
	</div>
</div>
</body>

</html>