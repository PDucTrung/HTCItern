<div class="table-bg">
    <!-- add -->
    <div class="modaladd">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDevModal">
            Thêm
        </button>
        <div class="modal fade" id="addDevModal" tabindex="-1" aria-labelledby="addDevModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDevModalLabel">
                            Add Dev
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
    <div class="modal fade" id="editDevModal" tabindex="-1" aria-labelledby="editDevModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDevModalLabel">
                        Edit Dev
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- form -->
                <?php include "form-edit.php" ?>
            </div>
        </div>
    </div>

    <!-- delete -->
    <div class="modal fade" id="deleteDevModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteDevModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- form -->
                <?php include "form-delete.php" ?>
            </div>
        </div>
    </div>

    <!--  -->
    <?php include "page.php" ?>

    <!-- show data -->
    <table>
        <thead>
            <tr>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Địa chỉ</th>
                <th>Ngày sinh</th>
                <th>Số năm kinh nghiệm</th>
                <th>Lương cơ bản</th>
                <th>Ngôn ngữ lập trình</th>
                <th>Level</th>
                <th>Lương</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_assoc($devdata)) { ?>
                <tr>
                    <td><?php echo $row["ten"]; ?></td>
                    <td><?php echo $row["tuoi"]; ?></td>
                    <td><?php echo $row["diachi"]; ?></td>
                    <td><?php echo $row["ngaysinh"]; ?></td>
                    <td><?php echo $row["namkinhnghiem"]; ?></td>
                    <td><?php echo $row["luongcoban"]; ?></td>
                    <td><?php echo $row["language"]; ?></td>
                    <td><?php echo $row["level"]; ?></td>
                    <td><?php echo $row["luong"]; ?></td>
                    <td>
                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editDevModal' onclick='edit(<?php echo $row["StaffID"] ?>,"editdev_id")'>
                            Sửa
                        </button>
                        <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteDevModal' onclick='del(<?php echo $row["StaffID"]; ?>,"deletedev_id")'>
                            Xóa
                        </button>
                    </td>
                </tr>
            <?php } ?>
            <?php mysqli_free_result($devdata) ?>

            <tr>
                <td colspan='10'>
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