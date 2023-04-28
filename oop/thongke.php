<?php

class thongke extends Database
{
    // thong ke
    // get total page thong ke
    public function get_total_page_thongke($search, $limit, $valuestart, $valueend)
    {
        switch ($search) {
            case "sogio":
                $sql = "SELECT COUNT(*) AS total FROM
                (SELECT staff.ten,work.sogio, 
                staff.luongcoban + (work.sogio * 50.000) * soefficientsalary.hesoluong AS 'luong' 
                FROM Staff 
                INNER JOIN devloper on Staff.StaffID = devloper.StaffID 
                INNER JOIN work ON devloper.StaffID = work.staffID 
                INNER JOIN soefficientsalary on devloper.StaffID = soefficientsalary.StaffID 
                UNION ALL 
                SELECT staff.ten,work.sogio, staff.luongcoban + (work.sogio) * (30.000 + 50.000 * soefficientsalary.hesoluong) AS 'luong' 
                FROM Staff 
                INNER JOIN manager on Staff.StaffID = manager.StaffID 
                INNER JOIN work ON manager.StaffID = work.staffID 
                INNER JOIN soefficientsalary on manager.StaffID = soefficientsalary.StaffID)
                as thongke 
                WHERE thongke.sogio BETWEEN $valuestart AND $valueend";
                break;
            case "luong":
                $sql = "SELECT COUNT(*) AS total FROM
                (SELECT staff.ten,work.sogio, 
                staff.luongcoban + (work.sogio * 50.000) * soefficientsalary.hesoluong AS 'luong' 
                FROM Staff 
                INNER JOIN devloper on Staff.StaffID = devloper.StaffID 
                INNER JOIN work ON devloper.StaffID = work.staffID 
                INNER JOIN soefficientsalary on devloper.StaffID = soefficientsalary.StaffID 
                UNION ALL 
                SELECT staff.ten,work.sogio, staff.luongcoban + (work.sogio) * (30.000 + 50.000 * soefficientsalary.hesoluong) AS 'luong' 
                FROM Staff 
                INNER JOIN manager on Staff.StaffID = manager.StaffID 
                INNER JOIN work ON manager.StaffID = work.staffID 
                INNER JOIN soefficientsalary on manager.StaffID = soefficientsalary.StaffID)
                as thongke 
                WHERE thongke.luong BETWEEN $valuestart AND $valueend";
                break;
        }

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total = ceil($row['total'] / $limit);
        return $total;
    }

    // get data thong ke
    public function thongke($current_page, $limit, $column, $sort_order, $valuestart, $valueend, $search)
    {
        $total_page = $this->get_total_page_thongke($search, $limit, $valuestart, $valueend);
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        $start = ($current_page - 1) * $limit;

        switch ($search) {
            case "sogio":
                $sql = "SELECT * FROM
                (SELECT staff.ten,work.sogio, 
                staff.luongcoban + (work.sogio * 50.000) * soefficientsalary.hesoluong AS 'luong' 
                FROM Staff 
                INNER JOIN devloper on Staff.StaffID = devloper.StaffID 
                INNER JOIN work ON devloper.StaffID = work.staffID 
                INNER JOIN soefficientsalary on devloper.StaffID = soefficientsalary.StaffID 
                UNION ALL 
                SELECT staff.ten,work.sogio, staff.luongcoban + (work.sogio) * (30.000 + 50.000 * soefficientsalary.hesoluong) AS 'luong' 
                FROM Staff 
                INNER JOIN manager on Staff.StaffID = manager.StaffID 
                INNER JOIN work ON manager.StaffID = work.staffID 
                INNER JOIN soefficientsalary on manager.StaffID = soefficientsalary.StaffID)
                as thongke 
                WHERE thongke.sogio BETWEEN $valuestart AND $valueend";
                break;
            case "luong":
                $sql = "SELECT * FROM
                (SELECT staff.ten,work.sogio, 
                staff.luongcoban + (work.sogio * 50.000) * soefficientsalary.hesoluong AS 'luong' 
                FROM Staff 
                INNER JOIN devloper on Staff.StaffID = devloper.StaffID 
                INNER JOIN work ON devloper.StaffID = work.staffID 
                INNER JOIN soefficientsalary on devloper.StaffID = soefficientsalary.StaffID 
                UNION ALL 
                SELECT staff.ten,work.sogio, staff.luongcoban + (work.sogio) * (30.000 + 50.000 * soefficientsalary.hesoluong) AS 'luong' 
                FROM Staff 
                INNER JOIN manager on Staff.StaffID = manager.StaffID 
                INNER JOIN work ON manager.StaffID = work.staffID 
                INNER JOIN soefficientsalary on manager.StaffID = soefficientsalary.StaffID)
                as thongke 
                WHERE thongke.luong BETWEEN $valuestart AND $valueend";
                break;
        }

        $data = mysqli_query($this->conn, "$sql ORDER BY $column $sort_order LIMIT $start, $limit");
        return $data;
    }
}
