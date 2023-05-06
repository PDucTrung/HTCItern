<table class="table table-bordered border-dark mt-5">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Tuổi</th>
            <th>Số năm kinh nghiệm</th>
            <th>Tháng</th>
            <th>Năm</th>
            <th>Số giờ</th>
            <th>Lương cơ bản</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($arr_work as $work) {
        ?>
            <tr>
                <td><?php echo $work->name_worker ?></td>
                <td><?php echo $work->address ?></td>
                <td><?php echo $work->age_worker ?></td>
                <td><?php echo $work->number_year_exp ?></td>
                <td><?php echo $work->month ?></td>
                <td><?php echo $work->year ?></td>
                <td><?php echo $work->number_hour ?></td>
                <td><?php echo $work->bassic_pay ?></td>
            </tr>
        <?php } ?>
    </tbody>

</table>