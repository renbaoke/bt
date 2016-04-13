<?php
class Article {
	private $db;
	public function __construct($db) {
		$this->db = $db;
	}
	public function __destruct() {
		//
	}
	public function add($title, $body) {
		return $this->db->put ( "insert into article (title, body) values (" . sql_escape ( $title ) . ", " . sql_escape ( $body ) . ")" );
	}
	public function delete($id) {
		return $this->db->put ( "delete from article where id = " . sql_escape ( $id ) );
	}
	public function update($id, $title, $body) {
		return $this->db->put ( "update article set title = " . sql_escape ( $title ) . ", body = " . sql_escape ( $body ) . " where id = " . sql_escape ( $id ) );
	}
	public function index($tid, $page, $page_size) {
		if (0 == $tid)
			return $this->db->get ( "select id, title, createtime, modifytime from article limit " . sql_escape ( ($page - 1) * $page_size ) . ", " . sql_escape ( $page_size ) );
		else
			return $this->db->get ( "select id, title, createtime, modifytime from article a join article_article_type at on a.id = at.aid and at.tid = " . sql_escape ( $tid ) . " limit " . sql_escape ( ($page - 1) * $page_size ) . ", " . sql_escape ( $page_size ) );
	}
	public function get($id) {
		$article = $this->db->get ( "select * from article where id = " . sql_escape ( $id ) )[0];
		$types = $this->db->get ( "select tid from article_article_type where aid = " . sql_escape ( $id ) );
		foreach ( $types as $type )
			$article ["types"] [] = $type ["tid"];
		return $article;
	}
	public function count($tid) {
		if (0 == $tid)
			return $this->db->get ( "select count(*) as count from article" )[0]["count"];
		else
			return $this->db->get ( "select count(*) as count from article a join article_article_type at on a.id = at.aid and at.tid = " . sql_escape ( $tid ) )[0]["count"];
	}
	public function search($keyword) {
		return $this->db->get ( "select id, title, createtime, modifytime from article where title like '%" . sql_escape ( $keyword, '' ) . "%'" );
	}
	public function add_to_type($aid, $tid) {
		return $this->db->put ( "insert into article_article_type (aid, tid) values (" . sql_escape ( $aid ) . ", " . sql_escape ( $tid ) . ")" );
	}
	public function delete_from_type($aid, $tid) {
		return $this->db->put ( "delete from article_article_type where aid = " . sql_escape ( $aid ) . " and tid = " . sql_escape ( $tid ) );
	}
	public function delete_from_all_types($aid) {
		return $this->db->put ( "delete from article_article_type where aid = " . sql_escape ( $aid ) );
	}
}