<?php 
    $coon = new PDO("sqlsrv:server=localhost\SQLEXPRESS;connectionPooling=0;Database=teste","sa","root");
   
    //$stmt = $coon->prepare("insert into usuario(nome) values(:NOME)");
    //$stmt = $coon->prepare("update usuario set nome = :NOME where idusuario = :ID");
	$stmt = $coon->prepare("delete from usuario where idusuario = :ID");

    $id=3;
    //$nome='Gustavo';
    //$stmt->bindParam(":NOME",$nome);
    $stmt->bindParam(":ID",$id);

    $stmt->execute();

    $stmt = $coon->prepare("Select * from usuario");
    $stmt->execute();

   	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   	echo json_encode($result);
   	

   	/*foreach($result as $row){
   		foreach ($row as $key => $value) {
   			echo $key.": ".$value."<br>";
   		}
   		echo "-----------------------------------<br>";
   	}*/


    ?>