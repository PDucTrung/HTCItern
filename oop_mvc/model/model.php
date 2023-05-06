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

    // dem so ban ghi
    public function count($sql)
    {
        global $con;
        $result = mysqli_query($con, $sql);

        return mysqli_num_rows($result);
    }
}
