<?php

class Database {

    private $host;
    private $username;
    private $password;
    private $dbname;
    private $dbport;
    private $db;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'vex-db';
        $this->username = 'root';
        $this->password = 'root';
        $this->dbport = 3306;
        date_default_timezone_set('Europe/Vilnius');

    }

    public function connect() {
        $this->db = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->dbname,
            $this->dbport
        );

    }

    public function hasErrors() {
        if ($this->db->connect_error) {
            throw new Exception($this->db->connect_error);
        }
    }

    public function select($table, $fields = '*', $where = ' ') {
        if (is_array($fields)) {
            $fields = implode(',', $fields);
        }
        if (is_array($where)) {
            $where = array_map(function($val) {
                return "'$val'";
            }, $where);
            $where = ' WHERE '.$this->querify($where, ' AND ');
        }
        $query = sprintf('SELECT %s FROM %s %s', $fields, $table, $where);
        return $this->query($query);
    }

    public function insert($table, $fields) {
        $columns = implode(',', array_keys($fields));
        $values = implode(',', array_map(function($val) {
            return "'$val'";
        },array_values($fields)));
        $query = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, $columns, $values);
        $this->query($query);
        return $this->db->insert_id;
    }

    public function update($table, $fields, $where = '') {
        $values = $this->querify($fields);
        if (is_array($where)) {
            $where = ' WHERE '.$this->querify($where, ' AND');
        }
        $query = sprintf('UPDATE %s SET %s %s', $table, $values, $where);
        return $this->query($query);
    }

    public function delete($table, array $where) {
        $where = ' WHERE '.$this->querify($where, ' AND');
        $query = sprintf('DELETE FROM %s %s', $table, $where);
        return $this->query($query);
    }

    public function close() {
        $this->db->close();
    }

    public function query($query) {
        echo $query;
        $this->connect();
        $result = $this->db->query($query);
        $this->close();
        $this->hasErrors();
        return $result;
    }
    
    private function querify($fields, $glue = ',') {
        $values = [];
        foreach($fields as $key => $value) {
            $values[] = $key . '=' . $value;
        }
        $values = implode($glue, $values);
        return $values;
    }
}


