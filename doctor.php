<?php
class Doctor{
	private $email;
	private $password;
	private $name;
	private $type;
	private $monday;
	private $tuesday;
	private $wednesday;
	private $thursday;
	private $friday;
	private $start;
	private $finish;
	private $duration;
	private $cabinet;
	private $hospital_id;

	//constructor
	public function Doctor($email, $password, $name, $type, $monday, $tuesday, $wednesday, 
						   $thursday, $friday, $start, $finish, $duration, $cabinet, $hospital_id){
		$this->email = $email;
		$this->password = $password;
		$this->name = $name;
		$this->type = $type;
		$this->monday = $monday;
		$this->tuesday = $tuesday;
		$this->wednesday = $wednesday;
		$this->thursday = $thursday;
		$this->friday = $friday;
		$this->start = $start;
		$this->finish = $finish;
		$this->duration = $duration;
		$this->cabinet =$cabinet;
		$this->hospital_id = $hospital_id;
	}

	//methods
	public function addToDatabase(){
		$strSQL  = "insert into doctors (";
		$strSQL .= "email, password, name, type, monday, tuesday, wednesday, ";
		$strSQL .= "thursday, friday, start, finish, duration, cabinet, hospital_id)";
		$strSQL .= " VALUES(";
		$strSQL .= "'" . $this->email . "', ";
		$strSQL .= "'" . $this->password . "', ";
		$strSQL .= "'" . $this->name . "', ";
		$strSQL .= "'" . $this->type . "', ";
		$strSQL .= "'" . $this->monday . "', ";
		$strSQL .= "'" . $this->tuesday . "', ";
		$strSQL .= "'" . $this->wednesday . "', ";
		$strSQL .= "'" . $this->thursday . "', ";
		$strSQL .= "'" . $this->friday . "', ";
		$strSQL .= "'" . $this->start . "', ";
		$strSQL .= "'" . $this->finish . "', ";
		$strSQL .= "'" . $this->duration . "', ";
		$strSQL .= "'" . $this->cabinet . "', ";
		$strSQL .= "'" . $this->hospital_id . "')";
		//echo $strSQL;
		mysql_query($strSQL);
	}

	public static function isValidData($email, $password){
		$strSQL = "select email, password from doctors";
		$rs = mysql_query($strSQL);
		while ($row = mysql_fetch_array($rs)){
			if ($row["email"] == $email && $row["password"] == $password){
				return true;
			}
		}
		return false;
	}
}
/*
neurologist
surgeon
ophthalmologist
therapist
dentist
otolaryngologist
*/
?>