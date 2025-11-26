<?php

/** Load Essentials & Database */
require_once(__DIR__ . '/../../config/app.php');
require_once($db_url);


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $order_id       = mysqli_real_escape_string($conn, $_POST['order_id']);
    $email          = mysqli_real_escape_string($conn, $_POST['email']);
    $order_name     = mysqli_real_escape_string($conn, $_POST['name']);
    $notes          = mysqli_real_escape_string($conn, $_POST['notes']);
    $team           = mysqli_real_escape_string($conn, $_POST['team']);
    $created_at     = mysqli_real_escape_string($conn, $_POST['date']);

    // Prepare the update statement
    $stmt = $conn->prepare("update orders set order_id=?, email=?, order_name=?, notes=?, team=?, created_at=? where id=?");
    $stmt->bind_param("sssssss", $order_id, $email, $order_name, $notes, $team, $created_at, $_GET['id']); // Assuming string values, adjust types as needed
    // Execute the statement
    $stmt->execute();
    if (!empty($_POST['name1']) && !empty($_POST['product1'])) {
        $item_number1 = mysqli_real_escape_string($conn, $_POST['item_number1']);
        $name1 = mysqli_real_escape_string($conn, $_POST['name1']);
        $size1 = mysqli_real_escape_string($conn, $_POST['size1']);
        $product1 = mysqli_real_escape_string($conn, $_POST['product1']);
        $color1 = mysqli_real_escape_string($conn, $_POST['color1']);
        $design1 = mysqli_real_escape_string($conn, $_POST['design1']);
        if (isset($_POST['in_stock1'])) {
            $in_stock1 = 1;
        } else {
            $in_stock1 = 0;
        }
        $notes1 = mysqli_real_escape_string($conn, $_POST['notes1']);
        $progress1 = mysqli_real_escape_string($conn, $_POST['progress1']);
        $prog='pending';
        if($progress1==1){
            $prog='pending';
        }
        if($progress1==2){
            $prog='print';
        }
        if($progress1==3){
            $prog='production';
        }
        if($progress1==4){
            $prog='completed';
        }
        if (!empty($_POST['item1_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item1_id']);
            // Prepare the Update statement
            $stmt = $conn->prepare("update order_items set order_id=?,name=?,size=?,product=?,color=?,design=?,in_stock=?,notes=?,status=?,item_number=? where id=?");
            $stmt->bind_param("sssssssssss", $_GET['id'], $name1, $size1, $product1, $color1, $design1, $in_stock1, $notes1, $prog,$item_number1, $id);
        } else {
            // Prepare the Insert statement
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, name, size, product, color, design, in_stock, notes,status) VALUES (?, ?, ?, ?, ?, ?,?,?,?");
            $stmt->bind_param("sssssssss", $_GET['id'], $name1, $size1, $product1, $color1, $design1, $in_stock1, $notes1, $prog);
        }

        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    } else {
        if (!empty($_POST['item1_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item1_id']);
            // die("delete * from order_items where id=?".$id);
            // Prepare the delete statement
            $stmt = $conn->prepare("delete from order_items where id=?");
            $stmt->bind_param("s", $id);
            // Execute the statement
            $stmt->execute();

            mysqli_stmt_close($stmt);
        }
    }



        if (!empty($_POST['name2']) && !empty($_POST['product2'])) {
        $item_number2 = mysqli_real_escape_string($conn, $_POST['item_number2']);
        $name2 = mysqli_real_escape_string($conn, $_POST['name2']);
        $size2 = mysqli_real_escape_string($conn, $_POST['size2']);
        $product2 = mysqli_real_escape_string($conn, $_POST['product2']);
        $color2 = mysqli_real_escape_string($conn, $_POST['color2']);
        $design2 = mysqli_real_escape_string($conn, $_POST['design2']);
        if (isset($_POST['in_stock2'])) {
            $in_stock2 = 1;
        } else {
            $in_stock2 = 0;
        }
        $notes2 = mysqli_real_escape_string($conn, $_POST['notes2']);
        $progress2 = mysqli_real_escape_string($conn, $_POST['progress2']);
        $prog='pending';
        if($progress2==1){
            $prog='pending';
        }
        if($progress2==2){
            $prog='print';
        }
        if($progress2==3){
            $prog='production';
        }
        if($progress2==4){
            $prog='completed';
        }
        if (!empty($_POST['item2_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item2_id']);
            // Prepare the Update statement
            $stmt = $conn->prepare("update order_items set order_id=?,name=?,size=?,product=?,color=?,design=?,in_stock=?,notes=?,status=?,item_number=? where id=?");
            $stmt->bind_param("sssssssssss", $_GET['id'], $name2, $size2, $product2, $color2, $design2, $in_stock2, $notes2, $prog,$item_number2, $id);
        } else {
            // Prepare the Insert statement
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, name, size, product, color, design, in_stock, notes,status) VALUES (?, ?, ?, ?, ?, ?,?,?,?");
            $stmt->bind_param("sssssssss", $_GET['id'], $name2, $size2, $product2, $color2, $design2, $in_stock2, $notes2, $prog);
        }

        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    } else {
        if (!empty($_POST['item2_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item2_id']);
            // die("delete * from order_items where id=?".$id);
            // Prepare the delete statement
            $stmt = $conn->prepare("delete from order_items where id=?");
            $stmt->bind_param("s", $id);
            // Execute the statement
            $stmt->execute();

            mysqli_stmt_close($stmt);
        }
    }




        if (!empty($_POST['name3']) && !empty($_POST['product3'])) {
        $item_number3 = mysqli_real_escape_string($conn, $_POST['item_number3']);
        $name3 = mysqli_real_escape_string($conn, $_POST['name3']);
        $size3 = mysqli_real_escape_string($conn, $_POST['size3']);
        $product3 = mysqli_real_escape_string($conn, $_POST['product3']);
        $color3 = mysqli_real_escape_string($conn, $_POST['color3']);
        $design3 = mysqli_real_escape_string($conn, $_POST['design3']);
        if (isset($_POST['in_stock3'])) {
            $in_stock3 = 1;
        } else {
            $in_stock3 = 0;
        }
        $notes3 = mysqli_real_escape_string($conn, $_POST['notes3']);
        $progress3 = mysqli_real_escape_string($conn, $_POST['progress3']);
        $prog='pending';
        if($progress3==1){
            $prog='pending';
        }
        if($progress3==2){
            $prog='print';
        }
        if($progress3==3){
            $prog='production';
        }
        if($progress3==4){
            $prog='completed';
        }
        if (!empty($_POST['item3_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item3_id']);
            // Prepare the Update statement
            $stmt = $conn->prepare("update order_items set order_id=?,name=?,size=?,product=?,color=?,design=?,in_stock=?,notes=?,status=?,item_number=? where id=?");
            $stmt->bind_param("sssssssssss", $_GET['id'], $name3, $size3, $product3, $color3, $design3, $in_stock3, $notes3, $prog,$item_number3, $id);
        } else {
            // Prepare the Insert statement
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, name, size, product, color, design, in_stock, notes,status) VALUES (?, ?, ?, ?, ?, ?,?,?,?");
            $stmt->bind_param("sssssssss", $_GET['id'], $name3, $size3, $product3, $color3, $design3, $in_stock3, $notes3, $prog);
        }

        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    } else {
        if (!empty($_POST['item3_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item3_id']);
            // die("delete * from order_items where id=?".$id);
            // Prepare the delete statement
            $stmt = $conn->prepare("delete from order_items where id=?");
            $stmt->bind_param("s", $id);
            // Execute the statement
            $stmt->execute();

            mysqli_stmt_close($stmt);
        }
    }




        if (!empty($_POST['name4']) && !empty($_POST['product4'])) {
        $item_number4 = mysqli_real_escape_string($conn, $_POST['item_number4']);
        $name4 = mysqli_real_escape_string($conn, $_POST['name4']);
        $size4 = mysqli_real_escape_string($conn, $_POST['size4']);
        $product4 = mysqli_real_escape_string($conn, $_POST['product4']);
        $color4 = mysqli_real_escape_string($conn, $_POST['color4']);
        $design4 = mysqli_real_escape_string($conn, $_POST['design4']);
        if (isset($_POST['in_stock4'])) {
            $in_stock4 = 1;
        } else {
            $in_stock4 = 0;
        }
        $notes4 = mysqli_real_escape_string($conn, $_POST['notes4']);
        $progress4 = mysqli_real_escape_string($conn, $_POST['progress4']);
        $prog='pending';
        if($progress4==1){
            $prog='pending';
        }
        if($progress4==2){
            $prog='print';
        }
        if($progress4==3){
            $prog='production';
        }
        if($progress4==4){
            $prog='completed';
        }
        if (!empty($_POST['item4_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item4_id']);
            // Prepare the Update statement
            $stmt = $conn->prepare("update order_items set order_id=?,name=?,size=?,product=?,color=?,design=?,in_stock=?,notes=?,status=?,item_number=? where id=?");
            $stmt->bind_param("sssssssssss", $_GET['id'], $name4, $size4, $product4, $color4, $design4, $in_stock4, $notes4, $prog,$item_number4, $id);
        } else {
            // Prepare the Insert statement
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, name, size, product, color, design, in_stock, notes,status) VALUES (?, ?, ?, ?, ?, ?,?,?,?");
            $stmt->bind_param("sssssssss", $_GET['id'], $name4, $size4, $product4, $color4, $design4, $in_stock4, $notes4, $prog);
        }

        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    } else {
        if (!empty($_POST['item4_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item4_id']);
            // die("delete * from order_items where id=?".$id);
            // Prepare the delete statement
            $stmt = $conn->prepare("delete from order_items where id=?");
            $stmt->bind_param("s", $id);
            // Execute the statement
            $stmt->execute();

            mysqli_stmt_close($stmt);
        }
    }




        if (!empty($_POST['name5']) && !empty($_POST['product5'])) {
        $item_number5 = mysqli_real_escape_string($conn, $_POST['item_number5']);
        $name5 = mysqli_real_escape_string($conn, $_POST['name5']);
        $size5 = mysqli_real_escape_string($conn, $_POST['size5']);
        $product5 = mysqli_real_escape_string($conn, $_POST['product5']);
        $color5 = mysqli_real_escape_string($conn, $_POST['color5']);
        $design5 = mysqli_real_escape_string($conn, $_POST['design5']);
        if (isset($_POST['in_stock5'])) {
            $in_stock5 = 1;
        } else {
            $in_stock5 = 0;
        }
        $notes5 = mysqli_real_escape_string($conn, $_POST['notes5']);
        $progress5 = mysqli_real_escape_string($conn, $_POST['progress5']);
        $prog='pending';
        if($progress5==1){
            $prog='pending';
        }
        if($progress5==2){
            $prog='print';
        }
        if($progress5==3){
            $prog='production';
        }
        if($progress5==4){
            $prog='completed';
        }
        if (!empty($_POST['item5_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item5_id']);
            // Prepare the Update statement
            $stmt = $conn->prepare("update order_items set order_id=?,name=?,size=?,product=?,color=?,design=?,in_stock=?,notes=?,status=?,item_number=? where id=?");
            $stmt->bind_param("sssssssssss", $_GET['id'], $name5, $size5, $product5, $color5, $design5, $in_stock5, $notes5, $prog,$item_number5, $id);
        } else {
            // Prepare the Insert statement
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, name, size, product, color, design, in_stock, notes,status) VALUES (?, ?, ?, ?, ?, ?,?,?,?");
            $stmt->bind_param("sssssssss", $_GET['id'], $name5, $size5, $product5, $color5, $design5, $in_stock5, $notes5, $prog);
        }

        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    } else {
        if (!empty($_POST['item5_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item5_id']);
            // die("delete * from order_items where id=?".$id);
            // Prepare the delete statement
            $stmt = $conn->prepare("delete from order_items where id=?");
            $stmt->bind_param("s", $id);
            // Execute the statement
            $stmt->execute();

            mysqli_stmt_close($stmt);
        }
    }



        if (!empty($_POST['name6']) && !empty($_POST['product6'])) {
        $item_number6 = mysqli_real_escape_string($conn, $_POST['item_number6']);
        $name6 = mysqli_real_escape_string($conn, $_POST['name6']);
        $size6 = mysqli_real_escape_string($conn, $_POST['size6']);
        $product6 = mysqli_real_escape_string($conn, $_POST['product6']);
        $color6 = mysqli_real_escape_string($conn, $_POST['color6']);
        $design6 = mysqli_real_escape_string($conn, $_POST['design6']);
        if (isset($_POST['in_stock6'])) {
            $in_stock6 = 1;
        } else {
            $in_stock6 = 0;
        }
        $notes6 = mysqli_real_escape_string($conn, $_POST['notes6']);
        $progress6 = mysqli_real_escape_string($conn, $_POST['progress6']);
        $prog='pending';
        if($progress6==1){
            $prog='pending';
        }
        if($progress6==2){
            $prog='print';
        }
        if($progress6==3){
            $prog='production';
        }
        if($progress6==4){
            $prog='completed';
        }
        if (!empty($_POST['item6_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item6_id']);
            // Prepare the Update statement
            $stmt = $conn->prepare("update order_items set order_id=?,name=?,size=?,product=?,color=?,design=?,in_stock=?,notes=?,status=?,item_number=? where id=?");
            $stmt->bind_param("sssssssssss", $_GET['id'], $name6, $size6, $product6, $color6, $design6, $in_stock6, $notes6, $prog,$item_number6, $id);
        } else {
            // Prepare the Insert statement
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, name, size, product, color, design, in_stock, notes,status) VALUES (?, ?, ?, ?, ?, ?,?,?,?");
            $stmt->bind_param("sssssssss", $_GET['id'], $name6, $size6, $product6, $color6, $design6, $in_stock6, $notes6, $prog);
        }

        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    } else {
        if (!empty($_POST['item6_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item6_id']);
            // die("delete * from order_items where id=?".$id);
            // Prepare the delete statement
            $stmt = $conn->prepare("delete from order_items where id=?");
            $stmt->bind_param("s", $id);
            // Execute the statement
            $stmt->execute();

            mysqli_stmt_close($stmt);
        }
    }




    if (!empty($_POST['name7']) && !empty($_POST['product7'])) {
        $item_number7 = mysqli_real_escape_string($conn, $_POST['item_number7']);
        $name7 = mysqli_real_escape_string($conn, $_POST['name7']);
        $size7 = mysqli_real_escape_string($conn, $_POST['size7']);
        $product7 = mysqli_real_escape_string($conn, $_POST['product7']);
        $color7 = mysqli_real_escape_string($conn, $_POST['color7']);
        $design7 = mysqli_real_escape_string($conn, $_POST['design7']);
        if (isset($_POST['in_stock7'])) {
            $in_stock7 = 1;
        } else {
            $in_stock7 = 0;
        }
        $notes7 = mysqli_real_escape_string($conn, $_POST['notes7']);
        $progress7 = mysqli_real_escape_string($conn, $_POST['progress7']);
        $prog='pending';
        if($progress7==1){
            $prog='pending';
        }
        if($progress7==2){
            $prog='print';
        }
        if($progress7==3){
            $prog='production';
        }
        if($progress7==4){
            $prog='completed';
        }
        if (!empty($_POST['item7_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item7_id']);
            // Prepare the Update statement
            $stmt = $conn->prepare("update order_items set order_id=?,name=?,size=?,product=?,color=?,design=?,in_stock=?,notes=?,status=?,item_number=? where id=?");
            $stmt->bind_param("sssssssssss", $_GET['id'], $name7, $size7, $product7, $color7, $design7, $in_stock7, $notes7, $prog,$item_number7, $id);
        } else {
            // Prepare the Insert statement
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, name, size, product, color, design, in_stock, notes,status) VALUES (?, ?, ?, ?, ?, ?,?,?,?");
            $stmt->bind_param("sssssssss", $_GET['id'], $name7, $size7, $product7, $color7, $design7, $in_stock7, $notes7, $prog);
        }

        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    } else {
        if (!empty($_POST['item7_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item7_id']);
            // die("delete * from order_items where id=?".$id);
            // Prepare the delete statement
            $stmt = $conn->prepare("delete from order_items where id=?");
            $stmt->bind_param("s", $id);
            // Execute the statement
            $stmt->execute();

            mysqli_stmt_close($stmt);
        }
    }




        if (!empty($_POST['name8']) && !empty($_POST['product8'])) {
        $item_number8 = mysqli_real_escape_string($conn, $_POST['item_number8']);
        $name8 = mysqli_real_escape_string($conn, $_POST['name8']);
        $size8 = mysqli_real_escape_string($conn, $_POST['size8']);
        $product8 = mysqli_real_escape_string($conn, $_POST['product8']);
        $color8 = mysqli_real_escape_string($conn, $_POST['color8']);
        $design8 = mysqli_real_escape_string($conn, $_POST['design8']);
        if (isset($_POST['in_stock8'])) {
            $in_stock8 = 1;
        } else {
            $in_stock8 = 0;
        }
        $notes8 = mysqli_real_escape_string($conn, $_POST['notes8']);
        $progress8 = mysqli_real_escape_string($conn, $_POST['progress8']);
        $prog='pending';
        if($progress8==1){
            $prog='pending';
        }
        if($progress8==2){
            $prog='print';
        }
        if($progress8==3){
            $prog='production';
        }
        if($progress8==4){
            $prog='completed';
        }
        if (!empty($_POST['item8_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item8_id']);
            // Prepare the Update statement
            $stmt = $conn->prepare("update order_items set order_id=?,name=?,size=?,product=?,color=?,design=?,in_stock=?,notes=?,status=?,item_number=? where id=?");
            $stmt->bind_param("sssssssssss", $_GET['id'], $name8, $size8, $product8, $color8, $design8, $in_stock8, $notes8, $prog,$item_number8, $id);
        } else {
            // Prepare the Insert statement
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, name, size, product, color, design, in_stock, notes,status) VALUES (?, ?, ?, ?, ?, ?,?,?,?");
            $stmt->bind_param("sssssssss", $_GET['id'], $name8, $size8, $product8, $color8, $design8, $in_stock8, $notes8, $prog);
        }

        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    } else {
        if (!empty($_POST['item8_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item8_id']);
            // die("delete * from order_items where id=?".$id);
            // Prepare the delete statement
            $stmt = $conn->prepare("delete from order_items where id=?");
            $stmt->bind_param("s", $id);
            // Execute the statement
            $stmt->execute();

            mysqli_stmt_close($stmt);
        }
    }





