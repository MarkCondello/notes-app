<?php
class Database {
  public $connection;

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
    $statement = $this->connection->prepare($query);
    $statement->execute($params);
    return $statement;
    // return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}