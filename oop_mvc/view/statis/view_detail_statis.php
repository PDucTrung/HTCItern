<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tháng</th>
            <th>Năm</th>
            <th>Số giờ</th>
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
                <td><?php echo $work->month ?></td>
                <td><?php echo $work->year ?></td>
                <td><?php echo $work->number_hour ?></td>
            </tr>
        <?php } ?>
    </tbody>

</table>