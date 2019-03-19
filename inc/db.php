<? 
# v3.0 19/11/2015

class DB_CONNECT
{

	var $Link_ID = 0;		// Result of mysql_connect().
	var $Query_ID = 0;		// Result of most recent mysql_query().
	var $Record = array();  // current mysql_fetch_array()-result.
	var $Row;				// current row number.

	var $Errno= 0;			// error state of query...
	var $Error= "";

	// setup database variables, defined in global_vars.php
	var $Host = dbHost;
	var $Database = dbDatabase;
	var $User = dbUser;
	var $Password = dbPassword;

	function halt($msg)
	{
		$this->Errno;
		$this->Error;
		die($msg);
	}

	function connect()
	{	
		global $Host, $User, $Database, $Password;
		if ( 0 == $this->Link_ID )
		{
			$this->Link_ID=mysqli_connect($this->Host, $this->User, $this->Password);
			if (!$this->Link_ID) 
			{
				$this->halt("Couldn't connect to MySQL");
			}
			if (!mysqli_query($this->Link_ID, sprintf("use %s",$this->Database)))
			{
				$this->halt("Couldn't select database ".$this->Database);
			}
		}
	}
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	MAIN DATABASE CLASS
//
//	Use this to query, insert, update and delete from the DB
//

class DB extends DB_CONNECT
{
	function query($Query_String,$charset='utf8')
	{
		$this->connect();
		mysqli_set_charset($this->Link_ID,$charset);
		$this->Query_ID = mysqli_query($this->Link_ID, $Query_String);
		$this->Row = 0;
		$this->Errno = mysqli_errno($this->Link_ID);
		$this->Error = mysqli_error($this->Link_ID);
		if (!$this->Query_ID)
		{
			mail("mike@wilxite.com", "SQL ERROR GIT.WILXITE", $Query_String);
			$this->halt("Invalid SQL: ".$Query_String);
		}
		return $this->Query_ID;
	}

	function next_record($assoc = 0)
	{
		/* Changes how records are returned
		MYSQLI_NUM: 0 => "val 1"
		MYSQLI_ASSOC: 'sqlFieldName' => "val 1",
		MYSQLI_BOTH: (Is default) returns an array containing both */ 
		 
		if ($assoc)
			$this->Record = mysqli_fetch_array($this->Query_ID, MYSQLI_ASSOC);
		else
			$this->Record = mysqli_fetch_array($this->Query_ID, MYSQLI_BOTH);
			
		$this->Row += 1;
		$this->Errno = mysqli_errno($this->Link_ID);
		$this->Error = mysqli_error($this->Link_ID);

		$stat = is_array($this->Record);
		if (!$stat)
		{
			mysqli_free_result($this->Query_ID);
			$this->Query_ID = 0;
		}
		return $stat;
	}

	function getval($query,$fieldname,$charset='utf8')
	{
		$this->query($query);
		mysqli_set_charset($this->Link_ID,$charset);
		while($this->next_record()):
			$varname=$this->Record[$fieldname];
		endwhile;
		return $varname;
	}

	function seek($pos)
	{
		$status = mysqli_data_seek($this->Query_ID, $pos);
		if ($status) $this->Row = $pos;
		return;
	}

	function num_rows()
	{
		return mysqli_num_rows($this->Query_ID);
	}

	function num_fields()
	{
		return mysqli_num_fields($this->Query_ID);
	}

	function affected_rows()
	{
		return mysqli_affected_rows($this->Link_ID);
	}
	
	function insert_id()
	{
		return mysqli_insert_id($this->Link_ID);
	}
}


?>