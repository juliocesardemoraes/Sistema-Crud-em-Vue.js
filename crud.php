<?php header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
//Utilizando headers para que possamos conectar entre arquivos
//Incluindo a conexão e chamando a função conectar
include_once 'conection.php';
$objeto = new Conexao();
$conexao = $objeto->Conectar();
$_POST = json_decode(file_get_contents("php://input"), true);

//Pegando valores do form
$opcao = (isset($_POST['opcao'])) ? $_POST['opcao'] : '';
$nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
$nascimento = (isset($_POST['nascimento'])) ? $_POST['nascimento'] : '';
$cpf = (isset($_POST['cpf'])) ? $_POST['cpf'] : '';
$celular = (isset($_POST['celular'])) ? $_POST['celular'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$endereco = (isset($_POST['endereco'])) ? $_POST['endereco'] : '';
$observacao = (isset($_POST['observacao'])) ? $_POST['observacao'] : '';

if($opcao == 1){   
    $consulta = "SELECT nome,nascimento,cpf,celular,email,endereco,observacao  FROM clientes";
    $resultado = $conexao-> prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

}else if($opcao == 2){
    $consulta = "INSERT into clientes(nome,nascimento,cpf,celular,email,endereco,observacao) VALUES('$nome','$nascimento','$cpf','$celular','$email','$endereco','$observacao')";
    $resultado = $conexao->prepare($consulta);
    $resultado->execute();
}else if($opcao == 3){
    $consulta = "UPDATE clientes SET nome='$nome',nascimento='$nascimento',cpf='$cpf',celular='$celular',email='$email',endereco = '$endereco', observacao = '$observacao' WHERE cpf='$cpf'";
    $resultado = $conexao->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

}else if($opcao == 4){
    $consulta = "DELETE from clientes where cpf='$cpf' ";
    $resultado = $conexao->prepare($consulta);
    $resultado->execute();
}

print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;

?>