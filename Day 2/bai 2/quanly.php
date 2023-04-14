<?php
// session_start();
include 'connect.php';

mysqli_set_charset($conn, "utf8");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân sự</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
                        <button class="nav-link active" id="dev-tab" data-bs-toggle="tab" data-bs-target="#dev"
                            type="button" role="tab" aria-controls="dev" aria-selected="true">
                            Developer
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="manager-tab" data-bs-toggle="tab" data-bs-target="#manager"
                            type="button" role="tab" aria-controls="manager" aria-selected="false">
                            Manager
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="work-tab" data-bs-toggle="tab" data-bs-target="#work" type="button"
                            role="tab" aria-controls="work" aria-selected="false">
                            Công việc
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="salary-tab" data-bs-toggle="tab" data-bs-target="#salary"
                            type="button" role="tab" aria-controls="salary" aria-selected="false">
                            hệ số lương
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="thongke-tab" data-bs-toggle="tab" data-bs-target="#thongke"
                            type="button" role="tab" aria-controls="thongke" aria-selected="false">
                            Thống kê
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="dev" role="tabpanel" aria-labelledby="dev-tab">
                        <div class="table-bg">
                            <!-- add -->
                            <div class="modaladd">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addDevModal">
                                    Thêm
                                </button>
                                <div class="modal fade" id="addDevModal" tabindex="-1"
                                    aria-labelledby="addDevModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addDevModalLabel">
                                                    Add Dev
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <!-- form -->
                                            <form action="adddev.php" method="post">
                                                <div class="modal-body">
                                                    <div class="d-flex flex-column gap-3">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="StaffID" name="staffid"
                                                                aria-label="StaffID" aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Ten"
                                                                name="ten" aria-label="ten"
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Tuoi"
                                                                name="tuoi" aria-label="tuoi"
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="Dia chi" name="diachi" aria-label="diachi"
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="Ngay sinh" name="ngaysinh"
                                                                aria-label="ngaysinh" aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="So nam kinh nghiem" name="sonamkinhnghiem"
                                                                aria-label="sonamkn" aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="luong co ban" name="luongcoban"
                                                                aria-label="sonamkn" aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="Ngon ngu lap trinh" name="ngonngulaptrinh"
                                                                aria-label="language" aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <select class="form-select"
                                                                aria-label="Default select example" name="selectlevel">
                                                                <option value="" selected>select level</option>
                                                                <option value="junior 1">Junior 1</option>
                                                                <option value="junior 2">Junior 2</option>
                                                                <option value="junior 3">Junior 3</option>
                                                                <option value="junior 4">Junior 4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit" class="btn btn-primary" name="adddev">
                                                        Thêm
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- edit -->
                            <div class="modal fade" id="editDevModal" tabindex="-1" aria-labelledby="editDevModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDevModalLabel">
                                                Edit Dev
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form role="form" action="edit.php?action=editdev" method="post">
                                            <div class="modal-body">
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="StaffID"
                                                            name="staffid" aria-label="StaffID"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Ten"
                                                            name="ten" aria-label="ten"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Tuoi"
                                                            name="tuoi" aria-label="tuoi"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Dia chi"
                                                            name="diachi" aria-label="diachi"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Ngay sinh"
                                                            name="ngaysinh" aria-label="ngaysinh"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control"
                                                            placeholder="So nam kinh nghiem" name="sonamkinhnghiem"
                                                            aria-label="sonamkn" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control"
                                                            placeholder="luong co ban" name="luongcoban"
                                                            aria-label="sonamkn" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control"
                                                            placeholder="Ngon ngu lap trinh" name="ngonngulaptrinh"
                                                            aria-label="language" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="selectlevel">
                                                            <option value="" selected>select level</option>
                                                            <option value="junior 1">Junior 1</option>
                                                            <option value="junior 2">Junior 2</option>
                                                            <option value="junior 3">Junior 3</option>
                                                            <option value="junior 4">Junior 4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    lưu
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- delete -->
                            <div class="modal fade" id="deleteDevModal" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteDevModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" action="delete.php?action=deletedev" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteDevModalLabel">Delete Dev
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="deletedev_id" id="deletedev_id" value="">
                                                <h4> Do you want to Delete this Data ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="deletedata"
                                                    class="btn btn-primary">OK</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--  -->
                            <?php
                            $sql = "SELECT COUNT(StaffID) AS total FROM devloper";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $total_records = $row['total'];

                            $current_page = isset($_GET['pagedev']) ? $_GET['pagedev'] : 1;
                            $limit = 3;

                            $total_page = ceil($total_records / $limit);

                            if ($current_page > $total_page) {
                                $current_page = $total_page;
                            } else if ($current_page < 1) {
                                $current_page = 1;
                            }

                            $start = ($current_page - 1) * $limit;
                            $prev_page = $current_page - 1;
                            $next_page = $current_page + 1;
                            $devdata = mysqli_query($conn, "SELECT devloper.StaffID,staff.ten,staff.tuoi,staff.diachi,staff.ngaysinh,staff.namkinhnghiem,staff.luongcoban,devloper.language,devloper.level, 
                            staff.luongcoban + (work.sogio * 50.000) * soefficientsalary.hesoluong AS 'luong' 
                            FROM Staff INNER JOIN devloper on Staff.StaffID = devloper.StaffID 
                            INNER JOIN work ON devloper.StaffID = work.StaffID 
                            INNER JOIN soefficientsalary on devloper.StaffID = soefficientsalary.StaffID 
                            LIMIT $start, $limit"); ?>

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
                                        <td>
                                            <?php echo $row["ten"]; ?></td>
                                        <td><?php echo $row["tuoi"]; ?></td>
                                        <td><?php echo $row["diachi"]; ?></td>
                                        <td><?php echo $row["ngaysinh"]; ?></td>
                                        <td><?php echo $row["namkinhnghiem"]; ?></td>
                                        <td><?php echo $row["luongcoban"]; ?></td>
                                        <td><?php echo $row["language"]; ?></td>
                                        <td><?php echo $row["level"]; ?></td>
                                        <td><?php echo $row["luong"]; ?></td>
                                        <td>
                                            <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                                data-bs-target='#editDevModal'>
                                                Sửa
                                            </button>
                                            <button type='button' class='btn btn-danger' data-bs-toggle='modal'
                                                data-bs-target='#deleteDevModal'
                                                onclick='deleteDev(<?php echo $row["StaffID"]; ?>)'>
                                                Xóa
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan='10'>
                                            <nav aria-label='Page navigation panigation'>
                                                <ul class='pagination'>
                                                    <?php
                                                    if ($current_page > 1 && $total_page > 1) {
                                                        echo "<li class='page-item'>
                                                                <a class='page-link'href='quanly.php?pagedev=$prev_page'>Prev</a>
                                                        </li>";
                                                    }

                                                    for ($i = 1; $i <= $total_page; $i++) {
                                                        if ($i == $current_page) {
                                                            echo "<li class='page-item active'>
                                                            <a class='page-link' href='quanly.php?pagedev=$i'>$i</a>
                                                        </li>";
                                                        } else {
                                                            echo "<li class='page-item'>
                                                            <a class='page-link' href='quanly.php?pagedev=$i'>$i</a>
                                                        </li>";
                                                        }
                                                    }

                                                    if ($current_page < $total_page && $total_page > 1) {
                                                        echo "<li class='page-item'>
                                                                <a class='page-link'href='quanly.php?pagedev=$next_page'>Next</a>
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
                    </div>
                    <div class="tab-pane fade" id="manager" role="tabpanel" aria-labelledby="manager-tab">
                        <div class="table-bg">
                            <!-- add -->
                            <div class="modaladd">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addmanager-modal">
                                    Thêm
                                </button>
                                <div class="modal fade" id="addmanager-modal" tabindex="-1"
                                    aria-labelledby="addmanager-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addmanager-modalLabel">
                                                    Add Manager
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <!-- form -->
                                            <form action="addmanager.php" method="post">
                                                <div class="modal-body">
                                                    <div class="d-flex flex-column gap-3">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="StaffID" name="staffid"
                                                                aria-label="StaffID" aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Ten"
                                                                name="ten" aria-label="ten"
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Tuoi"
                                                                name="tuoi" aria-label="tuoi"
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="Dia chi" name="diachi" aria-label="diachi"
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="Ngay sinh" name="ngaysinh"
                                                                aria-label="ngaysinh" aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="So nam kinh nghiem" name="sonamkinhnghiem"
                                                                aria-label="sonamkn" aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="luong co ban" name="luongcoban"
                                                                aria-label="sonamkn" aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <select class="form-select" name="selectlevel"
                                                                aria-label="Default select example">
                                                                <option selected value="">select level</option>
                                                                <option value="PA">PA</option>
                                                                <option value="PM">PM</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit" class="btn btn-primary" name="addmanager">
                                                        Thêm
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- edit -->
                            <div class="modal fade" id="editManagerModal" tabindex="-1"
                                aria-labelledby="editManagerModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDevManagerLabel">
                                                Edit Manager
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form role="form" action="edit.php?action=editmanager" method="post">
                                            <div class="modal-body">
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="StaffID"
                                                            name="staffid" aria-label="StaffID"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Ten"
                                                            name="ten" aria-label="ten"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Tuoi"
                                                            name="tuoi" aria-label="tuoi"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Dia chi"
                                                            name="diachi" aria-label="diachi"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Ngay sinh"
                                                            name="ngaysinh" aria-label="ngaysinh"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control"
                                                            placeholder="So nam kinh nghiem" name="sonamkinhnghiem"
                                                            aria-label="sonamkn" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control"
                                                            placeholder="luong co ban" name="luongcoban"
                                                            aria-label="sonamkn" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <select class="form-select" name="selectlevel"
                                                            aria-label="Default select example">
                                                            <option selected value="">select level</option>
                                                            <option value="PA">PA</option>
                                                            <option value="PM">PM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    lưu
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- delete -->
                            <div class="modal fade" id="deleteManagerModal" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteManagerModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" action="delete.php?action=deletemanager" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteManagerModalLabel">Delete Manager
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="deletemanager_id" id="deletemanager_id"
                                                    value="">
                                                <h4> Do you want to Delete this Data ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="deletedata"
                                                    class="btn btn-primary">OK</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- show data -->
                            <?php
                            $sql = "SELECT COUNT(StaffID) AS total FROM manager";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $total_records = $row['total'];

                            $current_page = isset($_GET['pagemanager']) ? $_GET['pagemanager'] : 1;
                            $limit = 3;

                            $total_page = ceil($total_records / $limit);

                            if ($current_page > $total_page) {
                                $current_page = $total_page;
                            } else if ($current_page < 1) {
                                $current_page = 1;
                            }

                            $start = ($current_page - 1) * $limit;
                            $prev_page = $current_page - 1;
                            $next_page = $current_page + 1;
                            $managerdata = mysqli_query(
                                $conn,
                                "SELECT manager.StaffID,staff.ten,staff.tuoi,staff.diachi,staff.ngaysinh,staff.namkinhnghiem,staff.luongcoban,manager.level, 
                            staff.luongcoban + (work.sogio) * (30000 + 50000 * soefficientsalary.hesoluong) AS 'luong' 
                            FROM Staff INNER JOIN manager on Staff.StaffID = manager.StaffID 
                            INNER JOIN work ON manager.StaffID = work.StaffID 
                            INNER JOIN soefficientsalary on manager.StaffID = soefficientsalary.StaffID 
                            LIMIT $start, $limit"
                            );
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
                                        <td><?php echo $row["luongcoban"] ?></td>
                                        <td><?php echo $row["level"] ?></td>
                                        <td><?php echo $row["luong"] ?></td>

                                        <td>
                                            <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                                data-bs-target='#editManagerModal'>
                                                Sửa
                                            </button>
                                            <button type='button' class='btn btn-danger' data-bs-toggle='modal'
                                                data-bs-target='#deleteManagerModal'
                                                onclick='deleteManager(<?php echo $row["StaffID"] ?>)'>
                                                Xóa
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan='9'>
                                            <nav aria-label='Page navigation panigation'>
                                                <ul class='pagination'>
                                                    <?php
                                                    if ($current_page > 1 && $total_page > 1) {
                                                        echo "<li class='page-item'>
                                                                <a class='page-link'href='quanly.php?pagemanager=$prev_page'>Prev</a>
                                                        </li>";
                                                    }

                                                    for ($i = 1; $i <= $total_page; $i++) {
                                                        if ($i == $current_page) {
                                                            echo "<li class='page-item active'>
                                                            <a class='page-link' href='quanly.php?pagemanager=$i'>$i</a>
                                                        </li>";
                                                        } else {
                                                            echo "<li class='page-item'>
                                                            <a class='page-link' href='quanly.php?pagemanager=$i'>$i</a>
                                                        </li>";
                                                        }
                                                    }

                                                    if ($current_page < $total_page && $total_page > 1) {
                                                        echo "<li class='page-item'>
                                                                <a class='page-link'href='quanly.php?pagemanager=$next_page'>Next</a>
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
                    </div>
                    <div class="tab-pane fade" id="work" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="table-bg">
                            <!-- add -->
                            <div class="modaladd">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addWorkModal">
                                    Thêm
                                </button>
                                <div class="modal fade" id="addWorkModal" tabindex="-1"
                                    aria-labelledby="addWorkModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addDevWorkLabel">
                                                    Add Work
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <!-- form -->
                                            <form action="addwork.php" method="post">
                                                <div class="modal-body">
                                                    <div class="d-flex flex-column gap-3">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="staffid"
                                                                placeholder="Staff ID" aria-label="Username"
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="So gio"
                                                                name="sogio" aria-label="Username"
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="thang"
                                                                name="thang" aria-label="Username"
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="nam"
                                                                name="nam" aria-label="Username"
                                                                aria-describedby="basic-addon1" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit" class="btn btn-primary" name="addwork">
                                                        Thêm
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- edit -->
                            <div class="modal fade" id="editWorkModal" tabindex="-1"
                                aria-labelledby="editWorkModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" action="edit.php?action=editwork" method="post">
                                            <div class=" modal-header">
                                                <h5 class="modal-title" id="editWorkModalLabel">
                                                    Edit Work
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="staffid"
                                                            placeholder="Staff ID" aria-label="Username"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="sogio"
                                                            placeholder="sogio" aria-label="Username"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="thang"
                                                            placeholder="thang" aria-label="Username"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="nam"
                                                            placeholder="nam" aria-label="Username"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="submit" class="btn btn-primary" name="edit">
                                                    lưu
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- delete -->
                            <div class="modal fade" id="deleteWorkModal" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteWorkModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" action="delete.php?action=deletework" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteWorkModalLabel">Delete work</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="deletework_id" id="deletework_id" value="">
                                                <h4> Do you want to Delete this Data ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="deletedata"
                                                    class="btn btn-primary">OK</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- show data -->
                            <?php
                            // Phân trang
                            // tìm tổng số records
                            $sql = "SELECT COUNT(StaffID) AS total FROM work";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $total_records = $row['total'];

                            // LIMIT và CURRENT_PAGE
                            $current_page = isset($_GET['pagework']) ? $_GET['pagework'] : 1;
                            $limit = 3;

                            // tổng số trang
                            $total_page = ceil($total_records / $limit);

                            // Giới hạn current_page trong khoảng 1 đến total_page
                            if ($current_page > $total_page) {
                                $current_page = $total_page;
                            } else if ($current_page < 1) {
                                $current_page = 1;
                            }

                            // Tìm Start
                            $start = ($current_page - 1) * $limit;
                            $prev_page = $current_page - 1;
                            $next_page = $current_page + 1;

                            // Có limit và start rồi thì truy vấn CSDL lấy danh sách 
                            $workdata = mysqli_query($conn, "SELECT * FROM work LIMIT $start, $limit");
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
                                            <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                                data-bs-target='#editWorkModal'>
                                                Sửa
                                            </button>
                                            <button type='button' class='btn btn-danger btn-del-work'
                                                data-bs-toggle='modal' data-bs-target='#deleteWorkModal'
                                                onclick='deleteWork(<?php echo $row["StaffID"]; ?>)'>
                                                Xóa
                                            </button>
                                        </td>
                                    </tr>

                                    <?php } ?>

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

                                                    // nếu current_page < $total_page và total_page> 1 mới hiển
                                                    // thị nút prev
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
                    </div>
                    <div class="tab-pane fade" id="salary" role="tabpanel" aria-labelledby="salary-tab">
                        <div class="table-bg">
                            <!-- add -->
                            <div class="modaladd">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addSalaryModal">
                                    Thêm
                                </button>
                                <div class="modal fade" id="addSalaryModal" tabindex="-1"
                                    aria-labelledby="addSalaryModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="addhsluong.php">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addDevSalaryLabel">
                                                        Add Salary
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="d-flex flex-column gap-3">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="StaffID" name="staffid" aria-label="level"
                                                                aria-describedby="basic-addon1" value="" />
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="he so luong" aria-label="hsluong"
                                                                name="hsluong" aria-describedby="basic-addon1"
                                                                value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit" name="addhsluong" class="btn btn-primary">
                                                        Thêm
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- edit -->
                            <div class="modal fade" id="editSalaryModal" tabindex="-1"
                                aria-labelledby="editSalaryModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editSalaryModalLabel">
                                                Edit salary
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form role="form" action="edit.php?action=editsalary" method="post">
                                            <div class="modal-body">
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="staffid"
                                                            placeholder="Staff ID" aria-label="Username"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="hesoluong"
                                                            placeholder="He so luong" aria-label="Username"
                                                            aria-describedby="basic-addon1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Hủy
                                                </button>
                                                <button type="submit" class="btn btn-primary">lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- delete -->
                            <div class="modal fade" id="deleteSalaryModal" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteSalaryModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" action="delete.php?action=deletesalary" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteSalaryModalLabel">Delete Salary
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="deletesalary_id" id="deletesalary_id"
                                                    value="">
                                                <h4> Do you want to Delete this Data ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="deletedata"
                                                    class="btn btn-primary">OK</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- show data -->
                            <?php
                            $sql = "SELECT COUNT(StaffID) AS total FROM soefficientsalary";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $total_records = $row['total'];

                            $current_page = isset($_GET['pagesalary']) ? $_GET['pagesalary'] : 1;
                            $limit = 3;

                            $total_page = ceil($total_records / $limit);

                            if ($current_page > $total_page) {
                                $current_page = $total_page;
                            } else if ($current_page < 1) {
                                $current_page = 1;
                            }

                            $start = ($current_page - 1) * $limit;
                            $prev_page = $current_page - 1;
                            $next_page = $current_page + 1;

                            $soefficientsalarydata = mysqli_query(
                                $conn,
                                "SELECT devloper.StaffID,devloper.level, soefficientsalary.hesoluong FROM devloper 
                            INNER JOIN soefficientsalary ON devloper.StaffID = soefficientsalary.StaffID 
                            UNION ALL SELECT manager.StaffID,manager.level, soefficientsalary.hesoluong 
                            FROM manager INNER JOIN soefficientsalary ON manager.StaffID = soefficientsalary.StaffID 
                            LIMIT $start, $limit"
                            );
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
                                            <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                                data-bs-target='#editSalaryModal'>
                                                Sửa
                                            </button>
                                            <button type='button' class='btn btn-danger' data-bs-toggle='modal'
                                                data-bs-target='#deleteSalaryModal'
                                                onclick='deleteSalary(<?php echo $row["StaffID"] ?>)'>
                                                Xóa
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan=' 4'>
                                            <nav aria-label='Page navigation panigation'>
                                                <ul class='pagination'>
                                                    <?php

                                                    if ($current_page > 1 && $total_page > 1) {
                                                        echo "<li class='page-item'>
                                                                <a class='page-link'href='quanly.php?pagesalary=$prev_page'>Prev</a>
                                                        </li>";
                                                    }

                                                    for ($i = 1; $i <= $total_page; $i++) {
                                                        if ($i == $current_page) {
                                                            echo "<li class='page-item active'>
                                                            <a class='page-link' href='quanly.php?pagesalary=$i'>$i</a>
                                                        </li>";
                                                        } else {
                                                            echo "<li class='page-item'>
                                                            <a class='page-link' href='quanly.php?pagesalary=$i'>$i</a>
                                                        </li>";
                                                        }
                                                    }

                                                    if ($current_page < $total_page && $total_page > 1) {
                                                        echo "<li class='page-item'>
                                                                <a class='page-link'href='quanly.php?pagesalary=$next_page'>Next</a>
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
                    </div>
                    <div class="tab-pane fade" id="thongke" role="tabpanel" aria-labelledby="thongke-tab">
                        <div class="table-bg">
                            <!-- show data -->
                            <?php
                            $sql = "SELECT COUNT(StaffID) AS total FROM staff";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $total_records = $row['total'];

                            $current_page = isset($_GET['pagethongke']) ? $_GET['pagethongke'] : 1;
                            $limit = 3;

                            $total_page = ceil($total_records / $limit);

                            if ($current_page > $total_page) {
                                $current_page = $total_page;
                            } else if ($current_page < 1) {
                                $current_page = 1;
                            }

                            $start = ($current_page - 1) * $limit;
                            $prev_page = $current_page - 1;
                            $next_page = $current_page + 1;

                            // sort
                            $columns = array('ten', 'luong', 'sogio');

                            $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

                            $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
                            // 

                            $thongke = mysqli_query($conn, "SELECT staff.ten,work.sogio, 
                            staff.luongcoban + (work.sogio * 50.000) * soefficientsalary.hesoluong AS 'luong' 
                            FROM Staff 
                            INNER JOIN devloper on Staff.StaffID = devloper.StaffID 
                            INNER JOIN work ON devloper.StaffID = work.staffID 
                            INNER JOIN soefficientsalary on devloper.StaffID = soefficientsalary.StaffID 
                            UNION ALL SELECT staff.ten,work.sogio, staff.luongcoban + (work.sogio) * (30.000 + 50.000 * soefficientsalary.hesoluong) AS 'luong' 
                            FROM Staff 
                            INNER JOIN manager on Staff.StaffID = manager.StaffID 
                            INNER JOIN work ON manager.StaffID = work.staffID 
                            INNER JOIN soefficientsalary on manager.StaffID = soefficientsalary.StaffID
                            ORDER BY $column $sort_order
                            LIMIT $start, $limit");
                            ?>

                            <!-- sort -->
                            <?php
                            if ($thongke) {
                                // Some variables we need for the table.
                                $up_or_down = str_replace(array('ASC', 'DESC'), array('up', 'down'), $sort_order);
                                $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
                                $add_class = ' class="highlight"';
                            ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="quanly.php?column=ten&order=<?php echo $asc_or_desc; ?>">Tên
                                                nhân viên <i class="fas fa-sort"></i></a>
                                        </th>
                                        <th>
                                            <a href="quanly.php?column=luong&order=<?php echo $asc_or_desc; ?>">Lương 1
                                                tháng <i class="fas fa-sort"></i></a>
                                        </th>
                                        <th>
                                            <a href="quanly.php?column=sogio&order=<?php echo $asc_or_desc; ?>">Số giờ
                                                <i class="fas fa-sort"></i></a>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($thongke)) { ?>
                                    <tr>
                                        <td <?php echo $column == 'ten' ? $add_class : ''; ?>>
                                            <?php echo $row["ten"] ?>
                                        </td>
                                        <td <?php echo $column == 'luong' ? $add_class : ''; ?>>
                                            <?php echo $row["luong"] ?></td>
                                        <td <?php echo $column == 'sogio' ? $add_class : ''; ?>>
                                            <?php echo $row["sogio"] ?></td>
                                    </tr>

                                    <?php } ?>
                                    <tr>
                                        <td colspan='3'>
                                            <nav aria-label='Page navigation panigation'>
                                                <ul class='pagination'>
                                                    <?php
                                                        if ($current_page > 1 && $total_page > 1) {

                                                            echo "<li class='page-item'>
                                                                <a class='page-link'href='quanly.php?pagethongke=$prev_page'>Prev</a>
                                                        </li>";
                                                        }

                                                        for ($i = 1; $i <= $total_page; $i++) {
                                                            if ($i == $current_page) {
                                                                echo "<li class='page-item active'>
                                                            <a class='page-link' href='quanly.php?pagethongke=$i'>$i</a>
                                                        </li>";
                                                            } else {
                                                                echo "<li class='page-item'>
                                                            <a class='page-link' href='quanly.php?pagethongke=$i'>$i</a>
                                                        </li>";
                                                            }
                                                        }

                                                        if ($current_page < $total_page && $total_page > 1) {

                                                            echo "<li class='page-item'>
                                                                <a class='page-link'href='quanly.php?pagethongke=$next_page'>Next</a>
                                                        </li>";
                                                        }
                                                        ?>
                                                </ul>
                                            </nav>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                                // $thongke->free(); 
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>

<script>
let workId = document.querySelector('#deletework_id');
let salaryId = document.querySelector('#deletesalary_id');
let devId = document.querySelector('#deletedev_id');
let managerId = document.querySelector('#deletemanager_id');


function deleteWork(id) {
    workId.value = id;
};

function deleteSalary(id) {
    salaryId.value = id;
};

function deleteDev(id) {
    devId.value = id;
    console.log(devId.value);
};

function deleteManager(id) {
    managerId.value = id;
};
</script>