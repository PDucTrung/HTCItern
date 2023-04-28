<?php
include 'database.php';
$db = new database();
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
    <link rel="stylesheet" href="assets/style.css" />
</head>

<body>
    <section class="manage">
        <div class="container">
            <h2 class="text-center">Quản lý nhân sự</h2>
            <br />
            <div class="manage-content">
                <!-- tabs -->
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
                    <!-- dev -->
                    <div class="tab-pane fade show active" id="dev" role="tabpanel" aria-labelledby="dev-tab">
                        <?php include "view/dev/index.php" ?>
                    </div>

                    <!-- manager -->
                    <div class="tab-pane fade" id="manager" role="tabpanel" aria-labelledby="manager-tab">
                        <?php include "view/manager/index.php" ?>
                    </div>

                    <!-- work -->
                    <div class="tab-pane fade" id="work" role="tabpanel" aria-labelledby="contact-tab">
                        <?php include "view/work/index.php" ?>
                    </div>

                    <!-- salary -->
                    <div class="tab-pane fade" id="salary" role="tabpanel" aria-labelledby="salary-tab">
                        <?php include "view/salary/index.php" ?>
                    </div>

                    <!-- thong ke -->
                    <div class="tab-pane fade" id="thongke" role="tabpanel" aria-labelledby="thongke-tab">
                        <?php include "view/thongke/index.php" ?>
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
// delete get id

function del(id, action) {
    let deleteId = document.querySelector('#' + action);
    deleteId.value = id;
};

// edit get id

function edit(id, action) {
    let editId = document.querySelector('#' + action);
    editId.value = id;
};
</script>