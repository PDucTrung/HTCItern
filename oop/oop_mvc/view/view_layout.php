<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRM</title>

    <!-- css external -->
    <link rel="stylesheet" href="public/assets/style.css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">HTC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-auto w-50">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=worker">Nhân Viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=choose_work">Thời gian làm việc</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=choose_statis">Thống kê</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="section_view_table mt-5">
        <div class="container">
            <?php
            if (file_exists($controller)) {
                include_once $controller;
            } else {
                echo "<div class='alert alert-success mt-5 text-center w-75 m-auto'><h4>Welcome to HRM!</h4></div>";
            }
            ?>
        </div>
    </section>

    <footer class="mt-5">
    </footer>

    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>