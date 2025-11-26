<?php

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

                $sql = "SELECT o.id,o.status,o.order_id,oi.id as oi_id,oi.name,oi.size,oi.product,oi.color,oi.design,oi.in_stock,oi.notes,oi.progress,o.created_at FROM orders as o LEFT JOIN order_items as oi ON o.id = oi.order_id where o.status='print'";
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
                            <th>Progress</th>
                            <th>Production</th>
                            <th>Back</th>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) {
                                echo "<tr class='order-row'>"
                                    . "<td class='td-date'>" . htmlspecialchars(timeAgo($row["created_at"])) . "</td>"
                                    . "<td class='td-id'><a class='link-name' href='/src/orders/edit.php?id=" . $row['id'] . "'>" . $row["order_id"] . "</a></td>"
                                    . "<td class='td-name'>"  . $row["name"]   . "</td>"
                                    . "<td class='td-name'>"  . $row["size"]   . "</td>"
                                    . "<td class='td-name'>"  . $row["product"]   . "</td>"
                                    . "<td class='td-name'>"  . $row["color"]   . "</td>"
                                    . "<td class='td-name'>"  . $row["design"]   . "</td>"
                                    . "<td class='td-name'>"; ?>
                                <input type='checkbox' class='checkbox-in-stock' data-id=<?php echo $row['oi_id']; ?> <?php if (!empty($row['in_stock'])) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                                <?php
                                echo "</td>"
                                    . "<td class='td-name'>"  . $row["notes"]   . "</td>"
                                    . "<td class='td-name'>"; ?>

                                <div id="rating-container<?php echo $row['oi_id']; ?>" onclick="setProcess(<?php echo $row['oi_id']; ?>)"></div>
                                <input type="hidden" name="progress<?php echo $row['oi_id']; ?>" id="progress<?php echo $row['oi_id']; ?>" />

                            <?php echo "</td>";
                                echo "<td class='td-team'><input type='checkbox' class='checkbox1' data-id='" . $row["id"] . "' > </td>";
                                echo "<td class='td-team'><input type='checkbox' class='checkbox2' data-id='" . $row["id"] . "' > </td>";
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


    function setProcess(id) {

        var form_data = new FormData();
        form_data.append('id', id);
        form_data.append('val', val);
        form_data.append('change_process', 1);
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

    }


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
            form_data.append('status', 'inventory');
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

    $(document).ready(function() {
        // Initial display dots filed

        <?php

        $sql = "SELECT o.id,o.status,o.order_id,oi.id as oi_id,oi.name,oi.size,oi.product,oi.color,oi.design,oi.in_stock,oi.notes,oi.progress,o.created_at FROM orders as o LEFT JOIN order_items as oi ON o.id = oi.order_id where o.status='print'";
        $result = $conn->query($sql);


        while ($row = $result->fetch_assoc()) { ?>
            displayRating(<?php echo $row['progress'] ? $row['progress'] : 0 ?>, 4, <?php echo $row['oi_id'] ?>);
        <?php } ?>

        $('#myTable').DataTable();
    });
</script>
<!-- Close Page View -->