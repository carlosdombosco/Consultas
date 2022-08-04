<?php
require_once("../conn/conexao.php");

class Cadastro extends Conexao {

    private $nome;
    private $cpf;
    private $nascimento;
    private $sexo;
    private $telefone;
    private $email;
    private $descricao_tipo_exame;
    private $descricao_exame;
    private $data_consulta;
    private $hora_consulta;
    private $protocolo;


    //Metodos Set
    public function setNome($string){
        $this->nome = $string;
    }
    public function setcpf($string){
        $this->cpf = $string;
    }
    public function setSexo($string){
        $this->sexo = $string;
    }
    public function setTelefone($string){
        $this->telefone = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    public function setDescricao_exame($string){
        $this->descricao_exame = $string;
    }
    public function setData_consulta($string){
        $this->data_consulta = $string;
    }
    public function setHora_Consulta($string){
        $this->Hora_Consulta = $string;
    }
    public function setProtocolo($string){
        $this->protocolo = $string;
    }


    //Metodos Get
    public function getNome($string){
        $this->nome = $string;
    }
    public function getcpf($string){
        $this->cpf = $string;
    }
    public function getSexo($string){
        $this->sexo = $string;
    }
    public function getTelefone($string){
        $this->telefone = $string;
    }
    public function getEmail($string){
        $this->email = $string;
    }
    public function getDescricao_exame($string){
        $this->descricao_exame = $string;
    }
    public function getData_consulta($string){
        $this->data_consulta = $string;
    }
    public function getHora_Consulta($string){
        $this->Hora_Consulta = $string;
    }
    public function getProtocolo($string){
        $this->protocolo = $string;
    }

}
?>
