<?php
    //Criação da classe conexão que vai ser chamada no crud.php
    class Conexao{
        public static function Conectar(){
            //Definindo as variáveis de conexão
            define("server","DIGITE AS SUAS CREDENCIAIS");
            define("database_name","DIGITE AS SUAS CREDENCIAIS");
            define("user","DIGITE AS SUAS CREDENCIAIS");
            define("password","DIGITE AS SUAS CREDENCIAIS");

            //Inicializando a array em PDO e inserindo UTF8
            $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');

            //Bloco Try-Catch para executar a conexão e tratamento de erros
            try{
                //Abrindo a conexão em PDO
                $conexão =  new PDO("mysql:host=".server."; dbname=".database_name, user, password, $opcoes);
                return $conexão;  
            }catch (Exception $erro){
                //Tratamento de erro na hora da conexão
                die('O erro da conexão é: '. $erro->getMessage());
            }


        }
    }


?>