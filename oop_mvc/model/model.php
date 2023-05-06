<?php

class model
{
    public function fetch($sql)
    {
        global $con;

        $result = mysqli_query($con, $sql);

        $arr = array();
        while ($rows = mysqli_fetch_object($result))
            $arr[] = $rows;
        return $arr;
    }

    // duyet 1 ban ghi
    public function fetch_one($sql)
    {
        global $con;

        $result = mysqli_query($con, $sql);

        $rows = mysqli_fetch_object($result);
        return $rows;
    }

    // truy van sql
    public function execute($sql)
    {
        global $con;

        mysqli_query($con, $sql);
    }

    // check
    public function check($table, $rows = "*", $where = null)
    {
        global $con;

        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        return mysqli_query($con, $sql);
    }

    // method get min value column of table
    public function min($table, $column)
    {
        global $con;

        $sql = mysqli_query($con, "SELECT MIN($table.$column) AS min FROM $table");

        $row = mysqli_fetch_assoc($sql);

        return $row['min'];
    }

    // method get max value column of table
    public function max($table, $column)
    {
        global $con;

        $sql = mysqli_query($con, "SELECT MAX($table.$column) AS max FROM $table");

        $row = mysqli_fetch_assoc($sql);

        return $row['max'];
    }

    // dem so ban ghi
    public function count($sql)
    {
        global $con;

        $result = mysqli_query($con, $sql);

        return mysqli_num_rows($result);
    }
}
