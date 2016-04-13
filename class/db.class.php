<?php
class DB {
	private $connection;
	public function __construct() {
		$this->connection = false;
	}
	public function __destruct() {
		if ($this->connection)
			mysql_close ( $this->connection );
	}
	public function connect($server, $username, $password, $database) {
		$this->connection = mysql_connect ( $server, $username, $password );
		if ($this->connection)
			mysql_select_db ( $database, $this->connection );
		return $this->connection;
	}
	public function disconnect() {
		if ($this->connection)
			mysql_close ( $this->connection );
	}
	// 执行语句并返回执行结果
	public function put($sql) {
		return mysql_query ( $sql, $this->connection );
	}
	// 执行语句并取得查询结果
	public function get($sql) {
		$query = mysql_query ( $sql, $this->connection );
		if ($query) {
			$rows = array ();
			while ( $row = mysql_fetch_array ( $query, MYSQL_ASSOC ) )
				$rows [] = $row;
			return $rows;
		} else
			return false;
	}
	public function last_insert_id() {
		return $this->get ( "select last_insert_id() as id" )[0]["id"];
	}
}
