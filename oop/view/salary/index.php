<div class="table-bg">
    <!-- add -->
    <div class="modaladd">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSalaryModal">
            Thêm
        </button>
        <div class="modal fade" id="addSalaryModal" tabindex="-1" aria-labelledby="addSalaryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form -->
                    <?php include "form-add.php" ?>
                </div>
            </div>
        </div>
    </div>

    <!-- edit -->
    <div class="modal fade" id="editSalaryModal" tabindex="-1" aria-labelledby="editSalaryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSalaryModalLabel">
                        Edit salary
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- form -->
                <?php include "form-edit.php" ?>
            </div>
        </div>
    </div>

    <!-- delete -->
    <div class="modal fade" id="deleteSalaryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteSalaryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- form -->
                <?php include "form-delete.php" ?>
            </div>
        </div>
    </div>

    <!-- show data -->
    <?php
    include "page.php"
    ?>

    <table>
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>level</th>
                <th>Hệ số lương</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_assoc($soefficientsalarydata)) { ?>
                <tr>
                    <td><?php echo $row["StaffID"] ?></td>
                    <td><?php echo $row["level"] ?></td>
                    <td><?php echo $row["hesoluong"] ?></td>
                    <td>
                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editSalaryModal' onclick='edit(<?php echo $row["StaffID"] ?>,"editsalary_id")'>
                            Sửa
                        </button>
                        <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteSalaryModal' onclick='del(<?php echo $row["StaffID"] ?>,"deletesalary_id")'>
                            Xóa
                        </button>
                    </td>
                </tr>
            <?php } ?>
            <?php mysqli_free_result($soefficientsalarydata) ?>

            <tr>
                <td colspan=' 4'>
                    <nav aria-label='Page navigation panigation'>
                        <ul class='pagination'>
                            <?php

                            if ($current_page > 1 && $total_page > 1) {
                                echo "<li class='page-item'><a class='page-link'href='quanly.php?pagesalary=$prev_page'>Prev</a></li>";
                            }

                            for ($i = 1; $i <= $total_page; $i++) {
                                if ($i == $current_page) {
                                    echo "<li class='page-item active'><a class='page-link' href='quanly.php?pagesalary=$i'>$i</a></li>";
                                } else {
                                    echo "<li class='page-item'><a class='page-link' href='quanly.php?pagesalary=$i'>$i</a></li>";
                                }
                            }

                            if ($current_page < $total_page && $total_page > 1) {
                                echo "<li class='page-item'><a class='page-link'href='quanly.php?pagesalary=$next_page'>Next</a></li>";
                            }
                            ?>
                        </ul>
                    </nav>
                </td>
            </tr>
        </tbody>
    </table>
</div>