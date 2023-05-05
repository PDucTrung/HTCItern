<?php
class thongke extends Database
{
    public $data_sql;
    public $limit = 3;
    public $total_page;
    // thong ke
    // get total page thong ke
    public function __construct()
    {
        parent::__construct();
        $sql = "SELECT staff.ten,work.sogio, 
        staff.luongcoban + (work.sogio * 50000) * soefficientsalary.hesoluong AS 'luong' 
        FROM Staff 
        INNER JOIN devloper on Staff.StaffID = devloper.StaffID 
        INNER JOIN work ON devloper.StaffID = work.staffID 
        INNER JOIN soefficientsalary on devloper.StaffID = soefficientsalary.StaffID 
        UNION ALL 
        SELECT staff.ten,work.sogio, staff.luongcoban + (work.sogio) * (30000 + 50000 * soefficientsalary.hesoluong) AS 'luong' 
        FROM Staff 
        INNER JOIN manager on Staff.StaffID = manager.StaffID 
        INNER JOIN work ON manager.StaffID = work.staffID 
        INNER JOIN soefficientsalary on manager.StaffID = soefficientsalary.StaffID";
        $this->data_sql = $sql;
    }

    // get min luong
    public function min_salary()
    {
        $sql = mysqli_query($this->conn, "SELECT MIN(luong) AS salarymin FROM ($this->data_sql) AS thongke");

        $row = mysqli_fetch_assoc($sql);

        return $row['salarymin'];
    }

    // get max luong
    public function max_salary()
    {
        $sql = mysqli_query($this->conn, "SELECT MAX(luong) AS salarymax FROM ($this->data_sql) AS thongke");

        $row = mysqli_fetch_assoc($sql);

        return $row['salarymax'];
    }

    public function get_total_page_thongke($search, $valuestart, $valueend)
    {
        switch ($search) {
            case "sogio":
                $sql = "SELECT COUNT(*) AS total FROM
                ($this->data_sql)
                as thongke 
                WHERE thongke.sogio BETWEEN $valuestart AND $valueend";
                break;
            case "luong":
                $sql = "SELECT COUNT(*) AS total FROM
                ($this->data_sql)
                as thongke 
                WHERE thongke.luong BETWEEN $valuestart AND $valueend";
                break;
        }

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $this->total_page = ceil($row['total'] / $this->limit);
        if ($row['total'] == 0) {
            return 1;
        } else
            return $this->total_page;
    }

    // get data thong ke
    public function thongke($current_page, $column, $sort_order, $valuestart, $valueend, $search)
    {
        $total_page = $this->total_page;
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        $start = ($current_page - 1) * $this->limit;

        switch ($search) {
            case "sogio":
                $sql = "SELECT * FROM
                ($this->data_sql)
                as thongke 
                WHERE thongke.sogio BETWEEN $valuestart AND $valueend";
                break;
            case "luong":
                $sql = "SELECT * FROM
                ($this->data_sql)
                as thongke 
                WHERE thongke.luong BETWEEN $valuestart AND $valueend";
                break;
        }

        $data = mysqli_query($this->conn, "$sql ORDER BY $column $sort_order LIMIT $start, $this->limit");
        return $data;
    }
}
