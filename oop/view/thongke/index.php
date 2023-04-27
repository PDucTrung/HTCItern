<div class="table-bg">
    <div class="sreach-box">
        <form action="" method="get">
            <div class="d-flex gap-3 align-items-center">
                <div><strong>Lọc theo Số giờ</strong></div>
                <input type="number" value="<?php echo (isset($_GET["valuestart"]) && $_GET["valuestart"] != "" ? $_GET["valuestart"] : "null") ?>" class="form-control ip-search" name="valuestart">
                <div>To</div>
                <input type="number" value="<?php echo (isset($_GET["valueend"]) && $_GET["valueend"] != "" ? $_GET["valueend"] : "null") ?>" class="form-control ip-search" name="valueend">
                <button class="btn btn-primary" type="submit">Search</button>
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
        $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
        $add_class = ' class="highlight"';
    ?>
        <table>
            <thead>
                <tr>
                    <th>
                        <a href="quanly.php?column=ten&order=<?php echo $asc_or_desc; ?>&pagethongke=<?php echo $current_page; ?>&valuestart=<?php echo $valuestart; ?>&valueend=<?php echo $valueend; ?>">
                            Tên nhân viên
                            <i class="fas fa-sort"></i>
                        </a>
                    </th>
                    <th>
                        <a href="quanly.php?column=luong&order=<?php echo $asc_or_desc; ?>&pagethongke=<?php echo $current_page; ?>&valuestart=<?php echo $valuestart; ?>&valueend=<?php echo $valueend; ?>">Lương
                            1 tháng
                            <i class="fas fa-sort"></i>
                        </a>
                    </th>
                    <th>
                        <a href="quanly.php?column=sogio&order=<?php echo $asc_or_desc; ?>&pagethongke=<?php echo $current_page; ?>&valuestart=<?php echo $valuestart; ?>&valueend=<?php echo $valueend; ?>">
                            Sốgiờ
                            <i class="fas fa-sort"></i>
                        </a>
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
                            <?php echo $row["luong"] ?>
                        </td>
                        <td <?php echo $column == 'sogio' ? $add_class : ''; ?>>
                            <?php echo $row["sogio"] ?>
                        </td>
                    </tr>

                <?php } ?>
                <?php mysqli_free_result($thongke) ?>
                <tr>
                    <td colspan='3'>
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
    <?php } ?>
</div>