<?php
include("Config.php");
class DbController {

public $host;
public $port;
 public $db;
 public $username;
 public $password;
 public $connection;
function DbController(){
$this->host=Config::HOST;
$this->port=Config::PORT;
$this->db=Config::DB;
$this->username=Config::USERNAME;
$this->password=Config::PASSWORD;
$this->connect();
}

function connect()
{
	$this->connection=mysqli_connect($this->host,$this->username,$this->password,$this->db);
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
}

function selectExecute($query)
{
$ret=array();
$result=mysqli_query($this->connection,$query);
while($row = mysqli_fetch_array($result)) {
	$ret[]=$row;
}
return $ret;
}

function insertExecute($query)
{
if(mysqli_query($this->connection,$query))
{
return true;
}
else{
return false;
}
}


function getStats()
{
$ret=array();
$cliResult=mysqli_query($this->connection,"select * from clients");
$ret["clients"]=$cliResult->num_rows;
$proResult=mysqli_query($this->connection,"select * from projects");
$ret["projects"]= $proResult->num_rows;
$feedResult=mysqli_query($this->connection,"select * from feedbacks");
$ret["feedbacks"]=$feedResult->num_rows;
return $ret;
}
function close(){
mysqli_close($this->connection);
}


}

?>
