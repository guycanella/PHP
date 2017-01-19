 <?php 
 /*  
  * Constantes de parâmetros para configuração da conexão  
  */  
 define('HOST', 'localhost');  
 define('DBNAME', 'project_loginPHPAJAX');  
 define('CHARSET', 'utf8');  
 define('USER', 'root');  
 define('PASSWORD', '');  

 class Conexao {  

   /*  
    * Static attribute to instance PDO  
    */  
   private static $pdo;

   /*  
    * Hiding class construct   
    */ 
   private function __construct() {  
     //  
   } 
 
   /*  
    * Static method to return a valid connection   
    */  
   public static function getInstance() {  
     if (!isset(self::$pdo)) {  
       try {  
         $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);  
         self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);  
       } catch (PDOException $e) {  
         print "Erro: " . $e->getMessage();  
       }  
     }  
     return self::$pdo;  
   }  
 }
