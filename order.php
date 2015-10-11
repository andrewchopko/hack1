<?php
class Order{
	private $name;
	private $phone;
	private $day;
	private $start;

	//constructor
	public function Order($name, $phone, $day, $start){
		$this->name = $name;
		$this->phone = $phone;
		$this->day = $day;
		$this->start = $start;
	}

	public function addToDatabase($id_doctor){
		$strSQL  = "insert into `order`(";
		$strSQL .= "name, phone, day, start, id_doctor)";
		$strSQL .= " VALUES(";
		$strSQL .= "'" . $this->name . "', ";
		$strSQL .= "'" . $this->phone . "', ";
		$strSQL .= "'" . $this->day . "', ";
		$strSQL .= "'" . $this->start . "', ";
		$strSQL .= "'" . $id_doctor . "')";
		//echo $strSQL;
		mysql_query($strSQL);
	}
}
?>