<?php
namespace Project\Services;
class Connect{
    public $pdo;
    public function __construct()
    {
        $dbConfig = (require __DIR__ . '/../settings.php')['db'];
        $dsn = 'mysql:dbname=' . $dbConfig['dbname'] . ';host=' . $dbConfig['host'] . ';port=' . $dbConfig['port'];
        $user = $dbConfig['user'];
        $password = $dbConfig['password'];
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->exec('SET NAMES UTF8');
    }
    public function query(string $sql, array $params = [], string $className = 'stdClass'){
        $sth = $this->pdo->prepare($sql);
        $res = $sth->execute($params);
        if($res === false){
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }
}