if (!empty($_POST['name9']) && !empty($_POST['product9'])) {
        $item_number9 = mysqli_real_escape_string($conn, $_POST['item_number9']);
        $name9 = mysqli_real_escape_string($conn, $_POST['name9']);
        $size9 = mysqli_real_escape_string($conn, $_POST['size9']);
        $product9 = mysqli_real_escape_string($conn, $_POST['product9']);
        $color9 = mysqli_real_escape_string($conn, $_POST['color9']);
        $design9 = mysqli_real_escape_string($conn, $_POST['design9']);
        if (isset($_POST['in_stock9'])) {
            $in_stock9 = 1;
        } else {
            $in_stock9 = 0;
        }
        $notes9 = mysqli_real_escape_string($conn, $_POST['notes9']);
        $progress9 = mysqli_real_escape_string($conn, $_POST['progress9']);
        $prog='pending';
        if($progress9==1){
            $prog='pending';
        }
        if($progress9==2){
            $prog='print';
        }
        if($progress9==3){
            $prog='production';
        }
        if($progress9==4){
            $prog='completed';
        }
        if (!empty($_POST['item9_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item9_id']);
            // Prepare the Update statement
            $stmt = $conn->prepare("update order_items set order_id=?,name=?,size=?,product=?,color=?,design=?,in_stock=?,notes=?,status=?,item_number=? where id=?");
            $stmt->bind_param("sssssssssss", $_GET['id'], $name9, $size9, $product9, $color9, $design9, $in_stock9, $notes9, $prog,$item_number9, $id);
        } else {
            // Prepare the Insert statement
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, name, size, product, color, design, in_stock, notes,status) VALUES (?, ?, ?, ?, ?, ?,?,?,?");
            $stmt->bind_param("sssssssss", $_GET['id'], $name9, $size9, $product9, $color9, $design9, $in_stock9, $notes9, $prog);
        }

        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    } else {
        if (!empty($_POST['item9_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item9_id']);
            // die("delete * from order_items where id=?".$id);
            // Prepare the delete statement
            $stmt = $conn->prepare("delete from order_items where id=?");
            $stmt->bind_param("s", $id);
            // Execute the statement
            $stmt->execute();

            mysqli_stmt_close($stmt);
        }
    }





    if (!empty($_POST['name10']) && !empty($_POST['product10'])) {
        $item_number10 = mysqli_real_escape_string($conn, $_POST['item_number10']);
        $name10 = mysqli_real_escape_string($conn, $_POST['name10']);
        $size10 = mysqli_real_escape_string($conn, $_POST['size10']);
        $product10 = mysqli_real_escape_string($conn, $_POST['product10']);
        $color10 = mysqli_real_escape_string($conn, $_POST['color10']);
        $design10 = mysqli_real_escape_string($conn, $_POST['design10']);
        if (isset($_POST['in_stock10'])) {
            $in_stock10 = 1;
        } else {
            $in_stock10 = 0;
        }
        $notes10 = mysqli_real_escape_string($conn, $_POST['notes10']);
        $progress10 = mysqli_real_escape_string($conn, $_POST['progress10']);
        $prog='pending';
        if($progress10==1){
            $prog='pending';
        }
        if($progress10==2){
            $prog='print';
        }
        if($progress10==3){
            $prog='production';
        }
        if($progress10==4){
            $prog='completed';
        }
        if (!empty($_POST['item10_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item10_id']);
            // Prepare the Update statement
            $stmt = $conn->prepare("update order_items set order_id=?,name=?,size=?,product=?,color=?,design=?,in_stock=?,notes=?,status=?,item_number=? where id=?");
            $stmt->bind_param("sssssssssss", $_GET['id'], $name10, $size10, $product10, $color10, $design10, $in_stock10, $notes10, $prog,$item_number10, $id);
        } else {
            // Prepare the Insert statement
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, name, size, product, color, design, in_stock, notes,status) VALUES (?, ?, ?, ?, ?, ?,?,?,?");
            $stmt->bind_param("sssssssss", $_GET['id'], $name10, $size10, $product10, $color10, $design10, $in_stock10, $notes10, $prog);
        }

        // Execute the statement
        $stmt->execute();
        mysqli_stmt_close($stmt);
    } else {
        if (!empty($_POST['item10_id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['item10_id']);
            // die("delete * from order_items where id=?".$id);
            // Prepare the delete statement
            $stmt = $conn->prepare("delete from order_items where id=?");
            $stmt->bind_param("s", $id);
            // Execute the statement
            $stmt->execute();

            mysqli_stmt_close($stmt);
        }
    }


    // header("Location: /src/orders/index.php");
    // header("Location: /src/orders/edit.php?id=".$_GET['id']);
    $success = "Data is updated successfully";
}

/** Theme Header */
require_once(__DIR__ . '/../../theme/header.php');
$sql = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET['id']); // "i" for integer
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the single row
    $row = $result->fetch_assoc();
} else {
    echo "<p>User not found.</p>";
}
?>
<script>
    var i = 1;
