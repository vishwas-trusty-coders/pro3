<?php
/** Load Essentials & Database */
require_once(__DIR__ . '/../../config/app.php');
require_once($db_url);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $order_id   = mysqli_real_escape_string($conn, $_POST['order_id']);
    $email      = mysqli_real_escape_string($conn, $_POST['email']);
    $order_name = mysqli_real_escape_string($conn, $_POST['name']);
    $notes      = mysqli_real_escape_string($conn, $_POST['notes']);
    $team       = mysqli_real_escape_string($conn, $_POST['team']);
    if(!empty($_POST['date'])){
        $created_at = mysqli_real_escape_string($conn, $_POST['date']);
    }else{
        $created_at = date('Y-m-d H:i:s');
    }

    // Prepare the INSERT statement
    $stmt = $conn->prepare("INSERT INTO orders (order_id, email, order_name, notes, team, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $order_id, $email, $order_name, $notes, $team, $created_at); // Assuming string values, adjust types as needed
    // Execute the statement
    $stmt->execute();
    $last_id = $conn->insert_id;
    mysqli_stmt_close($stmt);

    // Prepare the INSERT statement
    $stmt = $conn->prepare("UPDATE order_image_gallery SET order_id = ? WHERE order_id IS NULL");
    $stmt->bind_param("s", $last_id); // Assuming string values, adjust types as needed
    // Execute the statement
    $stmt->execute();
    mysqli_stmt_close($stmt);

    if (!empty($_POST['name1']) && !empty($_POST['product1']) && !empty($_POST['size1'])) {
        $itemNumber1 = mysqli_real_escape_string($conn, $_POST['item_number1']);
        $name1 = mysqli_real_escape_string($conn, $_POST['name1']);
        $size1 = mysqli_real_escape_string($conn, $_POST['size1']);
        $product1 = mysqli_real_escape_string($conn, $_POST['product1']);
        if(!empty($_POST['color1'])){
            $color1 = mysqli_real_escape_string($conn, $_POST['color1']);
        }else{
            $color1 = null;
        }
        if(!empty($_POST['design1'])){
            $design1 = mysqli_real_escape_string($conn, $_POST['design1']);
        }else{
            $design1 = 0;
        }
        if(!empty($_POST['in_stock1'])){
            $in_stock1 = mysqli_real_escape_string($conn, $_POST['in_stock1']);
        }else{
            $in_stock1 = 0;
        }
        if(!empty($_POST['notes1'])){
            $notes1 = mysqli_real_escape_string($conn, $_POST['notes1']);
        }else{
            $notes1 = "";
        }
        if(!empty($_POST['progress1'])){
            $progress1 = mysqli_real_escape_string($conn, $_POST['progress1']);
        }else{
            $progress1 = 'inventory';
        }

        // Prepare the INSERT statement
        $stmt = $conn->prepare("INSERT INTO order_items (item_number,order_id, name, size, product, color, design, in_stock, notes, status) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $itemNumber1, $last_id, $name1, $size1, $product1, $color1, $design1, $in_stock1, $notes1,$progress1); // Assuming string values, adjust types as needed
        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    }





    if (!empty($_POST['name2']) && !empty($_POST['product2']) && !empty($_POST['size2'])) {
        $itemNumber2 = mysqli_real_escape_string($conn, $_POST['item_number2']);
        $name2 = mysqli_real_escape_string($conn, $_POST['name2']);
        $size2 = mysqli_real_escape_string($conn, $_POST['size2']);
        $product2 = mysqli_real_escape_string($conn, $_POST['product2']);
        if(!empty($_POST['color2'])){
            $color2 = mysqli_real_escape_string($conn, $_POST['color2']);
        }else{
            $color2 = null;
        }
        if(!empty($_POST['design2'])){
            $design2 = mysqli_real_escape_string($conn, $_POST['design2']);
        }else{
            $design2 = 0;
        }
        if(!empty($_POST['in_stock2'])){
            $in_stock2 = mysqli_real_escape_string($conn, $_POST['in_stock2']);
        }else{
            $in_stock2 = 0;
        }
        if(!empty($_POST['notes2'])){
            $notes2 = mysqli_real_escape_string($conn, $_POST['notes2']);
        }else{
            $notes2 = "";
        }
        if(!empty($_POST['progress2'])){
            $progress2 = mysqli_real_escape_string($conn, $_POST['progress2']);
        }else{
            $progress2 = 'inventory';
        }

        // Prepare the INSERT statement
        $stmt = $conn->prepare("INSERT INTO order_items (item_number,order_id, name, size, product, color, design, in_stock, notes, status) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $itemNumber2, $last_id, $name2, $size2, $product2, $color2, $design2, $in_stock2, $notes2,$progress2); // Assuming string values, adjust types as needed
        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    }





    if (!empty($_POST['name3']) && !empty($_POST['product3']) && !empty($_POST['size3'])) {
        $itemNumber3 = mysqli_real_escape_string($conn, $_POST['item_number3']);
        $name3 = mysqli_real_escape_string($conn, $_POST['name3']);
        $size3 = mysqli_real_escape_string($conn, $_POST['size3']);
        $product3 = mysqli_real_escape_string($conn, $_POST['product3']);
        if(!empty($_POST['color3'])){
            $color3 = mysqli_real_escape_string($conn, $_POST['color3']);
        }else{
            $color3 = null;
        }
        if(!empty($_POST['design3'])){
            $design3 = mysqli_real_escape_string($conn, $_POST['design3']);
        }else{
            $design3 = 0;
        }
        if(!empty($_POST['in_stock3'])){
            $in_stock3 = mysqli_real_escape_string($conn, $_POST['in_stock3']);
        }else{
            $in_stock3 = 0;
        }
        if(!empty($_POST['notes3'])){
            $notes3 = mysqli_real_escape_string($conn, $_POST['notes3']);
        }else{
            $notes3 = "";
        }
        if(!empty($_POST['progress3'])){
            $progress3 = mysqli_real_escape_string($conn, $_POST['progress3']);
        }else{
            $progress3 = 'inventory';
        }

        // Prepare the INSERT statement
        $stmt = $conn->prepare("INSERT INTO order_items (item_number,order_id, name, size, product, color, design, in_stock, notes, status) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $itemNumber3, $last_id, $name3, $size3, $product3, $color3, $design3, $in_stock3, $notes3,$progress3); // Assuming string values, adjust types as needed
        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    }




    if (!empty($_POST['name4']) && !empty($_POST['product4']) && !empty($_POST['size4'])) {
        $itemNumber4 = mysqli_real_escape_string($conn, $_POST['item_number4']);
        $name4 = mysqli_real_escape_string($conn, $_POST['name4']);
        $size4 = mysqli_real_escape_string($conn, $_POST['size4']);
        $product4 = mysqli_real_escape_string($conn, $_POST['product4']);
        if(!empty($_POST['color4'])){
            $color4 = mysqli_real_escape_string($conn, $_POST['color4']);
        }else{
            $color4 = null;
        }
        if(!empty($_POST['design4'])){
            $design4 = mysqli_real_escape_string($conn, $_POST['design4']);
        }else{
            $design4 = 0;
        }
        if(!empty($_POST['in_stock4'])){
            $in_stock4 = mysqli_real_escape_string($conn, $_POST['in_stock4']);
        }else{
            $in_stock4 = 0;
        }
        if(!empty($_POST['notes4'])){
            $notes4 = mysqli_real_escape_string($conn, $_POST['notes4']);
        }else{
            $notes4 = "";
        }
        if(!empty($_POST['progress4'])){
            $progress4 = mysqli_real_escape_string($conn, $_POST['progress4']);
        }else{
            $progress4 = 'inventory';
        }

        // Prepare the INSERT statement
        $stmt = $conn->prepare("INSERT INTO order_items (item_number,order_id, name, size, product, color, design, in_stock, notes, status) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $itemNumber4, $last_id, $name4, $size4, $product4, $color4, $design4, $in_stock4, $notes4,$progress4); // Assuming string values, adjust types as needed
        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    }




    if (!empty($_POST['name5']) && !empty($_POST['product5']) && !empty($_POST['size5'])) {
        $itemNumber5 = mysqli_real_escape_string($conn, $_POST['item_number5']);
        $name5 = mysqli_real_escape_string($conn, $_POST['name5']);
        $size5 = mysqli_real_escape_string($conn, $_POST['size5']);
        $product5 = mysqli_real_escape_string($conn, $_POST['product5']);
        if(!empty($_POST['color5'])){
            $color5 = mysqli_real_escape_string($conn, $_POST['color5']);
        }else{
            $color5 = null;
        }
        if(!empty($_POST['design5'])){
            $design5 = mysqli_real_escape_string($conn, $_POST['design5']);
        }else{
            $design5 = 0;
        }
        if(!empty($_POST['in_stock5'])){
            $in_stock5 = mysqli_real_escape_string($conn, $_POST['in_stock5']);
        }else{
            $in_stock5 = 0;
        }
        if(!empty($_POST['notes5'])){
            $notes5 = mysqli_real_escape_string($conn, $_POST['notes5']);
        }else{
            $notes5 = "";
        }
        if(!empty($_POST['progress5'])){
            $progress5 = mysqli_real_escape_string($conn, $_POST['progress5']);
        }else{
            $progress5 = 'inventory';
        }

        // Prepare the INSERT statement
        $stmt = $conn->prepare("INSERT INTO order_items (item_number,order_id, name, size, product, color, design, in_stock, notes, status) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $itemNumber5, $last_id, $name5, $size5, $product5, $color5, $design5, $in_stock5, $notes5,$progress5); // Assuming string values, adjust types as needed
        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    }





    if (!empty($_POST['name6']) && !empty($_POST['product6']) && !empty($_POST['size6'])) {
        $itemNumber6 = mysqli_real_escape_string($conn, $_POST['item_number6']);
        $name6 = mysqli_real_escape_string($conn, $_POST['name6']);
        $size6 = mysqli_real_escape_string($conn, $_POST['size6']);
        $product6 = mysqli_real_escape_string($conn, $_POST['product6']);
        if(!empty($_POST['color6'])){
            $color6 = mysqli_real_escape_string($conn, $_POST['color6']);
        }else{
            $color6 = null;
        }
        if(!empty($_POST['design6'])){
            $design6 = mysqli_real_escape_string($conn, $_POST['design6']);
        }else{
            $design6 = 0;
        }
        if(!empty($_POST['in_stock6'])){
            $in_stock6 = mysqli_real_escape_string($conn, $_POST['in_stock6']);
        }else{
            $in_stock6 = 0;
        }
        if(!empty($_POST['notes6'])){
            $notes6 = mysqli_real_escape_string($conn, $_POST['notes6']);
        }else{
            $notes6 = "";
        }
        if(!empty($_POST['progress6'])){
            $progress6 = mysqli_real_escape_string($conn, $_POST['progress6']);
        }else{
            $progress6 = 'inventory';
        }

        // Prepare the INSERT statement
        $stmt = $conn->prepare("INSERT INTO order_items (item_number,order_id, name, size, product, color, design, in_stock, notes, status) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $itemNumber6, $last_id, $name6, $size6, $product6, $color6, $design6, $in_stock6, $notes6,$progress6); // Assuming string values, adjust types as needed
        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    }





    if (!empty($_POST['name7']) && !empty($_POST['product7']) && !empty($_POST['size7'])) {
        $itemNumber7 = mysqli_real_escape_string($conn, $_POST['item_number7']);
        $name7 = mysqli_real_escape_string($conn, $_POST['name7']);
        $size7 = mysqli_real_escape_string($conn, $_POST['size7']);
        $product7 = mysqli_real_escape_string($conn, $_POST['product7']);
        if(!empty($_POST['color7'])){
            $color7 = mysqli_real_escape_string($conn, $_POST['color7']);
        }else{
            $color7 = null;
        }
        if(!empty($_POST['design7'])){
            $design7 = mysqli_real_escape_string($conn, $_POST['design7']);
        }else{
            $design7 = 0;
        }
        if(!empty($_POST['in_stock7'])){
            $in_stock7 = mysqli_real_escape_string($conn, $_POST['in_stock7']);
        }else{
            $in_stock7 = 0;
        }
        if(!empty($_POST['notes7'])){
            $notes7 = mysqli_real_escape_string($conn, $_POST['notes7']);
        }else{
            $notes7 = "";
        }
        if(!empty($_POST['progress7'])){
            $progress7 = mysqli_real_escape_string($conn, $_POST['progress7']);
        }else{
            $progress7 = 'inventory';
        }

        // Prepare the INSERT statement
        $stmt = $conn->prepare("INSERT INTO order_items (item_number,order_id, name, size, product, color, design, in_stock, notes, status) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $itemNumber7, $last_id, $name7, $size7, $product7, $color7, $design7, $in_stock7, $notes7,$progress7); // Assuming string values, adjust types as needed
        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    }





    if (!empty($_POST['name8']) && !empty($_POST['product8']) && !empty($_POST['size8'])) {
        $itemNumber8 = mysqli_real_escape_string($conn, $_POST['item_number8']);
        $name8 = mysqli_real_escape_string($conn, $_POST['name8']);
        $size8 = mysqli_real_escape_string($conn, $_POST['size8']);
        $product8 = mysqli_real_escape_string($conn, $_POST['product8']);
        if(!empty($_POST['color8'])){
            $color8 = mysqli_real_escape_string($conn, $_POST['color8']);
        }else{
            $color8 = null;
        }
        if(!empty($_POST['design8'])){
            $design8 = mysqli_real_escape_string($conn, $_POST['design8']);
        }else{
            $design8 = 0;
        }
        if(!empty($_POST['in_stock8'])){
            $in_stock8 = mysqli_real_escape_string($conn, $_POST['in_stock8']);
        }else{
            $in_stock8 = 0;
        }
        if(!empty($_POST['notes8'])){
            $notes8 = mysqli_real_escape_string($conn, $_POST['notes8']);
        }else{
            $notes8 = "";
        }
        if(!empty($_POST['progress8'])){
            $progress8 = mysqli_real_escape_string($conn, $_POST['progress8']);
        }else{
            $progress8 = 'inventory';
        }

        // Prepare the INSERT statement
        $stmt = $conn->prepare("INSERT INTO order_items (item_number,order_id, name, size, product, color, design, in_stock, notes, status) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $itemNumber8, $last_id, $name8, $size8, $product8, $color8, $design8, $in_stock8, $notes8,$progress8); // Assuming string values, adjust types as needed
        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    }





    if (!empty($_POST['name9']) && !empty($_POST['product9']) && !empty($_POST['size9'])) {
        $itemNumber9 = mysqli_real_escape_string($conn, $_POST['item_number9']);
        $name9 = mysqli_real_escape_string($conn, $_POST['name9']);
        $size9 = mysqli_real_escape_string($conn, $_POST['size9']);
        $product9 = mysqli_real_escape_string($conn, $_POST['product9']);
        if(!empty($_POST['color9'])){
            $color9 = mysqli_real_escape_string($conn, $_POST['color9']);
        }else{
            $color9 = null;
        }
        if(!empty($_POST['design9'])){
            $design9 = mysqli_real_escape_string($conn, $_POST['design9']);
        }else{
            $design9 = 0;
        }
        if(!empty($_POST['in_stock9'])){
            $in_stock9 = mysqli_real_escape_string($conn, $_POST['in_stock9']);
        }else{
            $in_stock9 = 0;
        }
        if(!empty($_POST['notes9'])){
            $notes9 = mysqli_real_escape_string($conn, $_POST['notes9']);
        }else{
            $notes9 = "";
        }
        if(!empty($_POST['progress9'])){
            $progress9 = mysqli_real_escape_string($conn, $_POST['progress9']);
        }else{
            $progress9 = 'inventory';
        }

        // Prepare the INSERT statement
        $stmt = $conn->prepare("INSERT INTO order_items (item_number,order_id, name, size, product, color, design, in_stock, notes, status) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $itemNumber9, $last_id, $name9, $size9, $product9, $color9, $design9, $in_stock9, $notes9,$progress9); // Assuming string values, adjust types as needed
        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    }





    if (!empty($_POST['name10']) && !empty($_POST['product10']) && !empty($_POST['size10'])) {
        $itemNumber10 = mysqli_real_escape_string($conn, $_POST['item_number10']);
        $name10 = mysqli_real_escape_string($conn, $_POST['name10']);
        $size10 = mysqli_real_escape_string($conn, $_POST['size10']);
        $product10 = mysqli_real_escape_string($conn, $_POST['product10']);
        if(!empty($_POST['color10'])){
            $color10 = mysqli_real_escape_string($conn, $_POST['color10']);
        }else{
            $color10 = null;
        }
        if(!empty($_POST['design10'])){
            $design10 = mysqli_real_escape_string($conn, $_POST['design10']);
        }else{
            $design10 = 0;
        }
        if(!empty($_POST['in_stock10'])){
            $in_stock10 = mysqli_real_escape_string($conn, $_POST['in_stock10']);
        }else{
            $in_stock10 = 0;
        }
        if(!empty($_POST['notes10'])){
            $notes10 = mysqli_real_escape_string($conn, $_POST['notes10']);
        }else{
            $notes10 = "";
        }
        if(!empty($_POST['progress10'])){
            $progress10 = mysqli_real_escape_string($conn, $_POST['progress10']);
        }else{
            $progress10 = 'inventory';
        }

        // Prepare the INSERT statement
        $stmt = $conn->prepare("INSERT INTO order_items (item_number,order_id, name, size, product, color, design, in_stock, notes, status) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $itemNumber10, $last_id, $name10, $size10, $product10, $color10, $design10, $in_stock10, $notes10,$progress10); // Assuming string values, adjust types as needed
        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    }
    header("Location: /src/orders/index.php");
}
require_once(__DIR__ . '/../../theme/header.php');
?>
<script>
    var i = 1;
</script>

<div class="open-main-custom opem-mn">
     <h2>New Order</h2>
<form method="POST" action="">
    <div class="row new-main-order">
        <div class="col-lg-4 p-5 col-sm-6">
            <div class="col-12">
                <div>
                    <label for="order_id" class="form-label">Order Id</label>
                    <input type="text" class="form-control" name="order_id" id="order_id"  required>
                </div>
            </div>
            <div class="col-12">
                <div>
                    <label for="date" class="form-label">Order Date</label>
                    <input type="date" class="form-control" name="date" id="date"  required>
                </div>
            </div>
            <div class="col-12">
                <div>
                    <label for="email" class="form-label">Order Name</label>
                    <input type="text" class="form-control" name="name" id="name"  required>
                </div>
            </div>
            <div class="col-12">
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" >
                </div>
            </div>
            <div class="col-12">
                <div>
                    <label for="team" class="form-label">Team</label>
                    <input type="text" class="form-control" name="team" id="team" >
                </div>
            </div>
            <div class="col-12">
                <div>
                    <label for="team" class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" cols="15" rows="8"></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-sm-6 pt-5 upload-main-cst" style="margin-top: 100px;">
        <input type="file" id="imageInput" name="image" accept="image/*">
            <button type="button" id="uploadButton">Upload Image</button>
        <div class="inner-ss" style="margin-top: 100px;">
            <table class="table-main-close">
                <tr>
                    <?php
                    $sql = "SELECT * FROM order_image_gallery where order_id is null";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<td><image src='/public/uploads/" . $row["image_url"] . "' style='height:125px; width:125px; margin-right:20px;'/><br><a href='#' class='btn btn-sm btn-danger mt-2 mb-2'>Delete</a></td>";
                        }
                    }
                    ?>
                     <td><div id="images-area"></div></td>
                </tr>
            </table>
            
        </div>
    </div>
    <table class="table table-main-custom" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Size</th>
                <th scope="col">Product</th>
                <th scope="col">Color</th>
                <th scope="col">Design</th>
                <th scope="col">In Stock</th>
                <th scope="col">Notes</th>
                <th scope="col">Progress</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr id="row-1">
                <th scope="row"><input type="text" class="form-control" name="item_number1" id="item_number1" placeholder="Enter Number"></th>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name1" id="name" placeholder="Enter name" required>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="size1" id="size">
                            <option value="">Select Size</option>
                            <option>Y-XS</option>
                            <option>Y-S</option>
                            <option>Y-M</option>
                            <option>Y-L</option>
                            <option>Y-XL</option>
                            
                            <option>XS</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>2XL</option>
                            <option>3XL</option>
                            <option>4XL</option>
                            
                            <option>W-XS</option>
                            <option>W-S</option>
                            <option>W-M</option>
                            <option>W-L</option>
                            <option>W-XL</option>
                            <option>W-2XL</option>
                            <option>W-3XL</option>
                            <option>W-4XL</option>

                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="product1" id="product">
                            <option value="">Select Product</option>
                            <option value="hoodie">Hoodie</option>
                            <option value="t-shirt">T-shirt</option>
                            <option value="trouser">Trouser</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                         <select class="form-control" name="color1" id="color">
                            <option value="">Select Color</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                            <option value="orange">Orange</option>
                            <option value="lemon">Lemon</option>
                            <option value="pink">Pink</option>
                            <option value="black">Black</option>
                            <option value="peach">Peach</option>
                            <option value="brown">Brown</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="design1" id="design">
                            <option value="">Select Design</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="checkbox" name="in_stock1" value="1">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <textarea class="form-control" name="notes1" id="notes"></textarea>
                    </div>
                </td>
                <td>
                    <div id="rating-container1" onclick="setProcess(1)"></div> 
                    <input type="hidden" name="progress1" id="progress1" />
            </td>
                <td>
                </td>
            </tr>
            <tr id="row-2">
                <th scope="row"><input type="text" class="form-control" name="item_number2" id="item_number2" placeholder="Enter Number"></th>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name2" id="name" placeholder="Enter name">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="size2" id="size2">
                            <option value="">Select Size</option>
                            <option>Y-XS</option>
                            <option>Y-S</option>
                            <option>Y-M</option>
                            <option>Y-L</option>
                            <option>Y-XL</option>
                            
                            <option>XS</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>2XL</option>
                            <option>3XL</option>
                            <option>4XL</option>
                            
                            <option>W-XS</option>
                            <option>W-S</option>
                            <option>W-M</option>
                            <option>W-L</option>
                            <option>W-XL</option>
                            <option>W-2XL</option>
                            <option>W-3XL</option>
                            <option>W-4XL</option>

                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="product2" id="product">
                            <option value="">Select Product</option>
                            <option value="hoodie">Hoodie</option>
                            <option value="t-shirt">T-shirt</option>
                            <option value="trouser">Trouser</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="color2" id="color">
                            <option value="">Select Color</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                            <option value="orange">Orange</option>
                            <option value="lemon">Lemon</option>
                            <option value="pink">Pink</option>
                            <option value="black">Black</option>
                            <option value="peach">Peach</option>
                            <option value="brown">Brown</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="design2" id="design">
                            <option value="">Select Design</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="checkbox" name="in_stock2" value="1">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        
                        <textarea class="form-control" name="notes2" id="notes"></textarea>
                    </div>
                </td>
                <td>
                   <div id="rating-container2" onclick="setProcess(2)"></div> 
                   <input type="hidden" name="progress2" id="progress2" />
            </td>
                <td>
                    <a href="javascript:void(0)"  onclick="removeRow(2)"><img src="/public/img/del-icon.png" class="del-icon"/></a>
                </td>
            </tr>
            <tr id="row-3">
                <th scope="row"><input type="text" class="form-control" name="item_number3" id="item_number3" placeholder="Enter Number"></th>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name3" id="name" placeholder="Enter name">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="size3" id="size">
                            <option value="">Select Size</option>
                            <option>Y-XS</option>
                            <option>Y-S</option>
                            <option>Y-M</option>
                            <option>Y-L</option>
                            <option>Y-XL</option>
                            
                            <option>XS</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>2XL</option>
                            <option>3XL</option>
                            <option>4XL</option>
                            
                            <option>W-XS</option>
                            <option>W-S</option>
                            <option>W-M</option>
                            <option>W-L</option>
                            <option>W-XL</option>
                            <option>W-2XL</option>
                            <option>W-3XL</option>
                            <option>W-4XL</option>

                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="product3" id="product">
                            <option value="">Select Product</option>
                            <option value="hoodie">Hoodie</option>
                            <option value="t-shirt">T-shirt</option>
                            <option value="trouser">Trouser</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="color3" id="color">
                            <option value="">Select Color</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                            <option value="orange">Orange</option>
                            <option value="lemon">Lemon</option>
                            <option value="pink">Pink</option>
                            <option value="black">Black</option>
                            <option value="peach">Peach</option>
                            <option value="brown">Brown</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="design3" id="design">
                            <option value="">Select Design</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="checkbox" name="in_stock3">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        
                        <textarea class="form-control" name="notes3" id="notes"></textarea>
                    </div>
                </td>
                <td>
                    <div id="rating-container3" onclick="setProcess(3)"></div> 
                   <input type="hidden" name="progress3" id="progress3" />
            </td>
                <td>
                    <a href="javascript:void(0)"  onclick="removeRow(3)"><img src="/public/img/del-icon.png" class="del-icon"/></a>
                </td>
            </tr>
            <tr id="row-4">
                <th scope="row"><input type="text" class="form-control" name="item_number4" id="item_number4" placeholder="Enter Number"></th>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name4" id="name" placeholder="Enter name">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="size4" id="size">
                            <option value="">Select Size</option>
                            <option>Y-XS</option>
                            <option>Y-S</option>
                            <option>Y-M</option>
                            <option>Y-L</option>
                            <option>Y-XL</option>
                            
                            <option>XS</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>2XL</option>
                            <option>3XL</option>
                            <option>4XL</option>
                            
                            <option>W-XS</option>
                            <option>W-S</option>
                            <option>W-M</option>
                            <option>W-L</option>
                            <option>W-XL</option>
                            <option>W-2XL</option>
                            <option>W-3XL</option>
                            <option>W-4XL</option>

                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="product4" id="product">
                            <option value="">Select Product</option>
                            <option value="hoodie">Hoodie</option>
                            <option value="t-shirt">T-shirt</option>
                            <option value="trouser">Trouser</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="color4" id="color">
                            <option value="">Select Color</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                            <option value="orange">Orange</option>
                            <option value="lemon">Lemon</option>
                            <option value="pink">Pink</option>
                            <option value="black">Black</option>
                            <option value="peach">Peach</option>
                            <option value="brown">Brown</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="design4" id="design">
                            <option value="">Select Design</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="checkbox" name="in_stock4">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        
                        <textarea class="form-control" name="notes4" id="notes"></textarea>
                    </div>
                </td>
                <td>
                    <div id="rating-container4" onclick="setProcess(4)"></div> 
                    <input type="hidden" name="progress4" id="progress4" />
            </td>
                <td>
                    <a href="javascript:void(0)"  onclick="removeRow(4)"><img src="/public/img/del-icon.png" class="del-icon"/></a>
                </td>
            </tr>
            <tr id="row-5">
                <th scope="row"><input type="text" class="form-control" name="item_number5" id="item_number5" placeholder="Enter Number"></th>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name5" id="name" placeholder="Enter name">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="size5" id="size">
                            <option value="">Select Size</option>
                            <option>Y-XS</option>
                            <option>Y-S</option>
                            <option>Y-M</option>
                            <option>Y-L</option>
                            <option>Y-XL</option>
                            
                            <option>XS</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>2XL</option>
                            <option>3XL</option>
                            <option>4XL</option>
                            
                            <option>W-XS</option>
                            <option>W-S</option>
                            <option>W-M</option>
                            <option>W-L</option>
                            <option>W-XL</option>
                            <option>W-2XL</option>
                            <option>W-3XL</option>
                            <option>W-4XL</option>

                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="product5" id="product">
                            <option value="">Select Product</option>
                            <option value="hoodie">Hoodie</option>
                            <option value="t-shirt">T-shirt</option>
                            <option value="trouser">Trouser</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="color5" id="color">
                            <option value="">Select Color</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                            <option value="orange">Orange</option>
                            <option value="lemon">Lemon</option>
                            <option value="pink">Pink</option>
                            <option value="black">Black</option>
                            <option value="peach">Peach</option>
                            <option value="brown">Brown</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="design5" id="design">
                            <option value="">Select Design</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="checkbox" name="in_stock5">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        
                        <textarea class="form-control" name="notes5" id="notes"></textarea>
                    </div>
                </td>
                <td>
                    <div id="rating-container5" onclick="setProcess(5)"></div> 
                   <input type="hidden" name="progress5" id="progress5" />
            </td>
                <td>
                    <a href="javascript:void(0)"  onclick="removeRow(5)"><img src="/public/img/del-icon.png" class="del-icon"/></a>
                </td>
            </tr>
            <tr id="row-6">
                <th scope="row"><input type="text" class="form-control" name="item_number6" id="item_number6" placeholder="Enter Number"></th>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name6" id="name" placeholder="Enter name">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="size6" id="size">
                            <option value="">Select Size</option>
                            <option>Y-XS</option>
                            <option>Y-S</option>
                            <option>Y-M</option>
                            <option>Y-L</option>
                            <option>Y-XL</option>
                            
                            <option>XS</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>2XL</option>
                            <option>3XL</option>
                            <option>4XL</option>
                            
                            <option>W-XS</option>
                            <option>W-S</option>
                            <option>W-M</option>
                            <option>W-L</option>
                            <option>W-XL</option>
                            <option>W-2XL</option>
                            <option>W-3XL</option>
                            <option>W-4XL</option>

                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="product6" id="product">
                            <option value="">Select Product</option>
                            <option value="hoodie">Hoodie</option>
                            <option value="t-shirt">T-shirt</option>
                            <option value="trouser">Trouser</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="color6" id="color">
                            <option value="">Select Color</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                            <option value="orange">Orange</option>
                            <option value="lemon">Lemon</option>
                            <option value="pink">Pink</option>
                            <option value="black">Black</option>
                            <option value="peach">Peach</option>
                            <option value="brown">Brown</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="design6" id="design">
                            <option value="">Select Design</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="checkbox" name="in_stock6">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        
                        <textarea class="form-control" name="notes6" id="notes"></textarea>
                    </div>
                </td>
                <td>
                    <div id="rating-container6" onclick="setProcess(6)"></div> 
                   <input type="hidden" name="progress6" id="progress6" />
            </td>
                <td>
                    <a href="javascript:void(0)"  onclick="removeRow(6)"><img src="/public/img/del-icon.png" class="del-icon"/></a>
                </td>
            </tr>
            <tr id="row-7">
                <th scope="row"><input type="text" class="form-control" name="item_number7" id="item_number7" placeholder="Enter Number"></th>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name7" id="name" placeholder="Enter name">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="size7" id="size">
                            <option value="">Select Size</option>
                           <option>Y-XS</option>
                            <option>Y-S</option>
                            <option>Y-M</option>
                            <option>Y-L</option>
                            <option>Y-XL</option>
                            
                            <option>XS</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>2XL</option>
                            <option>3XL</option>
                            <option>4XL</option>
                            
                            <option>W-XS</option>
                            <option>W-S</option>
                            <option>W-M</option>
                            <option>W-L</option>
                            <option>W-XL</option>
                            <option>W-2XL</option>
                            <option>W-3XL</option>
                            <option>W-4XL</option>

                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="product7" id="product">
                            <option value="">Select Product</option>
                            <option value="hoodie">Hoodie</option>
                            <option value="t-shirt">T-shirt</option>
                            <option value="trouser">Trouser</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="color7" id="color">
                            <option value="">Select Color</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                            <option value="orange">Orange</option>
                            <option value="lemon">Lemon</option>
                            <option value="pink">Pink</option>
                            <option value="black">Black</option>
                            <option value="peach">Peach</option>
                            <option value="brown">Brown</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <select class="form-control" name="design7" id="design">
                            <option value="">Select Design</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="checkbox" name="in_stock7">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        
                        <textarea class="form-control" name="notes7" id="notes"></textarea>
                    </div>
                </td>
                <td>
                    <div id="rating-container7" onclick="setProcess(7)"></div> 
                   <input type="hidden" name="progress7" id="progress7" />
            </td>
                <td>
                    <a href="javascript:void(0)"  onclick="removeRow(7)"><img src="/public/img/del-icon.png" class="del-icon"/></a>
                </td>
            </tr>
            <tr id="row-8">
                <th scope="row"><input type="text" class="form-control" name="item_number8" id="item_number8" placeholder="Enter Number"></th>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name8" id="name" placeholder="Enter name">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                          <select class="form-control" name="size8" id="size">
                            <option value="">Select Size</option>
                            <option>Y-XS</option>
                            <option>Y-S</option>
                            <option>Y-M</option>
                            <option>Y-L</option>
                            <option>Y-XL</option>
                            
                            <option>XS</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>2XL</option>
                            <option>3XL</option>
                            <option>4XL</option>
                            
                            <option>W-XS</option>
                            <option>W-S</option>
                            <option>W-M</option>
                            <option>W-L</option>
                            <option>W-XL</option>
                            <option>W-2XL</option>
                            <option>W-3XL</option>
                            <option>W-4XL</option>

                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                         <select class="form-control" name="product8" id="product">
                            <option value="">Select Product</option>
                            <option value="hoodie">Hoodie</option>
                            <option value="t-shirt">T-shirt</option>
                            <option value="trouser">Trouser</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                         <select class="form-control" name="color8" id="color">
                            <option value="">Select Color</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                            <option value="orange">Orange</option>
                            <option value="lemon">Lemon</option>
                            <option value="pink">Pink</option>
                            <option value="black">Black</option>
                            <option value="peach">Peach</option>
                            <option value="brown">Brown</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        
                         <select class="form-control" name="design8" id="design">
                            <option value="">Select Design</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="checkbox" name="in_stock8">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        
                        <textarea class="form-control" name="notes8" id="notes"></textarea>
                    </div>
                </td>
                <td>
                    
                    <div id="rating-container8" onclick="setProcess(8)"></div> 
                   <input type="hidden" name="progress8" id="progress8" />
            </td>
                <td>
                    <a href="javascript:void(0)"  onclick="removeRow(8)"><img src="/public/img/del-icon.png" class="del-icon"/></a>
                </td>
            </tr>
            <tr id="row-9">
                <th scope="row"><input type="text" class="form-control" name="item_number9" id="item_number9" placeholder="Enter Number"></th>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name9" id="name" placeholder="Enter name">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                          <select class="form-control" name="size9" id="size">
                            <option value="">Select Size</option>
                            <option>Y-XS</option>
                            <option>Y-S</option>
                            <option>Y-M</option>
                            <option>Y-L</option>
                            <option>Y-XL</option>
                            
                            <option>XS</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>2XL</option>
                            <option>3XL</option>
                            <option>4XL</option>
                            
                            <option>W-XS</option>
                            <option>W-S</option>
                            <option>W-M</option>
                            <option>W-L</option>
                            <option>W-XL</option>
                            <option>W-2XL</option>
                            <option>W-3XL</option>
                            <option>W-4XL</option>

                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                         <select class="form-control" name="product9" id="product">
                            <option value="">Select Product</option>
                            <option value="hoodie">Hoodie</option>
                            <option value="t-shirt">T-shirt</option>
                            <option value="trouser">Trouser</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                         <select class="form-control" name="color9" id="color">
                            <option value="">Select Color</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                            <option value="orange">Orange</option>
                            <option value="lemon">Lemon</option>
                            <option value="pink">Pink</option>
                            <option value="black">Black</option>
                            <option value="peach">Peach</option>
                            <option value="brown">Brown</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        
                         <select class="form-control" name="design9" id="design">
                            <option value="">Select Design</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="checkbox" name="in_stock9">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        
                        <textarea class="form-control" name="notes9" id="notes"></textarea>
                    </div>
                </td>
                <td>
                    
                    <div id="rating-container9" onclick="setProcess(9)"></div> 
                   <input type="hidden" name="progress9" id="progress9" />
            </td>
                <td>
                    <a href="javascript:void(0)"  onclick="removeRow(9)"><img src="/public/img/del-icon.png" class="del-icon"/></a>
                </td>
            </tr>
            <tr id="row-10">
                <th scope="row"><input type="text" class="form-control" name="item_number10" id="item_number10" placeholder="Enter Number"></th>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name10" id="name" placeholder="Enter name">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                          <select class="form-control" name="size10" id="size">
                            <option value="">Select Size</option>
                            <option>Y-XS</option>
                            <option>Y-S</option>
                            <option>Y-M</option>
                            <option>Y-L</option>
                            <option>Y-XL</option>
                            
                            <option>XS</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>2XL</option>
                            <option>3XL</option>
                            <option>4XL</option>
                            
                            <option>W-XS</option>
                            <option>W-S</option>
                            <option>W-M</option>
                            <option>W-L</option>
                            <option>W-XL</option>
                            <option>W-2XL</option>
                            <option>W-3XL</option>
                            <option>W-4XL</option>

                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                         <select class="form-control" name="product10" id="product">
                            <option value="">Select Product</option>
                            <option value="hoodie">Hoodie</option>
                            <option value="t-shirt">T-shirt</option>
                            <option value="trouser">Trouser</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                         <select class="form-control" name="color10" id="color">
                            <option value="">Select Color</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="white">White</option>
                            <option value="orange">Orange</option>
                            <option value="lemon">Lemon</option>
                            <option value="pink">Pink</option>
                            <option value="black">Black</option>
                            <option value="peach">Peach</option>
                            <option value="brown">Brown</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        
                         <select class="form-control" name="design10" id="design">
                            <option value="">Select Design</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="checkbox" name="in_stock10">
                        
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        
                        <textarea class="form-control" name="notes10" id="notes"></textarea>
                    </div>
                </td>
                <td>
                    
                    <div id="rating-container10" onclick="setProcess(10)"></div> 
                   <input type="hidden" name="progress10" id="progress10" />
            </td>
                <td>
                    <a href="javascript:void(0)"  onclick="removeRow(10)"><img src="/public/img/del-icon.png" class="del-icon"/></a>
                </td>
            </tr>
            <tr>
                <td colspan="10"><a href="javascript:void(0)" id="add-button" class="btn btn-sm btn-success mr-2 ml-2 rounded-5"><i class="fas fa-1x fa-plus"></i>Add Row</a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="col-2 butn-process">
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" type="submit">Save</button>
        </div>
    </div>
</form>
</div>
<script>

    $(document).ready(function() {
        $("#row-2").hide();
        $("#row-3").hide();
        $("#row-4").hide();
        $("#row-5").hide();
        $("#row-6").hide();
        $("#row-7").hide();
        $("#row-8").hide();
        $("#row-9").hide();
        $("#row-10").hide();
    });
    $("#add-button").on('click', function() {
        if (i < 10) {
            i++;
            $("#row-" + i).show();
        }
    });
    function removeRow(id) {
        $("#row-" + id).hide();
        console.log(id);
        i = id - 1;
    }
    $(document).ready(function() {
        $('#uploadButton').on('click', function() {
            var file_data = $('#imageInput').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                url: 'https://production.3pro.ca/src/orders/upload.php',
                type: 'POST',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#response').html("image updated successfully");
                    var res=JSON.parse(response);
                    console.log(res.image_url);
                    //document.location.reload();
                    $('#images-area').append("<image src='/public/uploads/" + res.image_url +"' style='height:125px; width:125px; margin-right:20px;'/><br><a href='#' class='btn btn-sm btn-danger mt-2 mb-2'>Delete</a>");
                },
                error: function(xhr, status, error) {

                    console.error(xhr.responseText);
                }
            });
        });
    });

var val;

function displayRating(rating = 0, maxRating = 4, id=1) {
  const container = document.getElementById('rating-container'+id);
  container.innerHTML = ''; // Clear previous dots

  for (let i = 1; i <= maxRating; i++) {
    const dot = document.createElement('span');
    dot.classList.add('dot');
    dot.textContent = '•';
    dot.dataset.value = i; // Store dot rating value

    if (i <= rating) dot.classList.add('filled');
        // Add click event
        dot.addEventListener('click', function () {
        displayRating(i, maxRating, id); // Re-render with selected rating
        val=i;
    });

    container.appendChild(dot);
  }
}

// Initial display dots filed
displayRating(0,4,1);
displayRating(0,4,2);
displayRating(0,4,3);
displayRating(0,4,4);
displayRating(0,4,5);
displayRating(0,4,6);
displayRating(0,4,7);
displayRating(0,4,8);
displayRating(0,4,9);
displayRating(0,4,10);

function setProcess(id){
    
    var final_val='pending';
    if(val==1){
        final_val='pending';
    }
    if(val==2){
        final_val='print';
    }
    if(val==3){
        final_val='production';
    }
    if(val==4){
        final_val='completed';
    }
    document.getElementById('progress'+id).value=final_val;
}
</script>
<?php
    require_once(__DIR__ . '/../../theme/footer.php');
?>