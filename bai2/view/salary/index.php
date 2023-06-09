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
    include "page-variable.php"
    ?>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Staff ID</th>
                <th>level</th>
                <th>Hệ số lương</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php
            $stt = 0;
            while ($row = mysqli_fetch_assoc($soefficientsalarydata)) {
                $stt++;
            ?>
                <tr>
                    <td><?php echo $stt; ?></td>
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
                <td colspan=' 5'>
                    <nav aria-label='Page navigation panigation'>
                        <ul class='pagination'>
                            <?php
                            include "pagination.php"
                            ?>
                        </ul>
                    </nav>
                </td>
            </tr>
        </tbody>
    </table>
</div>