</script>
<?php if (isset($success)) {
    echo '<div class="success-message">' . $success . '</div>';
} else {
    $success = '';
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Load Custom Style-->
    <link rel="stylesheet" href="./../../public/css/style.css">
</head>

<body>

        <div class="row new-main-order">
            <div class="col-12">
                <div class="header">
                    <ul>
                        <li><a href="/src/orders/index.php" class="btn btn-sm btn-success mb-5">Back</a></li>
                        <?php if($row['status']!='completed') {?>
                        <li>
                            <form action="/src/orders/update.php" method="post">
                                <input type="hidden" name="order_id"  value="<?php echo $row['id']; ?>" />
                                <input type="submit" class="btn btn-warning mb-5" value="ARCHIVE ORDER">
                            </form>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>    
            <form method="POST" action="">
            <div class="col-lg-4 p-5 col-sm-6 left-order-mm">
                <div class="col-12">
                    <div>
                        <input type="text" class="form-control" name="order_id" id="order_id" placeholder="Enter order_id" required value="<?php if (!empty($row['order_id'])) { echo $row['order_id']; } ?>">
                        <label for="order_id" class="form-label">Order Id</label>
                    </div>
                </div>
                <div class="col-12">
                    <div>

                        <input type="date" class="form-control" name="date" id="date" placeholder="Enter date" required value="<?php if (!empty($row['created_at'])) {
                                                                                                                                    echo  date('Y-m-d', strtotime($row['created_at']));
                                                                                                                                } ?>">
                        <label for="date" class="form-label">Order Date</label>
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required value="<?php if (!empty($row['order_name'])) {
                                                                                                                                    echo $row['order_name'];
                                                                                                                                } ?>">
                        <label for="name" class="form-label">Name</label>
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?php if (!empty($row['email'])) {
                                                                                                                                echo $row['email'];
                                                                                                                            } ?>">
                        <label for="email" class="form-label">Email</label>
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <input type="text" class="form-control" name="team" id="team" placeholder="Enter team" value="<?php if (!empty($row['team'])) {
                                                                                                                            echo $row['team'];
                                                                                                                        } ?>">
                        <label for="team" class="form-label">Team</label>
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <textarea class="form-control" name="notes" cols="15" rows="8"> <?php if (!empty($row['notes'])) {
                                                                                            echo $row['notes'];
                                                                                        } ?></textarea>
                        <label for="team" class="form-label">Notes</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-6 pt-5 upload-main-cst" style="margin-top: 100px;">
                <table>
                    <tr>
                        <?php
                        $sql = "SELECT * FROM order_image_gallery where order_id=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $_GET['id']);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<td><image src='/public/uploads/" . $row["image_url"] . "' style='height:125px; width:125px; margin-right:20px;'/>
                    <br><a href='/src/order_image_gallery/delete.php?id=" . $row['id'] . "&order_id=" . $row['order_id'] . "' class='btn btn-sm btn-danger mt-2 mb-2'>Delete</a></td>";
                            }
                        }
                        ?>
                    </tr>
                </table>
                <input type="file" id="imageInput" name="image" accept="image/*">
                <button type="button" id="uploadButton">Upload Image</button>
                <div id="response"></div>
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
                    <?php
                    $sql = "SELECT * FROM order_items where order_id=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $_GET['id']);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $ids = 1;
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr id="row-<?php echo $ids; ?>">
                                <th scope="row">
                                    <input type="text" class="form-control" name="item_number<?php echo $ids; ?>" id="item_number<?php echo $ids; ?>" placeholder="Enter name" value="<?php if (!empty($row['item_number'])) {   echo $row['item_number'];  } ?>">
                                </th>
                                <td>
                                    <div>
                                        <input type="hidden" name="item<?php echo $ids; ?>_id" value="<?php echo $row['id']; ?>">
                                        <input type="text" class="form-control" name="name<?php echo $ids; ?>" id="name<?php echo $ids; ?>" placeholder="Enter name" value="<?php if (!empty($row['name'])) {   echo $row['name'];  } ?>">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <select class="form-control" name="size<?php echo $ids; ?>">
                                            <option value="" <?php if (empty($row['size'])) { echo 'selected'; } ?>>Select Size</option>
                                            
                                            <option value="Y-XS" <?php if ($row['size'] == 'Y-XS') {echo 'selected'; } ?>>Y-XS</option>
                                            <option value="Y-S" <?php if ($row['size'] == 'Y-S') {echo 'selected'; } ?>>Y-S</option>
                                            <option value="Y-M" <?php if ($row['size'] == 'Y-M') {echo 'selected'; } ?>>Y-M</option>
                                            <option value="Y-L" <?php if ($row['size'] == 'Y-L') {echo 'selected'; } ?>>Y-L</option>
                                            <option value="Y-XL" <?php if ($row['size'] == 'Y-XL') {echo 'selected'; } ?>>Y-XL</option>
                                            
                                            <option value="XS" <?php if ($row['size'] == 'XS') {echo 'selected'; } ?>>XS</option>
                                            <option value="S" <?php if ($row['size'] == 'S') {echo 'selected'; } ?>>S</option>
                                            <option value="M" <?php if ($row['size'] == 'M') {echo 'selected'; } ?>>M</option>
                                            <option value="L" <?php if ($row['size'] == 'L') {echo 'selected'; } ?>>L</option>
                                            <option value="XL" <?php if ($row['size'] == 'XL') {echo 'selected'; } ?>>XL</option>
                                            <option value="2XL" <?php if ($row['size'] == '2XL') {echo 'selected'; } ?>>2XL</option>
                                            <option value="3XL" <?php if ($row['size'] == '3XL') {echo 'selected'; } ?>>3XL</option>
                                            <option value="4XL" <?php if ($row['size'] == '4XL') {echo 'selected'; } ?>>4XL</option>
                                            
                                            <option value="W-XS" <?php if ($row['size'] == 'W-XS') {echo 'selected'; } ?>>W-XS</option>
                                            <option value="W-S" <?php if ($row['size'] == 'W-S') {echo 'selected'; } ?>>W-S</option>
                                            <option value="W-M" <?php if ($row['size'] == 'W-M') {echo 'selected'; } ?>>W-M</option>
                                            <option value="W-L" <?php if ($row['size'] == 'W-L') {echo 'selected'; } ?>>W-L</option>
                                            <option value="W-XL" <?php if ($row['size'] == 'W-XL') {echo 'selected'; } ?>>W-XL</option>
                                            <option value="W-2XL" <?php if ($row['size'] == 'W-2XL') {echo 'selected'; } ?>>W-2XL</option>
                                            <option value="W-3XL" <?php if ($row['size'] == 'W-3XL') {echo 'selected'; } ?>>W-3XL</option>
                                            <option value="W-4XL" <?php if ($row['size'] == 'W-4XL') {echo 'selected'; } ?>>W-4XL</option>

                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <select name="product<?php echo $ids; ?>" class="form-control">
                                            <option value="" <?php if (empty($row['product'])) {
                                                                    echo 'selected';
                                                                } ?>>Select Product</option>
                                            <option value="hoodie" <?php if ($row['product'] == 'hoodie') {
                                                                        echo 'selected';
                                                                    } ?>>Hoodie</option>
                                            <option value="t-shirt" <?php if ($row['product'] == 't-shirt') {
                                                                        echo 'selected';
                                                                    } ?>>T-shirt</option>
                                            <option value="trouser" <?php if ($row['product'] == 'trouser') {
                                                                        echo 'selected';
                                                                    } ?>>Trouser</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <select class="form-control" name="color<?php echo $ids; ?>" style="background:<?php echo $row['color']; ?>">
                                            <option value="">Select Color</option>
                                            <option value="red" <?php if ($row['color'] == 'red') {
                                                                    echo 'selected';
                                                                } ?>>Red</option>
                                            <option value="green" <?php if ($row['color'] == 'green') {
                                                                        echo 'selected';
                                                                    } ?>>Green</option>
                                            <option value="blue" <?php if ($row['color'] == 'blue') {
                                                                        echo 'selected';
                                                                    } ?>>Blue</option>
                                            <option value="white" <?php if ($row['color'] == 'white') {
                                                                        echo 'selected';
                                                                    } ?>>White</option>
                                            <option value="orange" <?php if ($row['color'] == 'orange') {
                                                                        echo 'selected';
                                                                    } ?>>Orange</option>
                                            <option value="lemon" <?php if ($row['color'] == 'lemon') {
                                                                        echo 'selected';
                                                                    } ?>>Lemon</option>
                                            <option value="pink" <?php if ($row['color'] == 'pink') {
                                                                        echo 'selected';
                                                                    } ?>>Pink</option>
                                            <option value="black" <?php if ($row['color'] == 'black') {
                                                                        echo 'selected';
                                                                    } ?>>Black</option>
                                            <option value="peach" <?php if ($row['color'] == 'peach') {
                                                                        echo 'selected';
                                                                    } ?>>Peach</option>
                                            <option value="brown" <?php if ($row['color'] == 'brown') {
                                                                        echo 'selected';
                                                                    } ?>>Brown</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <select class="form-control" name="design<?php echo $ids; ?>">
                                            <option value="">Select Design</option>
                                            <option <?php if ($row['design'] == '1') {
                                                        echo 'selected';
                                                    } ?>>1</option>
                                            <option <?php if ($row['design'] == '2') {
                                                        echo 'selected';
                                                    } ?>>2</option>
                                            <option <?php if ($row['design'] == '3') {
                                                        echo 'selected';
                                                    } ?>>3</option>
                                            <option <?php if ($row['design'] == '4') {
                                                        echo 'selected';
                                                    } ?>>4</option>
                                            <option <?php if ($row['design'] == '5') {
                                                        echo 'selected';
                                                    } ?>>5</option>
                                            <option <?php if ($row['design'] == '6') {
                                                        echo 'selected';
                                                    } ?>>6</option>
                                            <option <?php if ($row['design'] == '7') {
                                                        echo 'selected';
                                                    } ?>>7</option>
                                            <option <?php if ($row['design'] == '8') {
                                                        echo 'selected';
                                                    } ?>>8</option>
                                            <option <?php if ($row['design'] == '9') {
                                                        echo 'selected';
                                                    } ?>>9</option>
                                            <option <?php if ($row['design'] == '10') {
                                                        echo 'selected';
                                                    } ?>>10</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input type="checkbox" name="in_stock<?php echo $ids; ?>" value="<?php if (!empty($row['in_stock'])) {
                                                                                                                echo 1;
                                                                                                            } else {
                                                                                                                echo 0;
                                                                                                            } ?>" <?php if (!empty($row['in_stock'])) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <textarea class="form-control" name="notes<?php echo $ids; ?>" id="notes<?php echo $ids; ?>"> <?php if (!empty($row['notes'])) {
                                                                                                                                            echo $row['notes'];
                                                                                                                                        } ?></textarea>
                                    </div>
                                </td>
                                <td>
                                    <div id="rating-container<?php echo $ids; ?>" onclick="setProcess(<?php echo $ids; ?>)"></div>
                                    <input type="hidden" name="progress<?php echo $ids; ?>" id="progress<?php echo $ids; ?>" />
                                </td>
                                <td>
                                    <a href="javascript:void(0)" onclick="removeFunction(<?php echo $ids; ?>)"><img src="/public/img/del-icon.png" class="del-icon" /></a>
                                </td>
                            </tr>
                            <tr id="row-button-<?php echo $ids; ?>">
                                <td colspan="9">
                                    <a href="javascript:void(0)" onclick="addFunction(<?php echo $ids + 1; ?>)" class="btn btn-sm btn-success mr-2 ml-2"><i class="fas fa-1x fa-plus"></i></a>
                                </td>
                            </tr>
                            <script>
                                i = <?php echo $ids; ?>;
                                if (i > 1) {
                                    $('#row-button-' + (i - 1)).hide();
                                    console.log('value of i' + i);
                                }
                            </script>
                        <?php
                            $ids++;
                        } ?>

                        <?php
                        for ($val = $ids; $val < 11; $val++) {
                        ?>
                            <tr id="row-<?php echo $val; ?>">
                                <th scope="row">
                                <input type="text" class="form-control" name="item_number<?php echo $val; ?>" id="item_number<?php echo $val; ?>" placeholder="Enter name" value="">    
                                </th>
                                <td>
                                    <div>
                                        <input type="text" class="form-control" name="name<?php echo $val; ?>" id="name<?php echo $val; ?>" placeholder="Enter name">

                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <select class="form-control" name="size<?php echo $val; ?>">
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
                                    <div>

                                        <select name="product<?php echo $val; ?>" class="form-control">
                                            <option value="">Select Product</option>
                                            <option value="hoodie">Hoodie</option>
                                            <option value="t-shirt">T-shirt</option>
                                            <option value="trouser">Trouser</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <select class="form-control" name="color<?php echo $val; ?>" style="background:<?php echo $row['color']; ?>">
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
                                    <div>

                                        <select class="form-control" name="design<?php echo $val; ?>">
                                            <option value="">Select Design</option>
                                            <optio>1</option>
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
                                    <div>
                                        <input type="checkbox" name="in_stock<?php echo $val; ?>">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <textarea class="form-control" name="notes<?php echo $val; ?>" id="notes<?php echo $val; ?>"></textarea>
                                    </div>
                                </td>
                                <td>
                                    <div id="rating-container<?php echo $val; ?>" onclick="setProcess(<?php echo $val; ?>)"></div>
                                    <input type="hidden" name="progress<?php echo $val; ?>" id="progress<?php echo $val; ?>" />
                                </td>
                                <td>
                                    <a href="javascript:void(0)" onclick="removeFunction(<?php echo $val; ?>)"><img src="/public/img/del-icon.png" class="del-icon" /></a>
                                </td>
                            </tr>
                            <tr id="row-button-<?php echo $val; ?>">
                                <td colspan="9">
                                    <a href="javascript:void(0)" onclick="addFunction(<?php echo $val + 1; ?>)" class="btn btn-sm btn-success mr-2 ml-2" data-id="<?php echo $val + 1; ?>"><i class="fas fa-1x fa-plus"></i></a>
                                </td>
                            </tr>
                            <script>
                                <?php echo $ids; ?>
                            </script>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
            <div class="col-2">
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Update</button>
                </div>
            </div>
        </div>



    </form>
</body>

</html>


<script>
    $(document).ready(function() {
        for (iv = <?php echo $ids; ?>; iv <= 10; iv++) {
            $("#row-" + iv).hide();
            $("#row-button-" + iv).hide();
            console.log("id is- " + iv);
        }
    });

    function addFunction(id) {
        console.log(id);
        $("#row-" + id).show();
        $("#row-button-" + id).show();
        $("#row-button-" + (id - 1)).hide();
    }

    function removeFunction(id) {
        console.log(id);

        $("#name" + id).val('');
        $("#size" + id).val('');
        $("#product" + id).val('');
        $("#color" + id).val('');
        $("#design" + id).val('');
        $("#in_stock" + id).val('');
        $("#notes" + id).val('');
        $("#row-" + id).hide();
        $("#row-button-" + id).hide();
        $("#row-button-" + (id - 1)).show();
    }

    $(document).ready(function() {
        $('#uploadButton').on('click', function() {
            var file_data = $('#imageInput').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('order_id', <?php echo $_GET['id']; ?>);
            $.ajax({
                url: 'https://production.3pro.ca/src/orders/upload.php', // PHP script to handle the upload
                type: 'POST',
                data: form_data,
                contentType: false, // Important: tell jQuery not to set content type
                processData: false, // Important: tell jQuery not to process the data
                success: function(response) {
                    $('#response').html(response); // Display server response
                    document.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

    var val = 1;

    function displayRating(rating = 0, maxRating = 4, id = 1) {
        const container = document.getElementById('rating-container' + id);
        container.innerHTML = ''; // Clear previous dots

        for (let i = 1; i <= maxRating; i++) {
            const dot = document.createElement('span');
            dot.classList.add('dot');
            dot.textContent = '•';
            dot.dataset.value = i; // Store dot rating value

            if (i <= rating) dot.classList.add('filled');

            // Add click event
            dot.addEventListener('click', function() {
                displayRating(i, maxRating, id); // Re-render with selected rating
                //console.log('Selected rating:', i); // Optional: capture the rating value
                val = i;
            });

            container.appendChild(dot);
        }
    }

    // Initial display dots filed
    displayRating(0, 4, 1);
    displayRating(0, 4, 2);
    displayRating(0, 4, 3);
    displayRating(0, 4, 4);
    displayRating(0, 4, 5);
    displayRating(0, 4, 6);
    displayRating(0, 4, 7);
    displayRating(0, 4, 8);
    displayRating(0, 4, 9);
    displayRating(0, 4, 10);
</script>
<?php
$sql = "SELECT * FROM order_items where order_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $ids = 1;
    while ($row = $result->fetch_assoc()) {
?>
<script>
    function setProcess(id) {
        document.getElementById('progress' + id).value = val;
    }
    /* fix process dots */
    $(document).ready(function() {
        var fval=1;
        if("<?php echo $row['status']; ?>"=='pending'){
            fval=1;
        }
        if("<?php echo $row['status']; ?>"=='print'){
            fval=2;
        }
        if("<?php echo $row['status']; ?>"=='production'){
            fval=3;
        }
        if("<?php echo $row['status']; ?>"=='completed'){
            fval=4;
        }
        console.log(fval);
        displayRating(fval, 4, <?php echo $ids; ?>);
    });
</script>
<?php
        $ids++;
    }
}

require_once(__DIR__ . '/../../theme/footer.php'); ?>