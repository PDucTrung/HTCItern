<?php
// database
require_once "../database/db_connect.php";

class model
{
    public function execute($sql)
    {
        global $conn;

        mysqli_query($conn, $sql);
    }

    public function fetch($sql)
    {
        global $conn;

        $result = $conn->query($sql);
        $arr = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($arr, $row);
            }
        }

        return $arr;
    }
}
