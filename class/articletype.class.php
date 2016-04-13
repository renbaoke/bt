<?php
class ArticleType {
	private $db;
	public function __construct($db) {
		$this->db = $db;
	}
	public function __destruct() {
		//
	}
	public function add($name) {
		return $this->db->put ( "insert into article_type (name) values (" . sql_escape ( $name ) . ")" );
	}
	public function delete($id) {
		return $this->db->put ( "delete from article_type where id = " . sql_escape ( $id ) );
	}
	public function update($id, $name) {
		return $this->db->put ( "update article_type set name = " . sql_escape ( $name ) . " where id = " . sql_escape ( $id ) );
	}
	public function index() {
		return $this->db->get ( "select id, name from article_type" );
	}
}