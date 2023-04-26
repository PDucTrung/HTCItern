<?php

class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'qlns';
    public $conn = NULL;
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

    public function __destruct()
    {
        $this->conn->close();
    }
}
