<?php
session_start();
/** Theme Header */
require_once(__DIR__ . '/../../theme/header.php');

/** Load Essentials & Database */
require_once(__DIR__ . '/../../config/app.php');
require_once($db_url);
?>
<!-- Include datatable required files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<div class="open-main-custom">
    <div class="container">
        <h2>Open Orders!</h2>
        <div id="all-user-data">
            <div class="user-row">
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
                ?>
                <!-- Page View -->

                <?php

                $sql = "SELECT * FROM orders where status!='completed'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                ?>
                    <table class="user-data-table" style="width:100% !important;" id="myTable">
                        <thead>
                            <th>Age</th>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Team</th>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) {
                                echo "<tr class='order-row'>"
                                    . "<td class='td-date'>"  . htmlspecialchars(timeAgo($row["created_at"])) . "</td>"
                                    . "<td class='td-id'>"    . $row["order_id"]   . "</td>"
                                    . "<td class='td-name'><a class='link-name' href='/src/orders/edit.php?id=" . $row['id'] . "'>" . htmlspecialchars($row["order_name"]) . "</a></td>"
                                    . "<td class='td-email'>" . htmlspecialchars($row["email"])      . "</td>"
                                    . "<td class='td-team'>"  . htmlspecialchars($row["team"])       . "</td>"
                                    . "</tr>";
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
<script>
    $(document).ready(function() {
        var table=$('#myTable').DataTable(
            
             { "order": [[<?php if(!empty($_SESSION['open']['column'])) { echo $_SESSION['open']['column']; } else { echo 0; } ?>, '<?php if(!empty($_SESSION['open']['direction'])) { echo $_SESSION['open']['direction']; } else { echo "asc"; } ?>']]
            ,paging: false
            }
           
    );
        table.on('order.dt', function () {
            var order = table.order(); 
            var columnIndex = order[0][0];
            var direction   = order[0][1];

            $.post("/src/orders/update.php", {
                page: 'open',
                column_name: columnIndex,
                direction: direction
            });
        });
    });
</script>
<!-- Close Page View -->