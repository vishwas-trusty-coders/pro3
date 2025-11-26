<?php
session_start();
/** Theme Header */
require_once(__DIR__ . '/../../theme/header.php');
?>
<!-- Include datatable required files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<div class="open-main-custom">
    <div class="container">
        <h2>Print</h2>
        <div id="all-user-data">
            <div class="user-row">
                <div class="header first-he">
                    <ul>
                        <li><a href="/src/orders/new.php" class="btn btn-sm btn-success">ADD ORDER</a></li>
                    </ul>
                </div>
                <div class="header">
                    <ul>
                        <li><a href="/src/orders/index.php" class="btn btn-sm btn-black">INVENTORY</a></li>
                        <li><a href="/src/orders/print.php" class="btn btn-sm btn-black">PRINT</a></li>
                        <li><a href="/src/orders/production.php" class="btn btn-sm btn-black">PRODUCTION</a></li>
                        <li><a href="/src/orders/invoice.php" class="btn btn-sm btn-black">INVOICE</a></li>
                        <li><a href="/src/orders/archive.php" class="btn btn-sm btn-black">ARCHIVE</a></li>
                        <li><a href="/src/orders/open.php" class="btn btn-sm btn-black">OPEN ORDERS(<?php echo $openOrderCount; ?>)</a></li>
                    </ul>
                </div>
                <?php
                /** Model Area */
                //delete unused order images
                $sql = "SELECT * FROM order_image_gallery where order_id is null";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if (file_exists(__DIR__ . "/../../public/uploads/" . $row['image_url'])) {
                            unlink(__DIR__ . '/../../public/uploads/' . $row['image_url']);
                        }
                        $stmt = $conn->prepare("DELETE FROM order_image_gallery WHERE id = ?");
                        $stmt->bind_param("i", $row['id']);
                        $stmt->execute();
                    }
                }

                //$sql = "SELECT * FROM orders where status='print'";

                $sql = "SELECT o.id,o.status,o.order_id,oi.id as oi_id,oi.name,oi.size,oi.product,oi.color,oi.design,oi.in_stock,oi.notes,oi.status,o.created_at FROM orders as o LEFT JOIN order_items as oi ON o.id = oi.order_id where oi.status='print'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                ?>
                    <table class="user-data-table" style="width:100% !important;" id="myTable">
                        <thead>
                            <th>Age</th>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Product</th>
                            <th>Color</th>
                            <th>Design</th>
                            <th>In Stock</th>
                            <th>Note</th>
                            <th>Production</th>
                            <th>Back</th>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) {
                                $sizeBGClass='size-bg-1';
                                if(in_array($row['size'],['Y-XS','Y-S','Y-M','Y-L','Y-XL'])){
                                    $sizeBGClass='size-bg-1';
                                }else if(in_array($row['size'],['XS','S','M','L','XL','2XL','3XL','4XL'])){
                                    $sizeBGClass='size-bg-2';
                                }else if(in_array($row['size'],['W-XS','W-S','W-M','W-L','W-XL','W-2XL','W-3XL','W-4XL'])){
                                    $sizeBGClass='size-bg-3';
                                }
                                echo "<tr class='order-row'>"
                                    . "<td class='td-date'>" . htmlspecialchars(timeAgo($row["created_at"])) . "</td>"
                                    . "<td class='td-id'><a class='link-name' href='/src/orders/edit.php?id=" . $row['id'] . "'>" . $row["order_id"] . "</a></td>"
                                    . "<td class='td-name'>"  . $row["name"]   . "</td>"
                                    . "<td class='td-name'><div class='".$sizeBGClass."'>"  . $row["size"]   . "</div></td>"
                                    . "<td class='td-name'>"  . $row["product"]   . "</td>"
                                    . "<td class='td-name'>"  . $row["color"]   . "</td>"
                                    . "<td class='td-name'>"  . $row["design"]   . "</td>"
                                    . "<td class='td-name'>"; ?>
                                <input type='checkbox' class='checkbox-in-stock' data-id=<?php echo $row['oi_id']; ?> <?php if (!empty($row['in_stock'])) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                                <?php
                                echo "</td>"
                                    . "<td class='td-name'>"  . $row["notes"]   . "</td>";
                                echo "<td class='td-team'><input type='checkbox' class='checkbox1' data-id='" . $row["oi_id"] . "' > </td>";
                                echo "<td class='td-team'><input type='checkbox' class='checkbox2' data-id='" . $row["oi_id"] . "' > </td>";
                                echo "</tr>";
                            } ?>
                        </tbody>
                    </table>
                <?php } else {
                    echo "0 results";
                } ?>
            </div>
        </div>
    </div>
</div>
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


<script>
    $(document).on('change', '.checkbox-in-stock', function() {
        const id = $(this).data('id'); // get data-id
        console.log(id);
        const checked = $(this).is(':checked'); // get checkbox status

        var val = 0;
        if (checked) {
            val = 1;
        }

        //console.log(`Checkbox with ID ${id} is checked`);
        var form_data = new FormData();
        form_data.append('id', id);
        form_data.append('val', val);
        form_data.append('change_in_stock', 1);
        $.ajax({
            url: 'https://production.3pro.ca/src/orders/update.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Successfully updated",
                    showConfirmButton: false,
                    timer: 1000
                });
            },
            error: function(xhr, status, error) {

                console.error(xhr.responseText);
            }
        });

    });

    $(document).on('change', '.checkbox1', function() {
        const id = $(this).data('id'); // get data-id
        const checked = $(this).is(':checked'); // get checkbox status
        // console.log('Checkbox clicked:', id, checked);
        // Example: perform some action
        if (checked) {
            //console.log(`Checkbox with ID ${id} is checked`);
            var form_data = new FormData();
            form_data.append('id', id);
            form_data.append('status', 'production');
            $.ajax({
                url: 'https://production.3pro.ca/src/orders/update.php',
                type: 'POST',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    document.location.reload();
                },
                error: function(xhr, status, error) {

                    console.error(xhr.responseText);
                }
            });
        }
    });

    $(document).on('change', '.checkbox2', function() {
        const id = $(this).data('id'); // get data-id
        const checked = $(this).is(':checked'); // get checkbox status
        // console.log('Checkbox clicked:', id, checked);
        // Example: perform some action
        if (checked) {
            //console.log(`Checkbox with ID ${id} is checked`);
            var form_data = new FormData();
            form_data.append('id', id);
            form_data.append('status', 'pending');
            $.ajax({
                url: 'https://production.3pro.ca/src/orders/update.php',
                type: 'POST',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    document.location.reload();
                },
                error: function(xhr, status, error) {

                    console.error(xhr.responseText);
                }
            });
        }
    });


    $(document).ready(function() {
        var table=$('#myTable').DataTable(
            
             { "order": 
               [[<?php if(!empty($_SESSION['print']['column'])) { echo $_SESSION['print']['column']; } else { echo 0; } ?>, '<?php if(!empty($_SESSION['print']['direction'])) { echo $_SESSION['print']['direction']; } else { echo "asc"; } ?>']]
               ,paging: false
            }
           
    );
        table.on('order.dt', function () {
            var order = table.order(); 
            var columnIndex = order[0][0];
            var direction   = order[0][1];

            // Get the column name from DataTables
            //console.log(columnIndex+" / "+direction);

            $.post("/src/orders/update.php", {
                page: 'print',
                column_name: columnIndex,
                direction: direction
            });
        });
    });

</script>
<!-- Close Page View -->