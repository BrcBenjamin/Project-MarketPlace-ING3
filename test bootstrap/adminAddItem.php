<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
</head>
<body>
	<?php

			include "config.php";
			echo "1";
			if ($_POST["Category"]==1) {
				$Subcategory=$_POST["SubCategory1"];
			}
			echo "2";
			if ($_POST["Category"]==2) {
				$Subcategory=$_POST["SubCategory2"];
			}
			echo "3";

			$status = $statusMsg = ''; 
			if(isset($_POST["submit"])){ 
			    $status = 'error'; 
			    if(!empty($_FILES["image"]["name"])) { 
			        // Get file info 
			        $fileName = basename($_FILES["image"]["name"]); 
			        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
			         
			        // Allow certain file formats 
			        $allowTypes = array('jpg','png','jpeg','gif'); 
			        if(in_array($fileType, $allowTypes)){ 
			            $image = $_FILES['image']['tmp_name']; 
			            $imgContent = addslashes(file_get_contents($image)); 
			         
			            // Insert image content into database 
			            $sql = "INSERT INTO `item`(`name`, `purchaseCategory`, `category`, `subcategory`, `price`, `description`,`conditionn`, `publicationDateTime`, `availability`, `photo`, `account_email`) VALUES ('$_POST[name]','$_POST[PurchaseCategory]','$_POST[Category]','$Subcategory','$_POST[price]','$_POST[description]','$_POST[condition]','$_POST[date]','1','$imgContent','$_POST[email]')";

			 			$insert=$mysqli->query($sql);	
			             
			            if($insert){ 
			                $status = 'success'; 
			                $statusMsg = "File uploaded successfully."; 
			            }else{ 
			                $statusMsg = "File upload failed, please try again."; 
			            }  
			        }else{ 
			            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
			        } 
			    }else{ 
			        $statusMsg = 'Please select an image file to upload.'; 
			    } 
			}else{
				echo "string";
			} 
			
			echo $statusMsg;

			
			header('Location: admin.php');
			

			?>

</body>
</html>