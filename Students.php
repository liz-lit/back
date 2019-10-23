<?php
class Students{
    private $db_connect;
    public function __construct($db_connect){
        $this->db_connect = $db_connect;
    }
    public function getStudents(){
        $query = 'SELECT * FROM students';
        $result = pg_query($this->db_connect, $query) or die('The request failed: ' . pg_last_error());
        $arr = array();
        while ($row = pg_fetch_row($result)) {
            $arr[] = array("ID" => $row[0], "Name" => $row[1], "Login" => $row[2]);
        }
        return $arr;
    }
    public function insertStudents(){
        $result = pg_insert($this->db_connect, 'students', $_POST);
        return $result;
    }
}