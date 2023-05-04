<div class="table-bg">
    <!-- add -->
    <div class="modaladd">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmanager-modal">
            Thêm
        </button>
        <div class="modal fade" id="addmanager-modal" tabindex="-1" aria-labelledby="addmanager-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addmanager-modalLabel">
                            Add Manager
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
    <div class="modal fade" id="editManagerModal" tabindex="-1" aria-labelledby="editManagerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDevManagerLabel">
                        Edit Manager
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- form -->
                <?php include "form-edit.php" ?>
            </div>
        </div>
    </div>

    <!-- delete -->
    <div class="modal fade" id="deleteManagerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteManagerModalLabel" aria-hidden="true">
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
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Địa chỉ</th>
                <th>Ngày sinh</th>
                <th>Số năm kinh nghiệm</th>
                <th>Lương cơ bản</th>
                <th>Level</th>
                <th>Lương</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_assoc($managerdata)) { ?>
                <tr>
                    <td><?php echo $row["ten"] ?></td>
                    <td><?php echo $row["tuoi"] ?></td>
                    <td><?php echo $row["diachi"] ?></td>
                    <td><?php echo $row["ngaysinh"] ?></td>
                    <td><?php echo $row["namkinhnghiem"] ?></td>
                    <td><?php echo $db->convert_to_vnd($row["luongcoban"]); ?></td>
                    <td><?php echo $row["level"] ?></td>
                    <td><?php echo $db->convert_to_vnd($row["luong"]); ?></td>

                    <td>
                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editManagerModal' onclick='edit(<?php echo $row["StaffID"] ?>,"editmanager_id")'>
                            Sửa
                        </button>
                        <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteManagerModal' onclick='del(<?php echo $row["StaffID"] ?>,"deletemanager_id")'>
                            Xóa
                        </button>
                    </td>
                </tr>
            <?php } ?>
            <?php mysqli_free_result($managerdata) ?>

            <tr>
                <td colspan='9'>
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