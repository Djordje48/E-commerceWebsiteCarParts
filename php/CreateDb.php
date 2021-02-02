<?php

class CreateDb
{
	public $servername;
	public $username;
	public $password;
	public $dbname;
	public $tablename;
	public $con;
	
	
	//class constructor
	public function __construct(
		$dbname="Newdb",
		$tablename="Productdb",
		$servername="localhost",
		$username="root",
		$password=""
	)
	{
		$this->dbname=$dbname;
		$this->tablename=$tablename;
		$this->servername=$servername;
		$this->username=$username;
		$this->password=$password;
		
		
		//create connection
		$this->con=mysqli_connect($servername,$username,$password);
		
		//check connection
		
		if(!$this->con){
			die("Konekcija nije uspela: ".mysqli_connect_error());
		}
		
		//query
		$sql="CREATE DATABASE IF NOT EXISTS $dbname";
		//execute query
		if(mysqli_query($this->con,$sql)){
			$this->con=mysqli_connect($servername,$username,$password,$dbname);
			
			//sql to create new table 
			$sql="CREATE TABLE IF NOT EXISTS $tablename
				(id INT(11)NOT NULL AUTO_INCREMENT PRIMARY KEY,
				category_id INT(11),
				product_name VARCHAR(25)NOT NULL,
				product_price FLOAT,
				product_image VARCHAR(100),
				product_text VARCHAR(255)
				);";
			if(!mysqli_query($this->con,$sql)){
				echo "Greska pri kreiranju tabele: ".mysqli_error($this->con);
			}
		
				
			
		}else{
			return false;
		}
		
	}
	public function getData(){
			$sql="SELECT*FROM $this->tablename where category_id=1";
			$result=mysqli_query($this->con,$sql);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
		}
	
	
	public function getData1(){
			$sql="SELECT*FROM $this->tablename where category_id=2";
			$result=mysqli_query($this->con,$sql);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
		}

	public function getData2(){
			$sql="SELECT*FROM $this->tablename where category_id=3";
			$result=mysqli_query($this->con,$sql);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
		}

	public function getData3(){
			$sql="SELECT*FROM $this->tablename where category_id=4";
			$result=mysqli_query($this->con,$sql);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
		}
	public function getData4(){
			$sql="SELECT*FROM $this->tablename where category_id=5";
			$result=mysqli_query($this->con,$sql);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
		}
	public function getData5(){
			$sql="SELECT*FROM $this->tablename where category_id=6";
			$result=mysqli_query($this->con,$sql);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
		}
	public function getData6(){
			$sql="SELECT*FROM $this->tablename where category_id=7";
			$result=mysqli_query($this->con,$sql);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
		}
	public function getData7(){
			$sql="SELECT*FROM $this->tablename where category_id=8";
			$result=mysqli_query($this->con,$sql);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
		}
	public function getData8(){
			$sql="SELECT*FROM $this->tablename where category_id=9";
			$result=mysqli_query($this->con,$sql);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
		}
	public function getData9(){
			$sql="SELECT*FROM $this->tablename ";
			$result=mysqli_query($this->con,$sql);
			if(mysqli_num_rows($result)>0){
				return $result;
			}
		}
	
	
}

?>