<?php 
    
    class Usuario{
      private $idusuario;
      private $nome;
      private $dtcadastro;

      public function getIdusuario(){
        return $this->idusuario;
      }
       public function getNome(){
        return $this->nome;
      }
       public function getDtcadastro(){
        return $this->dtcadastro;
      }
      public function setIdusuario($idusuario){
        $this->idusuario = $idusuario;
      }
       public function setNome($nome){
        $this->nome = $nome;
      }
       public function setDtcadastro($dtcadastro){
        $this->dtcadastro = $dtcadastro;
      }

      public function getId($id){
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM usuario WHERE idusuario = :ID",array(':ID' => $id));

        if(count($result) > 0){
          $row = $result[0];

          $this->setIdusuario($row['idusuario']);
          $this->setNome($row['nome']);
          $this->setDtcadastro(new Datetime($row['dtcadastro']));
        }
        
      }

      public function __toString(){
        return json_encode(array(
            'idusuario' => $this->getIdusuario(),
            'nome' => $this->getNome(),
            'dtcadastro' => $this->getDtcadastro()->format('d/m/Y H:i') 

             ));
      }
    }

    ?>