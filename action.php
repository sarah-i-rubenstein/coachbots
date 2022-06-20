<?php

//name and email field
$name = $_POST['field1'];
$email = $_POST['field2'];

//validations
// $emailTest = test_input($email);
// if (!filter_var($emailTest, FILTER_VALIDATE_EMAIL)) {
//   $emailErr = "Invalid email format";
// }

// echo $emailErr;
//copy name and email into text file
 $path = $_POST['field1'].'_email.txt';
 $python_path = $_POST['field1'].'_pythonFiles.zip';
 echo "python path: ".$python_path;
 if (isset($_POST['field1']) && isset($_POST['field2'])) {
    $fh = fopen($path,"a+");

    $string = 'name: '.$name.PHP_EOL.' email: '.$email;

    fwrite($fh,$string); // Write information to the file
    fclose($fh); // Close the file

    //upload python file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $python_path)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Not uploaded because of error #".$_FILES["fileToUpload"]["error"];
    }
 }
 else{
   echo "All items not set";
 }

 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// header("Location: success.html");
exit();
 
?>
