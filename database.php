<?php
class Database
{
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct()
    {
        $this->getConfig();
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->db_name
        );

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    private function getConfig()
    {
        include(__DIR__ . "/../config.php");
        $this->host     = $config['host'];
        $this->user     = $config['username'];
        $this->password = $config['password'];
        $this->db_name  = $config['db_name'];
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function insert($table, $data)
    {
        foreach ($data as $key => $val) {
            $column[] = $key;
            $value[]  = "'$val'";
        }

        $column = implode(",", $column);
        $value  = implode(",", $value);

        $sql = "INSERT INTO $table ($column) VALUES ($value)";
        return $this->conn->query($sql);
    }

    public function update($table, $data, $where)
    {
        foreach ($data as $key => $val) {
            $set[] = "$key='$val'";
        }

        $set = implode(",", $set);
        $sql = "UPDATE $table SET $set WHERE $where";
        return $this->conn->query($sql);
    }
}
