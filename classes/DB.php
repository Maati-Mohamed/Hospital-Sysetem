<?php
class DB 
{
    private static $instance = null;
    private $pdo,
            $query,
            $error = false,
            $results,
            $count = 0;

    private function __construct(){
        try{
            $this->pdo = new PDO ('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'),Config::get('mysql/username'),Config::get('mysql/password'));
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new DB();
        }
        return self::$instance;
       
    }
    public function query($sql,$params = array()) {
        $this->error = false;
        if($this->query = $this->pdo->prepare($sql)){
            $x = 1;
            if(count($params)) {
                foreach($params as $param) {
                    $this->query->bindValue($x,$param);
                    $x++;
                }
            }
            if($this->query->execute()) {
                $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
                $this->count   = $this->query->rowCount();
                
            } else {
                $this->error = true;
            }
        }
        return $this;
    }
    public function getAllFrom($table){
        $sql = "SELECT * FROM {$table}";
        if(!$this->query($sql)->error()){
            return $this;      
        }
        return false;
    }

    public function action($action,$table,$where = array()) {
        if(count($where) === 3) {
            $operators = array('>','<','=','<=','>=');

            $feild    = $where[0];
            $operator = $where[1];
            $value    = $where[2];

            if(in_array($operator,$operators)) {
                $sql = "{$action} FROM {$table} WHERE {$feild} {$operator} ?";

                if(!$this->query($sql,array($value))->error()) {
                    return $this;
                }
            }
        }
        return false;
    }
    public function get($table,$where){
        return $this->action("SELECT *",$table,$where);
    }
    public function delete($table,$where){
        return $this->action("DELETE",$table,$where);
    }
    public function insert($table,$feilds = array()){
            $keys = array_keys($feilds);
            $values = '';
            $x = 1;
            
            foreach($feilds as $feild){
                $values .= '?';
                if($x < count($feilds)){
                    $values .= ', ';
                }
                $x++;
            }

            $sql = "INSERT INTO {$table} (".implode(",",$keys).") VALUES ({$values})";
        
            if(!$this->query($sql,$feilds)->error()){
                return true;
            }
        return true;
    }
    public function results(){
        return $this->results;
    }
    public function first(){
        return $this->results()[0];
    }
    public function error(){
        return $this->error;
    }

    public function count(){
        return $this->count;
    }
}
