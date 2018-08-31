<?php 

  class Sql extends PDO{
    private $conn;

    public function __construct(){
      $this->conn = new PDO("sqlsrv:Database=teste;Server=localhost\SQLEXPRESS;connectionPooling=0","sa","root");

    }

    private function setParams($statement,$parameters=array()){
      foreach ($parameters as $key => $value) {
        $this->setParam($statement,$key,$value);
        
      }
    }

    private function setParam($statement,$key,$value){
      $statement->bindParam($key,$value);

    }

    public function query($query,$parameters = array()){
      $stmt = $this->conn->prepare($query);

      $this->setParams($stmt,$parameters);
      $stmt->execute();
      return $stmt;
    }

    public function select($query,$parameters=array()):array
    {
      $stmt = $this->query($query,$parameters);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
  }
    
?>
