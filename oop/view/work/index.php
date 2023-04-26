<div class="table-bg">
    <!-- add -->
    <div class="modaladd">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWorkModal">
            Thêm
        </button>
        <div class="modal fade" id="addWorkModal" tabindex="-1" aria-labelledby="addWorkModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDevWorkLabel">
                            Add Work
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- form -->
                    <?php include "form-add.php" ?>
                </div>
            </div>
        </div>
    </div>

    <!-- edit -->
    <div class="modal fade" id="editWorkModal" tabindex="-1" aria-labelledby="editWorkModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDevWorkLabel">
                        Edit Work
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- form -->
                <?php include "form-edit.php" ?>
            </div>
        </div>
    </div>

    <!-- delete -->
    <div class="modal fade" id="deleteWorkModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteWorkModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- form -->
                <?php include "form-delete.php" ?>
            </div>
        </div>
    </div>

    <!-- show data -->
    <?php
    include "page.php";
    ?>

    <table>
        <thead>
            <tr>
                <th>Nhân viên ID</th>
                <th>Số giờ</th>
                <th>Tháng</th>
                <th>Năm</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_assoc($workdata)) { ?>
                <tr>
                    <td><?php echo $row["StaffID"] ?></td>
                    <td><?php echo $row["sogio"] ?></td>
                    <td><?php echo $row["thang"] ?></td>
                    <td><?php echo $row["nam"] ?></td>
                    <td>
                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editWorkModal' onclick='edit(<?php echo $row["StaffID"]; ?>,"editwork_id")'>
                            Sửa
                        </button>
                        <button type='button' class='btn btn-danger btn-del-work' data-bs-toggle='modal' data-bs-target='#deleteWorkModal' onclick='del(<?php echo $row["StaffID"]; ?>,"deletework_id")'>
                            Xóa
                        </button>
                    </td>
                </tr>

            <?php } ?>
            <?php mysqli_free_result($workdata) ?>

            <!-- phan trang -->

            <tr>
                <td colspan=' 5'>
                    <nav aria-label='Page navigation panigation'>
                        <ul class='pagination'>
                            <?php
                            //  nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                            if ($current_page > 1 && $total_page > 1) {
                                echo "<li class='page-item'>
                                                                <a class='page-link'href='quanly.php?pagework=$prev_page'>Prev</a>
                                                        </li>";
                            }

                            // Lặp khoảng giữa
                            for ($i = 1; $i <= $total_page; $i++) {
                                if ($i == $current_page) {
                                    echo "<li class='page-item active'>
                                                            <a class='page-link' href='quanly.php?pagework=$i'>$i</a>
                                                        </li>";
                                } else {
                                    echo "<li class='page-item'>
                                                            <a class='page-link' href='quanly.php?pagework=$i'>$i</a>
                                                        </li>";
                                }
                            }

                            // nếu current_page < $total_page và total_page> 1 mới hiển thi next
                            if ($current_page < $total_page && $total_page > 1) {
                                echo "<li class='page-item'>
                                                                <a class='page-link'href='quanly.php?pagework=$next_page'>Next</a>
                                                        </li>";
                            }

                            ?>
                        </ul>
                    </nav>
                </td>
            </tr>
        </tbody>
    </table>
</div>