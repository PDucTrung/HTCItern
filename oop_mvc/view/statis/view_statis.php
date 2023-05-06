<table class="table table-bordered border-dark mt-5">
    <?php if (count($arr_worker) > 0) { ?>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Nhân Viên</th>
                <th>Giờ làm việc</th>
                <th>Lương 1 tháng</th>
                <th>Hệ số</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt = 0;
            foreach ($arr_worker as $worker) {
                $stt++;
            ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $worker->getName(); ?></td>
                    <td><?php echo $worker->getHourDo(); ?></td>
                    <td><?php echo $worker->calculatePay(); ?></td>
                    <td><?php echo $worker->getNoun(); ?></td>
                    <td>
                        <a class="btn btn-info" type="button" href="index.php?controller=detail_statis&month=<?php echo $month ?>&year=<?php echo $year ?>&id_worker=<?php echo $worker->getId(); ?>">Chi tiết</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8">
                    <ul class="pagination m-auto">
                        <?php
                        $prev_page = $page - 1;
                        $next_page = $page + 1;
                        $slug = "month=$month&year=$year&sort=$sort&minhour=$start&maxhour=$end";
                        //  nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($page > 1 && $number_page > 1) {
                            echo "<li class='page-item'><a class='page-link' href='index.php?controller=statis&page=$prev_page&$slug'>Prev</a></li>";
                        }

                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $number_page; $i++) {
                            if ($i == $page) {
                                echo "<li class='page-item active'><a class='page-link' href='index.php?controller=statis&page=$i&$slug'>$i</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link' href='index.php?controller=statis&page=$i&$slug'>$i</a></li>";
                            }
                        }

                        // nếu current_page < $total_page và total_page> 1 mới hiển thi next
                        if ($page < $number_page && $number_page > 1) {
                            echo "<li class='page-item'><a class='page-link' href='index.php?controller=statis&page=$next_page&$slug'>Next</a></li>";
                        } ?>
                    </ul>
                </td>
            </tr>
        </tfoot>
    <?php  } else {
        echo "<div class='alert alert-warning'>You Have No Record!</div>";
    } ?>
</table>