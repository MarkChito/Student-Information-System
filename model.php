<?php

class Model
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "student_information_system";
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        $this->initialize_database();
    }

    public function initialize_database()
    {
        $sql = "CREATE DATABASE IF NOT EXISTS {$this->database}";

        if (!$this->conn->query($sql)) {
            die("Database creation failed: " . $this->conn->error);
        }

        $this->conn->select_db($this->database);

        $this->create_user_table();
        $this->create_student_table();
        $this->create_school_branches_table();
        $this->insert_admin_data();
    }

    private function create_student_table()
    {
        $table = "
            CREATE TABLE IF NOT EXISTS `students` (
                `id` int(11) auto_increment primary key,
                `created_at` varchar(19) NOT NULL,
                `login_id` int(11) NOT NULL,
                `student_number` varchar(30) NOT NULL,
                `first_name` varchar(30) NOT NULL,
                `middle_name` varchar(30) NOT NULL,
                `last_name` varchar(30) NOT NULL,
                `email` varchar(30) NOT NULL,
                `mobile_number` varchar(11) NOT NULL,
                `address` text NOT NULL,
                `school_branch` varchar(100) NOT NULL,
                `course` varchar(30) NOT NULL,
                `year` varchar(10) NOT NULL,
                `section` varchar(1) NOT NULL
            )
        ";

        if (!$this->conn->query($table)) {
            die("Table creation failed: " . $this->conn->error);
        }
    }

    private function create_user_table()
    {
        $table = "
            CREATE TABLE IF NOT EXISTS `users` (
                `id` int(11) auto_increment primary key,
                `created_at` varchar(19) NOT NULL,
                `name` varchar(30) NOT NULL,
                `username` varchar(30) NOT NULL,
                `password` varchar(255) NOT NULL,
                `user_type` varchar(7) NOT NULL
            )
        ";

        if (!$this->conn->query($table)) {
            die("Table creation failed: " . $this->conn->error);
        }
    }
    
    private function create_school_branches_table()
    {
        $table = "
            CREATE TABLE IF NOT EXISTS `school_branches` (
                `id` int(11) auto_increment primary key,
                `created_at` varchar(19) NOT NULL,
                `name` varchar(30) NOT NULL,
                `address` text NOT NULL
            )
        ";

        if (!$this->conn->query($table)) {
            die("Table creation failed: " . $this->conn->error);
        }
    }

    private function insert_admin_data()
    {
        $admin_check_sql = "SELECT COUNT(*) as count FROM `users` WHERE `id` = 1";
        $result = $this->query($admin_check_sql);
        $count = $result->fetch_assoc()['count'];

        if ($count == 0) {
            date_default_timezone_set('Asia/Manila');

            $current_date = date('Y-m-d H:i:s');

            $data = array(
                "created_at" => $current_date,
                "name" => "Administrator",
                "username" => "admin",
                "password" => password_hash("admin123", PASSWORD_BCRYPT),
                "user_type" => "admin",
            );

            $this->insert("users", $data);
        }
    }

    public function query($sql)
    {
        $result = $this->conn->query($sql);

        return $result;
    }

    public function fetch($sql)
    {
        $result = $this->query($sql);

        $row = $result->fetch_assoc();

        return $row;
    }

    public function fetchAll($sql)
    {
        $result = $this->query($sql);

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function insert($table, $data)
    {
        $fields = implode(", ", array_keys($data));

        $values = implode("', '", array_map(array($this, 'escapeString'), array_values($data)));

        $sql = "INSERT INTO $table ($fields) VALUES ('$values')";

        return $this->query($sql);
    }

    public function update($table, $data, $where)
    {
        $setValues = '';

        foreach ($data as $key => $value) {
            $setValues .= "$key = '" . $this->escapeString($value) . "', ";
        }

        $setValues = rtrim($setValues, ', ');

        $sql = "UPDATE $table SET $setValues WHERE $where";

        return $this->query($sql);
    }

    public function delete($table, $where)
    {
        $sql = "DELETE FROM $table WHERE $where";

        return $this->query($sql);
    }

    public function escapeString($string)
    {
        return $this->conn->real_escape_string($string);
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}
