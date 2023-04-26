<div class="table-bg">
    <div class="sreach-box">
        <form action="search.php?action=luong" method="post">
            <div class="d-flex gap-3 align-items-center">
                <div><strong>Lọc theo mức lương</strong></div>
                <input type="number" value="" class="form-control ip-search" name="valuestart" aria-label="Amount (to the nearest dollar)">
                <div>To</div>
                <input type="number" value="" class="form-control ip-search" name="valueend" aria-label="Amount (to the nearest dollar)">
                <button class="btn btn-primary" type="submit" name="search">Search</button>
            </div>

        </form>
    </div>
    <!-- show data -->
    <?php
    include "page.php"
    ?>

    <!-- sort -->
    <?php
    if ($thongke) {
        // $up_or_down = str_replace(array('ASC', 'DESC'), array('up', 'down'), $sort_order);
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
                        <a href="quanly.php?column=luong&order=<?php echo $asc_or_desc; ?>">Lương
                            1
                            tháng <i class="fas fa-sort"></i></a>
                    </th>
                    <th>
                        <a href="quanly.php?column=sogio&order=<?php echo $asc_or_desc; ?>">Số
                            giờ
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
                <?php mysqli_free_result($thongke) ?>
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
    <?php } ?>
</div>