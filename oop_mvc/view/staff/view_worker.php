<div>
    <h4 class="text-center">Quản lý nhân viên</h4>
    <a type="button" class="btn btn-primary" href="index.php?controller=action_worker&act=add">Thêm nhân viên</a>
    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>Họ tên</th>
                <th>Địa Chỉ</th>
                <th>Ngày sinh</th>
                <th>Kinh nghiệm</th>
                <th>Loại nhân viên</th>
                <th>Level</th>
                <th>Lương cơ bản</th>
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
                    <td><?php echo $worker->getAddress(); ?></td>
                    <td><?php echo date("d/m/Y", strtotime($worker->getBirthDay())); ?></td>
                    <td><?php echo $worker->getYearExp(); ?></td>
                    <td><?php echo $worker->getTypeWorker(); ?></td>
                    <td><?php echo $worker->getLevel(); ?></td>
                    <td><?php echo $this->model->convert_to_vnd($worker->getBasicPay()); ?></td>
                    <td>
                        <a class="btn btn-info" type="button" href="index.php?controller=action_hour_do&act=add&id_worker=<?php echo $worker->getId(); ?>">Thêm giờ làm</a>
                        <a class="btn btn-success" type="button" href="index.php?controller=detail_worker&id_worker=<?php echo $worker->getId(); ?>">Chi tiết</a>
                        <a class="btn btn-danger" type="button" href="index.php?controller=action_worker&act=delete&id_worker=<?php echo $worker->getId(); ?>" onclick="return confirm('Bạn có chắc muốn xóa nhân viên <?php echo $worker->getName(); ?> ?')">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="9">
                    <ul class="pagination m-auto">
                        <?php
                        $prev_page = $page - 1;
                        $next_page = $page + 1;

                        //  nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($page > 1 && $number_page > 1) {
                            echo "<li class='page-item'><a class='page-link' href='index.php?controller=worker&page=$prev_page'>Prev</a></li>";
                        }

                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $number_page; $i++) {
                            if ($i == $page) {
                                echo "<li class='page-item active'><a class='page-link' href='index.php?controller=worker&page=$i'>$i</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link' href='index.php?controller=worker&page=$i'>$i</a></li>";
                            }
                        }

                        // nếu current_page < $total_page và total_page> 1 mới hiển thi next
                        if ($page < $number_page && $number_page > 1) {
                            echo "<li class='page-item'><a class='page-link'href='index.php?controller=worker&page=$next_page'>Next</a></li>";
                        } ?>
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
</div>