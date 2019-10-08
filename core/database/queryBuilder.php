<?php

class queryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function newUser($table, $array)
    {
        $query = sprintf('insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($array)),
            ':' . implode(', :', array_keys($array))
            );
        try {
            $stat = $this->pdo->prepare($query);
            $stat->execute($array);
        } catch (Exception $e) {
            die($e);
        }
    }

    public function login($table, $array)
    {
        $query = sprintf("select email, password from %s where email='%s' and password='%s'",
            $table,
            $array['email'],
            $array['password']);

        try {
            $stat = $this->pdo->prepare($query);
            $stat->execute($array);
            $row = $stat->fetchAll(PDO::FETCH_CLASS);
            if ($row[0] != null) {
                return true;
            }
            else {
                echo 'Wrong Email Or Password';
            }
        } catch (Exception $e) {
            die('User Not Found. Wrong Email or Password. Please Try Again');
        }
    }

    public function findName($name)
    {
        $query = sprintf("select name from users where email='%s'", $name['email']);

        try {
            $stat = $this->pdo->prepare($query);
            $stat->execute($name);
            $row = $stat->fetchAll(PDO::FETCH_CLASS);
            return $row[0]->name;
        } catch (Exception $e) {
            die($e);
        }
    }
}