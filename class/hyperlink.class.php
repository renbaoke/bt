<?php
class Hyperlink {
	private $db;
	public function __construct($db) {
		$this->db = $db;
	}
	public function __destruct() {
		//
	}
	public function connect($server, $username, $password, $database) {
		return $this->db->connect ( $server, $username, $password, $database );
	}
	public function add($title, $http) {
		return $this->db->put ( "insert into hyperlink (title, http) values (" . sql_escape ( $title ) . ", " . sql_escape ( $http ) . ")" );
	}
	public function delete($id) {
		return $this->db->put ( "delete from hyperlink where id = " . sql_escape ( $id ) );
	}
	public function update($id, $title, $http) {
		return $this->db->put( "update hyperlink set title = " . sql_escape($title) . ", http = " . sql_escape($http) . " where id = " . sql_escape($id) );
	}
	public function index() {
		return $this->db->get( "select * from hyperlink" );
	}
}