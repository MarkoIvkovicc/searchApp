<?php

class queryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectUser($id)
    {
        $query = sprintf("select * from users where id='%s'", $id['id']);

        try {
            $stat = $this->pdo->prepare($query);
            $stat->execute($id);
            $row = $stat->fetchAll(PDO::FETCH_CLASS);
            return $row[0];
        } catch (Exception $e) {
            die($e);
        }
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

    public function findData($name)
    {
        $query = sprintf("select id, name from users where email='%s'", $name['email']);

        try {
            $stat = $this->pdo->prepare($query);
            $stat->execute($name);
            $row = $stat->fetchAll(PDO::FETCH_CLASS);
            return $row[0];
        } catch (Exception $e) {
            die($e);
        }
    }

    public function insertIds($data)
    {
        $query = sprintf("Update users Set %s = %s where id=%s",
            $data['column'],
            $data['id'],
            $data['id']
            );

        try {
            $stat = $this->pdo->prepare($query);
            $stat->execute($data);
        } catch (Exception $e) {
            die($e);
        }
    }

    public function search($data)
    {
        $search = $data['search'];
        $type = $data['type'];
        $query = "SELECT users.id, users.email, users.name, users.password, developertype.name
                as typeName, programminglanguage.name as languageName, framework.name as frameworkName,
                subframework.name as subframeworkName
                    FROM users
                    INNER JOIN developertype ON (users.developerId = developertype.id)
                    INNER JOIN programminglanguage ON (users.progLangId = programminglanguage.id)
                    LEFT OUTER JOIN framework on (users.frameworkId = framework.id)
                    LEFT OUTER JOIN subframework on (users.subFrameworkId = subframework.id)
                    WHERE (users.name LIKE '%$search%' OR users.email LIKE '%$search%')
                    AND developertype.name LIKE '%$type%'";

        try {
            $stat = $this->pdo->prepare($query);
            $stat->execute();
            $row =  $stat->fetchAll(PDO::FETCH_CLASS);
            return $row;
        } catch (Exception $e) {
            die('Wrong Search...');
        }
    }
}