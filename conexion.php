<?php
include_once('config.php');

    $conexion = mysqli_connect("127.0.0.1","root","","shop");

    $servidor="mysql:dbname=shop;host=127.0.0.1";
    $usuario="root";
    $pwd="";

    try {
        $pdoo=new PDO($servidor,$usuario,$pwd);
    } catch (PDOException $e) {
        echo "Mala conexion" .$e->getMessage();
    }

class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    
     public function __construct(){
        $this->host     = HOST;
        $this->db       = DB;
        $this->user     = USER;
        $this->password = PASSWORD;
        }

    //mysql -e "USE todolistdb; select*from todolist" --user=azure --password=6#vWHD_$ --port=49175 --bind-address=52.176.6.0

    function connect(){
    
        try{

            $connection = "mysql:host=".$this->host.";dbname=" . $this->db;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            //$pdo = new PDO($connection, $this->user, $this->password, $options);
            $pdo = new PDO($connection,$this->user,$this->password);
            return $pdo;


        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}
    class Conexion{
        public static function conectar()
        {
            try {
                $cn = new PDO("mysql:host=127.0.0.1;dbname=shop","root","");
                return $cn;
            } catch (PDOException $e) {
                die ($e->getMessage());
            }
        }
    } 

?>

