<?php
class DatabaseTable {
	private $table;
	private $pdo;
	function __construct($table){
		$this->table= $table;
		$this->pdo = new PDO('mysql:dbname=licnepalcategoryimages;host=localhost', 'root', '5ganes');
	}

	function insert($record) {
		$keys = array_keys($record);
		$keysWithComma = implode(', ', $keys);
		$keysWithCommanColon = ':' . implode(', :', $keys);

		$stmt = $this->pdo->prepare("INSERT INTO $this->table($keysWithComma) 
		          VALUES($keysWithCommanColon)");
		
		$stmt->execute($record);          
	}

	function update($record, $pk = 'id') {
		$keys = array_keys($record); $uKeys = [];
		foreach ($keys as $key) {
			$uKeys[] = $key . ' = :' . $key;
		}
		$ukeyString = implode(',', $uKeys);
		$stmt = $this->pdo->prepare("UPDATE $this->table SET $ukeyString WHERE $pk = :pk");

		$record['pk'] = $record[$pk];
		$stmt->execute($record);
	}

	public function findAll() {
		$stmt = $this->pdo->prepare("SELECT * FROM $this->table");
		$stmt->execute();
		return $stmt;
	}

	function find($field, $value) {
		$stmt = $this->pdo->prepare("select * from $this->table where $field = :value");
		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);
		return $stmt->fetch();
	}

	function delete($field, $value) {
		$stmt = $this->pdo->prepare("delete from $this->table where $field = :value");
		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);
	}

	function findImagesByCatId($catId){
		$stmt = $this->pdo->prepare("SELECT * FROM tbl_category_images WHERE categoryId = :categoryId");
		$criteria = [
			'categoryId' => $catId
		];
		$stmt->execute($criteria);
		return $stmt;
	}

}