<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
</head>
<body>
	<?php

			include "config.php";

			
			$sql1="SELECT `email`, `username`, `password`, `firstName`, `lastName`, `adress`, `fk_idsellingLicense` FROM `account` WHERE email='$_POST[email]'";
			$result1=$mysqli->query($sql1);

			while ($row1= $result1->fetch_assoc()) {
				
				$adress=$row1['adress'];
				$firstName=$row1['firstName'];
				$lastName=$row1['lastName'];	
			}


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

										           	$status1 = $statusMsg1 = ''; 
												if(isset($_POST["submit"])){ 
										    $status1 = 'error'; 
										    if(!empty($_FILES["background"]["name"])) { 
										        // Get file info 
										        $fileName1 = basename($_FILES["background"]["name"]); 
										        $fileType1 = pathinfo($fileName1, PATHINFO_EXTENSION); 
										         
										        // Allow certain file formats 
										        $allowTypes1 = array('jpg','png','jpeg','gif'); 
										        if(in_array($fileType1, $allowTypes1)){ 
										            $image1 = $_FILES['background']['tmp_name']; 
										            $imgContent1 = addslashes(file_get_contents($image1)); 
										         
										            // Insert image content into database 
													$sql="INSERT INTO `sellinglicense`( `fk_account_email`, `adress`, `firstName`, `lastName`, `dateofbirth`, `phoneNumber`, `photo`,`background`) VALUES ('$_POST[email]','$adress','$firstName','$lastName','$_POST[dateofbirth]','$_POST[phoneNumber]','$imgContent','$imgContent1')";
														$insert=$mysqli->query($sql);	
										             
										            if($insert){ 
										                $status1 = 'success'; 
										                $statusMsg1 = "File uploaded successfully background."; 
										            }else{ 
										                $statusMsg1 = "File upload failed, please try again background."; 
										            }  
										        }else{ 
										            $statusMsg1 = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.background'; 
										        } 
										    }else{ 
										        $statusMsg1 = 'Please select an image file to upload.background'; 
										    } 
										}else{
											echo "string";
										} 
										
										echo $statusMsg;
			             
			            if($insert){ 
			                $status = 'success'; 
			                $statusMsg = "File uploaded successfully. image"; 
			            }else{ 
			                $statusMsg = "File upload failed, please try again.image"; 
			            }  
			        }else{ 
			            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.image'; 
			        } 
			    }else{ 
			        $statusMsg = 'Please select an image file to upload.image'; 
			    } 
			}else{
				echo "string";
			} 
			
			echo $statusMsg;


			$sql2="SELECT `idsellingLicense` FROM `sellinglicense` WHERE fk_account_email='$_POST[email]'";
			$result=$mysqli->query($sql2);

			
			while ($row= $result->fetch_assoc()) {
				
				$rep=$row['idsellingLicense'];	
			}
	
			$sql3="UPDATE `account` SET `fk_idsellingLicense`=$rep WHERE email='$_POST[email]' ";	
			$mysqli->query($sql3);


		 header('Location: index.php?id=' .$_POST['email'] ."&seller");

			 ?>


		

</body>
</html>