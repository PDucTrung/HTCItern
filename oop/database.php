<?php

class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'qlns';
    protected $conn = NULL;
    private $result = [];

    // connect database method
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->pass, $this->dbname);
        if (!$this->conn) {
            echo "kết nối thất bại";
            exit();
        } else {
            mysqli_set_charset($this->conn, 'utf8');
        }
        return $this->conn;
    }

    // method execute query statement
    public function execute($sql)
    {
        $this->result = $this->conn->query($sql);
        return $this->result;
    }

    // method select
    public function select($table, $rows = "*", $where = null)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        return $this->execute($sql);
    }

    // method check id
    public function check_id($table, $rows = "*", $where = null)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        return mysqli_query($this->conn, $sql);
    }

    // create method
    public function insert($table, $para = [])
    {
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql = "INSERT INTO $table($table_columns) VALUES('$table_value')";

        return $this->execute($sql);
    }

    // update method
    public function update($table, $para = [], $id)
    {
        $args = [];

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(',', $args);
        $sql .= " WHERE $id";

        return $this->execute($sql);
    }

    // delete method
    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table";
        $sql .= " WHERE $id ";

        return $this->execute($sql);
    }

    // dem so ban ghi
    public function total_records($table)
    {
        $sql = "SELECT COUNT(StaffID) AS total FROM $table";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    // total page
    public function get_total_page($table, $limit)
    {
        return ceil(($this->total_records($table)) / $limit);
    }

    // get data and pagination
    public function get_data($table, $current_page, $limit)
    {
        $total_page = $this->get_total_page($table, $limit);
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        $start = ($current_page - 1) * $limit;

        switch ($table) {
            case 'devloper':
                $sql = "SELECT devloper.StaffID,staff.ten,staff.tuoi,staff.diachi,staff.ngaysinh,staff.namkinhnghiem,staff.luongcoban,devloper.language,devloper.level, 
                        staff.luongcoban + (work.sogio * 50000) * soefficientsalary.hesoluong AS 'luong' 
                        FROM Staff INNER JOIN devloper on Staff.StaffID = devloper.StaffID 
                        INNER JOIN work ON devloper.StaffID = work.StaffID 
                        INNER JOIN soefficientsalary on devloper.StaffID = soefficientsalary.StaffID";
                break;

            case 'manager':
                $sql = "SELECT manager.StaffID,staff.ten,staff.tuoi,staff.diachi,staff.ngaysinh,staff.namkinhnghiem,staff.luongcoban,manager.level, 
                        staff.luongcoban + (work.sogio) * (30000 + 50000 * soefficientsalary.hesoluong) AS 'luong' 
                        FROM Staff INNER JOIN manager on Staff.StaffID = manager.StaffID 
                        INNER JOIN work ON manager.StaffID = work.StaffID 
                        INNER JOIN soefficientsalary on manager.StaffID = soefficientsalary.StaffID";
                break;

            case 'work':
                $sql = "SELECT * FROM work";
                break;

            case 'soefficientsalary':
                $sql = "SELECT devloper.StaffID,devloper.level, soefficientsalary.hesoluong FROM devloper 
                        INNER JOIN soefficientsalary ON devloper.StaffID = soefficientsalary.StaffID 
                        UNION ALL SELECT manager.StaffID,manager.level, soefficientsalary.hesoluong 
                        FROM manager INNER JOIN soefficientsalary ON manager.StaffID = soefficientsalary.StaffID";
                break;
        }

        $data = mysqli_query($this->conn, "$sql LIMIT $start, $limit");
        return $data;
    }

    // method get min value column of table
    public function min($table, $column)
    {
        $sql = mysqli_query($this->conn, "SELECT MIN($table.$column) AS timemin FROM $table");

        $row = mysqli_fetch_assoc($sql);

        return $row['timemin'];
    }

    // method get max value column of table
    public function max($table, $column)
    {
        $sql = mysqli_query($this->conn, "SELECT MAX($table.$column) AS timemax FROM $table");

        $row = mysqli_fetch_assoc($sql);

        return $row['timemax'];
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}

include "thongke.php";
