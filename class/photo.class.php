<?php
class Photo {
	private $db;
	public function __construct($db) {
		$this->db = $db;
	}
	public function __destruct() {
		//
	}
	public function add($intro, $file, $aid) {
		return $this->db->put ( "insert into photo (intro, file, aid) values (" . sql_escape ( $intro ) . "," . sql_escape ( $file ) . "," . sql_escape ( $aid ) . ")" );
	}
	public function delete($id) {
		return $this->db->put ( " delete from photo where id = " . sql_escape ( $id ) );
	}
	public function update($id, $intro) {
		return $this->db->put ( "update photo set intro = " . sql_escape ( $intro ) . " where id = " . sql_escape ( $id ) );
	}
	public function index($aid, $page, $page_size) {
		$sql = "select * from photo";
		if (0 != $aid)
			$sql .= " where aid = " . sql_escape ( $aid );
		$sql .= " limit " . sql_escape ( ($page - 1) * $page_size ) . ", " . sql_escape ( $page_size );
		return $this->db->get ( $sql );
	}
	public function count($aid) {
		$sql = "select count(*) as count from photo";
		if (0 != $aid)
			$sql .= " where aid = " . sql_escape ( $aid );
		return $this->db->get ( $sql )[0]["count"];
	}
	public function get($id) {
		return $this->db->get ( "select * from photo where id = " . sql_escape ( $id ) )[0];
	}
}