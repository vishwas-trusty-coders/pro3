<?php
/** Load Essentials & Database */
require_once(__DIR__ . '/../config/app.php');
require_once($db_url);
$errorMessage="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $sql = "SELECT * FROM users where email='".$_POST['email']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($_POST['password'], $row['password'])) {
                header("Location: /src/orders/index.php");
            } 
            $errorMessage="Login credentials not found.";
        }else{
            $errorMessage="Login credentials not found.";
        }
    }
}
/** Theme Header */
require_once(__DIR__ . '/../theme/header.php');
?>
<style>
    body {
    height: 100vh;
    background: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<div class="d-flex justify-content-center align-items-center w-100">


<div class="row w-100" >
    <div class="col-sm-10 offset-sm-1 col-xs-10 offset-xs-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <?php if(!empty($errorMessage)){ ?>     <div class="alert alert-danger my-4"> <?php echo $errorMessage; ?></div>    <?php } ?>
        <form method="POST" action="">
            <div class="form-group mt-2">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group my-2">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</div>
<?php
//$2y$10$8IFXpLucp7xK42DrNvYsIukOcBBGnWyuU/AONBhz1.xiwBik.uQ.i
//$password = "mypass@1212";
//$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Uses the strongest available algorithm (currently bcrypt)
//echo $hashedPassword;
require_once(__DIR__ . '/../theme/footer.php');
?>