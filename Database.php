<?php
class Database {
  public $connection;
  public $statement;

  public function __construct($config, $username = 'root', $password = 'root')
  {
    // $dsn = 'mysql:host=localhost;port=3306;dbname=notes-app;charset=utf8';
    $dsn = "mysql:" . http_build_query($config, '', ';');
    // var_dump($dsn);
    $this->connection = new PDO($dsn, $username, $password, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }
  public function query($query, $params = [])
  {
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params);
    return $this;
    // return $statement;
    // return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function find()
  {
    return $this->statement->fetch();
  }

  public function findOrFail()
  {
    $data = $this->find();
    if (! $data) {
      abort();
    }
    return $data;
  }

  public function get()
  {
    return $this->statement->fetchAll();
  }
}