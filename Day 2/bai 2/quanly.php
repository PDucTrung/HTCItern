<?php
// session_start();
include_once('connect.php');

mysqli_set_charset($conn, "utf8");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân sự</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="UI/style.css" />
</head>

<body>
    <section class="manage">
        <div class="container">
            <h2 class="text-center">Quản lý nhân sự</h2>
            <br />
            <div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="dev-tab" data-bs-toggle="tab" data-bs-target="#dev" type="button" role="tab" aria-controls="dev" aria-selected="true">
                            Developer
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="manager-tab" data-bs-toggle="tab" data-bs-target="#manager" type="button" role="tab" aria-controls="manager" aria-selected="false">
                            Manager
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="work-tab" data-bs-toggle="tab" data-bs-target="#work" type="button" role="tab" aria-controls="work" aria-selected="false">
                            Công việc
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="salary-tab" data-bs-toggle="tab" data-bs-target="#salary" type="button" role="tab" aria-controls="salary" aria-selected="false">
                            hệ số lương
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="thongke-tab" data-bs-toggle="tab" data-bs-target="#thongke" type="button" role="tab" aria-controls="thongke" aria-selected="false">
                            Thống kê
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="dev" role="tabpanel" aria-labelledby="dev-tab">
                        <div class="table-bg">
                            <div>
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
                                            <div class="modal-body">
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="button" class="btn btn-primary">
                                                    Thêm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editDevModal" tabindex="-1" aria-labelledby="editDevModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDevModalLabel">
                                                Edit Dev
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex flex-column gap-3">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Hủy
                                            </button>
                                            <button type="button" class="btn btn-primary">
                                                lưu
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM staff INNER JOIN devloper ON staff.StaffID = devloper.StaffID");

                            echo "<table>
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
                            </thead>";

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo ("
                                <tbody>
                                    <tr>
                                        <td>{$row["ten"]}</td>
                                        <td>{$row["tuoi"]}</td>
                                        <td>{$row["diachi"]}</td>
                                        <td>{$row["ngaysinh"]}</td>
                                        <td>{$row["namkinhnghiem"]}</td>
                                        <td>{$row["luongcoban"]}</td>
                                        <td>{$row["language"]}</td>
                                        <td>{$row["leveldev"]}</td>
                                        <td></td>
                                        <td>
                                            <button
                                            type='button'
                                            class='btn btn-primary'
                                            data-bs-toggle='modal'
                                            data-bs-target='#editDevModal'
                                            >
                                                Sửa
                                            </button>
                                            <button type='button' class='btn btn-danger'>
                                                Xóa
                                            </button>
                                        </td>
                                    </tr>
                                    ");
                            }
                            echo "<tr>
                                        <td colspan='10'>
                                            <nav aria-label='Page navigation panigation'>
                                            <ul class='pagination'>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>Previous</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>1</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>2</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>3</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>Next</a>
                                                </li>
                                            </ul>
                                            </nav>
                                        </td>
                                    </tr>
                            </tbody>
                            </table>";

                            // mysqli_close($conn);
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="manager" role="tabpanel" aria-labelledby="manager-tab">
                        <div class="table-bg">
                            <div>
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
                                            <div class="modal-body">
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="button" class="btn btn-primary">
                                                    Thêm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editManagerModal" tabindex="-1" aria-labelledby="editManagerModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDevManagerLabel">
                                                Edit Manager
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex flex-column gap-3">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <inpt type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Hủy
                                            </button>
                                            <button type="button" class="btn btn-primary">
                                                lưu
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM staff INNER JOIN manager ON staff.StaffID = manager.StaffID");

                            echo "<table>
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
                            </thead>";

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo ("
                                <tbody>
                                    <tr>
                                        <td>{$row["ten"]}</td>
                                        <td>{$row["tuoi"]}</td>
                                        <td>{$row["diachi"]}</td>
                                        <td>{$row["ngaysinh"]}</td>
                                        <td>{$row["namkinhnghiem"]}</td>
                                        <td>{$row["luongcoban"]}</td>
                                        <td>{$row["levelmanager"]}</td>
                                        <td></td>
                                        <td>
                                            <button
                                            type='button'
                                            class='btn btn-primary'
                                            data-bs-toggle='modal'
                                            data-bs-target='#editManagerModal'
                                            >
                                                Sửa
                                            </button>
                                            <button type='button' class='btn btn-danger'>
                                                Xóa
                                            </button>
                                        </td>
                                    </tr>
                                    ");
                            }
                            echo "<tr>
                                        <td colspan='10'>
                                            <nav aria-label='Page navigation panigation'>
                                            <ul class='pagination'>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>Previous</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>1</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>2</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>3</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>Next</a>
                                                </li>
                                            </ul>
                                            </nav>
                                        </td>
                                    </tr>
                            </tbody>
                            </table>";

                            // mysqli_close($conn);
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="work" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="table-bg">
                            <div>
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
                                            <div class="modal-body">
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="button" class="btn btn-primary">
                                                    Thêm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editWorkModal" tabindex="-1" aria-labelledby="editWorkModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editWorkModalLabel">
                                                Edit Work
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex flex-column gap-3">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Hủy
                                            </button>
                                            <button type="button" class="btn btn-primary">
                                                lưu
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            // session_start();
                            // include_once('connect.php');

                            // mysqli_set_charset($conn, "utf8");
                            $result = mysqli_query($conn, "SELECT * FROM work");

                            echo "<table>
                            <thead>
                                <tr>
                                    <th>Nhân viên ID</th>
                                    <th>Số giờ</th>
                                    <th>Tháng</th>
                                    <th>Năm</th>
                                    <th></th>
                                </tr>
                            </thead>";

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo ("
                                <tbody>
                                    <tr>
                                        <td>{$row["staffID"]}</td>
                                        <td>{$row["sogio"]}</td>
                                        <td>{$row["thang"]}</td>
                                        <td>{$row["nam"]}</td>
                                        <td>
                                            <button
                                            type='button'
                                            class='btn btn-primary'
                                            data-bs-toggle='modal'
                                            data-bs-target='#editWorkModal'
                                            >
                                                Sửa
                                            </button>
                                            <button type='button' class='btn btn-danger'>
                                                Xóa
                                            </button>
                                        </td>
                                    </tr>
                                    ");
                            }
                            echo "<tr>
                                        <td colspan='9'>
                                            <nav aria-label='Page navigation panigation'>
                                            <ul class='pagination'>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>Previous</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>1</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>2</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>3</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>Next</a>
                                                </li>
                                            </ul>
                                            </nav>
                                        </td>
                                    </tr>
                            </tbody>
                            </table>";

                            // mysqli_close($conn);
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="salary" role="tabpanel" aria-labelledby="salary-tab">
                        <div class="table-bg">
                            <div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSalaryModal">
                                    Thêm
                                </button>
                                <div class="modal fade" id="addSalaryModal" tabindex="-1" aria-labelledby="addSalaryModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addDevSalaryLabel">
                                                    Add Salary
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="button" class="btn btn-primary">
                                                    Thêm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal fade" id="editSalaryModal" tabindex="-1" aria-labelledby="editSalaryModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSalaryModalLabel">
                                            Edit salary
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex flex-column gap-3">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Hủy
                                        </button>
                                        <button type="button" class="btn btn-primary">lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        // session_start();
                        // include_once('connect.php');

                        // mysqli_set_charset($conn, "utf8");
                        $result = mysqli_query($conn, "SELECT * FROM soefficientsalary");

                        echo "<table>
                            <thead>
                                <tr>
                                    <th>Nhân viên ID</th>
                                    <th>level</th>
                                    <th>Hệ số lương</th>
                                    <th></th>
                                </tr>
                            </thead>";

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo ("
                                <tbody>
                                    <tr>
                                        <td>{$row["staffID"]}</td>
                                        <td>{$row["level"]}</td>
                                        <td>{$row["hesoluong"]}</td>
                                        <td>
                                            <button
                                            type='button'
                                            class='btn btn-primary'
                                            data-bs-toggle='modal'
                                            data-bs-target='#editSalaryModal'
                                            >
                                                Sửa
                                            </button>
                                            <button type='button' class='btn btn-danger'>
                                                Xóa
                                            </button>
                                        </td>
                                    </tr>
                                    ");
                        }
                        echo "<tr>
                                        <td colspan='9'>
                                            <nav aria-label='Page navigation panigation'>
                                            <ul class='pagination'>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>Previous</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>1</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>2</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>3</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>Next</a>
                                                </li>
                                            </ul>
                                            </nav>
                                        </td>
                                    </tr>
                            </tbody>
                            </table>";

                        // mysqli_close($conn);
                        ?>
                    </div>
                    <div class="tab-pane fade" id="thongke" role="tabpanel" aria-labelledby="thongke-tab">
                        <div class="table-bg">
                            <?php
                            // session_start();
                            // include_once('connect.php');

                            // mysqli_set_charset($conn, "utf8");
                            $result = mysqli_query($conn, "SELECT staff.ten, staff.luongcoban, work.sogio FROM staff, work WHERE staff.StaffID=work.staffID");

                            echo "<table>
                            <thead>
                                <tr>
                                    <th>Tên nhân viên</th>
                                    <th>Lương 1 tháng</th>
                                    <th>Số giờ</th>
                                </tr>
                            </thead>";

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo ("
                                <tbody>
                                    <tr>
                                        <td>{$row["ten"]}</td>
                                        <td>{$row["luongcoban"]}</td>
                                        <td>{$row["sogio"]}</td>
                                    </tr>
                                    ");
                            }
                            echo "<tr>
                                        <td colspan='3'>
                                            <nav aria-label='Page navigation panigation'>
                                            <ul class='pagination'>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>Previous</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>1</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>2</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>3</a>
                                                </li>
                                                <li class='page-item'>
                                                <a class='page-link' href='#'>Next</a>
                                                </li>
                                            </ul>
                                            </nav>
                                        </td>
                                    </tr>
                            </tbody>
                            </table>";

                            // mysqli_close($conn);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>