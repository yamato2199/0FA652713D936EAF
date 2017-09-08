<?php
/*
$d = new DB();
$handle = $d->db_connect("localhost","root","1234","SEP");
$res = $d->db_query($handle,"select * from users WHERE uid = 1; ");
//echo $res ? "1" : "0";

$data = $d->db_fetch($res,"usr_name");
echo $data;
*/

class DB 
{
   	
	public function db_connect()
    {
		require_once("config.php");
        $handle = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_DB);
        //echo $handle ? "OK" : "Falid";
        return $handle;
    }
	
    /*
    public function db_connect($host,$user,$pwd,$dbname)
    {
        $handle = new mysqli($host,$user,$pwd,$dbname);
        return $handle;
    }
    */
    public function db_close($dbhandle)
    {
        $dbhandle->close();
    }
    public function db_query($dbhandle,$query)
    {
        $result = $dbhandle->query($query);
        return $result;
    }

    public function db_fetch($result,$nage)
    {
        $row = $result->fetch_assoc();
        return $row["$nage"];
    }

    public function db_dbCount($result)
    {
        $num = mysqli_num_rows($result);
        return $num ? true : false;
    }
    

}



?>
