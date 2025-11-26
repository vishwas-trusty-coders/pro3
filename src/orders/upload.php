
<?php

/** Load Essentials & Database */
require_once(__DIR__ . '/../../config/app.php');
require_once($db_url);

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // File properties
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Get file extension
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    // Allowed file types
    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) { // Max 5MB file size
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../../public/uploads/' . $fileNameNew; // Directory to save images

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    try{
                        if(!empty($_POST['order_id'])){
                            $sql = "INSERT INTO order_image_gallery (image_url,order_id) VALUES (?,?)";
                            $stmt = mysqli_prepare($conn, $sql);
                            mysqli_stmt_bind_param($stmt, "ss",$fileNameNew,$_POST['order_id']);
                            mysqli_stmt_execute($stmt);
                        }else{
                            $sql = "INSERT INTO order_image_gallery (image_url) VALUES (?)";
                            $stmt = mysqli_prepare($conn, $sql);
                            mysqli_stmt_bind_param($stmt, "s",$fileNameNew);
                            mysqli_stmt_execute($stmt);
                        }
                    } catch (mysqli_sql_exception $e) {
                        echo "Error: " . $e->getMessage();
                    }
                        //echo "Image uploaded successfully!";
                        echo json_encode(['status'=>'success','image_url'=>$fileNameNew]);
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "Your file is too large!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
} else {
    echo "No file uploaded.";
}
?>