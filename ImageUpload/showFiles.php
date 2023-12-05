<?php 
    require_once "../ImageUpload/Moduls/config.php";
?>



<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Show Images</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<p><a href="" onclick="window.history.back();">back</a>
<div class="flex-box">

	<h1 style="background-color:powderblue; color:crimson;text-align:center">Die Files</h1>
	
	<div class="flex-container">
		<div style="flex-grow: 1"><img src="..\ImageUpload\upload_Pic.jpg" alt="Upload Picture" width="200" height="200"></div>
		<div style="flex-grow: 1"><img src="..\ImageUpload\upload_Pic.jpg" alt="Upload Picture" width="200" height="200"></div>
		<div style="flex-grow: 1"><img src="..\ImageUpload\upload_Pic.jpg" alt="Upload Picture" width="200" height="200"></div>
	</div>

    <table>
        <tr>
            <td><b>ID</b></td>
            <td><b>Original Name</b></td>
            <td><b>System Name</b></td>
        </tr>

        <?php $db->selectAllFiles($servername, $username, $password, $databasename)?>
    </table>

    
    

	   
	</div>
</div>
</body>

</html>