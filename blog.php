
<?php
require_once 'dbConnection.php';

 function Clean($input){
     
    $input = trim($input);
    $input = strip_tags($input);
    $input = stripslashes($input);

    return $input;
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {

 $title = Clean($_POST['title']);
 $content = Clean($_POST['content']);
 # Errors Array ... 
 $errors = []; 

if(empty($title)){
    $errors['title']  = "Required Field"; 
}elseif(strlen($title) < 10){
    $errors['title']  = "Length Must Be >= 10 Chars"; 
}
if(empty($content)){
    $errors['content']  = "Required Field"; 
}elseif(strlen($content) < 50){
    $errors['content']  = "Length Must Be >= 50 Chars"; 
}

// if (!empty($_FILES['image']['name'])) {



//         
$msg = "";
  
// If upload button is clicked ...
if (isset($_POST['submit'])) {

    $fileName    = $_FILES['image']['name'];
    $fileTemName = $_FILES['image']['tmp_name'];
    $fileType    = $_FILES['image']['type'];
    $fileSize    = $_FILES['image']['size'];
    # Allowed Extensions 
    $allowedExtensions = ['jpg','png'];

    $fileArray = explode('/', $fileType);

    # file Extension ...... 
    $fileExtension = end($fileArray);

    if (in_array( $fileExtension, $allowedExtensions)) {

        # IMage New Name ...... 
        $FinalName = time() . rand() . '.' .  $fileExtension;

        $disPath = 'images/' . $FinalName;
        if (move_uploaded_file($fileTemName, $disPath)) {
                        echo 'image Uploaded Succ.... <br> ';
                    } else {
                        $errors['image']  =  'Error try Again....<br>';
                    }
                } else {
                    $errors['image']  =  'InValid Extension  image must be .png or jpg ....<br> ';
                }
            } else {
                $errors['image']  =  'image is Required....  <br>';
            }
# Check Errors ...... 
if(count($errors) > 0 ){
    foreach ($errors as $key => $value) {
        # code...
        echo '* '.$key.' : '.$value.'<br>';
    }
}else {

     // code ...... 
   $sql = "insert into data (title,content,image) values ('$title','$content','$FinalName')";

  $op =  mysqli_query($con,$sql);
  
    if($op){
        echo 'Raw Inserted';
    }else{
        echo 'Error Try Again '.mysqli_error($con);
    }
}


    mysqli_close($con);

 }

?>
<form method="post" enctype="multipart/form-data" action="">
title: <input type="text" name="title" require>
  <br><br>
  content: <input type="textarea" name="content" require>
  <br><br>
  image: <input type="file" name="image" require>
<br><br>
  <input type="submit" name="submit" value="Submit">

</form>
