<?php
class Database {
  public $connection;

  public function __construct()
  {
    $config = [
      'host' => 'localhost',
      'port' => 3306,
      'dbname' => 'notes-app',
      'charset' => 'utf8',
    ];


    // $dsn = 'mysql:host=localhost;port=3306;dbname=notes-app;charset=utf8';
    // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
    $dsn = "mysql:" . http_build_query($config, '', ';'); // "host=localhost;port=3306;dbname=notes-app;charset=utf8"

    var_dump($dsn);
    $this->connection = new PDO($dsn, 'root', 'root', [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }
  public function query($query)
  {
    $statement = $this->connection->prepare($query);
    $statement->execute();
    return $statement;
    // return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}