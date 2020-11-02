<?php
class Database {
    private $dbh = NULL;
    private $host = '127.0.0.1';
    private $name = 'jongerenkansrijker';
    private $user = 'jongerenkansrijker';
    private $pass = 'kansrijkejongeren';

    public function __construct(){
        // echo 'do you work?';
        try{
            $this->dbh = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name, $this->user, $this->pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'maybe.';

        } catch(PDOException $e){
            echo 'Connection failed, Try again later. Error:'.$e->getMessage();
        }
    }

    public function get($query, $variables = []){

        $statement = $this->dbh->prepare($query);

        try{
            $statement->execute($variables);
            $data = $statement->fetchAll();
            return $data;
        } catch(PDOException $e){
            echo 'Query failed to execute.'.$e->getMessage();
        }

    }


    public function insert($query, $variables = []){

        $statement = $this->dbh->prepare($query);

        try{
            $statement->execute($variables);
            return $this->dbh->lastInsertId();
        } catch(PDOException $e){
            echo 'Query failed to execute.'.$e->getMessage();
        }

    }

    public function delete_update($query, $variables = []){
        
        $statement = $this->dbh->prepare($query);

        try{
            $statement->execute($variables);
        } catch(PDOException $e){
            echo 'Query failed to execute.'.$e->getMessage();
        }
    }

    public function login($username, $password){
        $query = 'SELECT id, password FROM medewerker WHERE username = :username';

        $statement = $this->dbh->prepare($query);
        $statement->execute(['username' => $username]);

        $data = $statement->fetch();

        $hashedPass = $data['password'];

        if(isset($data['id'])){
            if(password_verify($password, $hashedPass)){
                session_start();
                $_SESSION['userid'] = $data['id'];
                $_SESSION['username'] = $username;
                echo 'success.';
            }
        }
        else{
            echo 'Log in Failed';
        }
    }

    public function logout(){
        if(isset($_SESSION['username'])){
            session_destroy();
            header('Location: http://localhost/drempeltoets/');
        }
    }
}
?>