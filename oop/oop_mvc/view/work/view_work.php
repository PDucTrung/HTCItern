<div>
    <h4 class="text-center"><?php echo isset($work) ? $work->getName() : ""; ?></h4>
    <table class="table table-striped mt-5">
        <?php if (count($arr_work) > 0) { ?>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Số giờ làm</th>
                    <th>Tháng</th>
                    <th>Năm</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 0;
                foreach ($arr_work as $work) {
                    $stt++;
                ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $work->getHourDo(); ?></td>
                        <td><?php echo $work->getMonthDo(); ?></td>
                        <td><?php echo $work->getYearDo(); ?></td>
                        <td>
                            <a class="btn btn-success" type="button" href="index.php?controller=action_hour_do&act=edit&id_work=<?php echo $work->getId(); ?>&name_worker=<?php echo $work->getName(); ?>">Sửa</a>
                            <a class="btn btn-danger" type="button" href="index.php?controller=action_hour_do&act=delete&id_work=<?php echo $work->getId(); ?>&name_worker=<?php echo $work->getName(); ?>" onclick="return confirm('Bạn có chắc muốn xóa số giờ làm tháng <?php echo $work->getMonthDo(); ?> năm <?php echo $work->getYearDo(); ?> của nhân viên <?php echo $work->getName(); ?> ?')">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">
                        <ul class="pagination m-auto">
                            <?php
                            $prev_page = $page - 1;
                            $next_page = $page + 1;
                            $slug = "name_worker=$name";

                            //  nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                            if ($page > 1 && $number_page > 1) {
                                echo "<li class='page-item'><a class='page-link' href='index.php?controller=work&page=$prev_page&$slug'><i class='bi bi-chevron-double-left'></i></a></li>";
                            }

                            // Lặp khoảng giữa
                            for ($i = 1; $i <= $number_page; $i++) {
                                if ($i == $page) {
                                    echo "<li class='page-item active'><a class='page-link' href='index.php?controller=work&page=$i&$slug'>$i</a></li>";
                                } else {
                                    echo "<li class='page-item'><a class='page-link' href='index.php?controller=work&page=$i&$slug'>$i</a></li>";
                                }
                            }

                            // nếu current_page < $total_page và total_page> 1 mới hiển thi next
                            if ($page < $number_page && $number_page > 1) {
                                echo "<li class='page-item'><a class='page-link'href='index.php?controller=work&page=$next_page&$slug'><i class='bi bi-chevron-double-right'></i></a></li>";
                            } ?>
                        </ul>
                    </td>
                </tr>
            </tfoot>
        <?php  } else {
            echo "<div class='alert alert-warning mt-5'>Không tìm thấy bản ghi nào!</div>";
        } ?>
    </table>
</div>