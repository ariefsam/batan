<?php
/*===============================================================
 *
 * Class db
 * Author: Arief Hidayatulloh
 * Email : ariefhidayatulloh@gmail.com
 * Blog  : ariefsam.wordpress.com
 *
 * Kelas ini digunakan untuk pengaksesan database secara mudah
 * Class ini hanya mendukung koneksi untuk DBMS MySQL
 * Method/fungsi dalam class ini belum didukung penanganan error,
 * pastikan Anda menggunakannya dengan baik.
 * 
 *===============================================================*/

class db {

    private static $instance;
    public $query="";
    private $num_rows=0;
    private $result=NULL;
    private $where=NULL;
    private $limit_start=0;
    private $limit_num=1000;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "batan";

    private function __construct()
    {
        
    }

    public static function singleton()
    {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
            self::$instance->connect();
        }

        return self::$instance;
    }

    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public static function config($host,$username,$password,$dbname)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect()
    {
        $host = $this->host;
        $username = $this->username;
        $password = $this->password;
        $dbname = $this->dbname;

        $q = mysql_connect($host,$username,$password);
        if(!$q) echo "Cannot connect to Database";
        $q = mysql_select_db($dbname);
        if(!$q) echo "Cannot select Database $dbname";
    }
    
    function free_result()
    {
        $this->query="";
        $this->result=NULL;
        $this->where=1;
        $this->limit_start=0;
        $this->limit_num=1000;

    }

    function insert($table, $data)
    {
        $key = array_keys($data);
        $query = "INSERT INTO $table (" . $key[0];
        $i = 1;
        while($key[$i])
        {
            $query .= "," . $key[$i++];
        }

        $i=1;
        foreach ($data as $d)
        {
            if($i==1) $query .= ") VALUES (\"" . $data[$key[0]] . "\"";
            else $query .= ",\"" . $d . "\"";
            $i++;
        }

        $query .= ")";
        $this->query = $query;
        if ($this->eksekusi()) return mysql_insert_id();
        else return 0;

    }

    function update($table, $data)
    {
        $key = array_keys($data);
        $query = "UPDATE $table SET ";
        $i = 0;
        while($key[$i])
        {
            $query .= $key[$i] . "=\"" . $data[$key[$i]] . "\"," ;
            $i++;
        }

        $query = substr($query, 0, (strlen($query)-1));

        if(!$this->where) $this->query = $query;
        else $this->query = $query . " WHERE " . $this->where;
        $x = $this->eksekusi();
        return mysql_insert_id();
    }

    function get($table, $start=NULL, $num=NULL)
    {
        $this->query = "SELECT * FROM $table";
        if($this->where) $this->query .= " WHERE " . $this->where;
        if($num)
        {
            $this->query .= " LIMIT $start,$num";
        }
        return $this->eksekusi();
    }

    function delete($table)
    {
        $this->query = "DELETE FROM $table";
        if($this->where) $this->query .= " WHERE " . $this->where;
        return $this->eksekusi();
    }

    function where($text)
    {
        $this->where = $text;
    }

    function get_fetch()
    {
        $data = array();
        $x = mysql_query($this->query);
        if($x){
            while($q = mysql_fetch_array($x))
            {
                $data[] = $q;
            }
        }
        return $data;
    }

    function num_rows()
    {
        //return $this->num_rows;
        return mysql_num_rows($this->result);
    }

    function eksekusi()
    {
        $q = mysql_query($this->query);
        $this->result = $q;
        return $q;
    }
}

