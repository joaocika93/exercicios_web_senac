<?php

class Pessoa {
    private $nome;
    private $idade;
    private $peso;
    private $altura;
    private $imc;
    private $grupo;

    //construtor

    function __construct($nome, $idade, $peso, $altura) {
        $this->nome=$nome;
        $this->idade=$idade;
        $this->peso=$peso;
        $this->altura=$altura;
    }

    //Getters e Setters

    //Nome
    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    //Idade
    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($idade){
        $this->idade = $idade;
    }

    //Peso
    public function getPeso(){
        return $this->peso;
    }

    public function setPeso($peso){
        $this->peso = $peso;
    }

    //Altura
    public function getAltura(){
        return $this->altura;
    }

    public function setAltura($altura){
        $this->altura = $altura;
    }

    //imc
    public function getImc(){
        return $this->imc;
    }

    public function setImc($peso, $altura){
        $this->imc = round(($peso / ($altura * $altura)), 2);
    }

    //Grupo
    public function getGrupo(){
        return $this->grupo;
    }

    public function setGrupo($imc){
        if($imc < 18.5){
            $this->grupo = 'Abaixo do Peso';
        }elseif($imc >= 18.5 && $imc <=24.9){
            $this->grupo = 'Peso Normal';
        }elseif($imc >= 25 && $imc <=29.9){
            $this->grupo = 'Sobrepeso';
        }elseif($imc >= 30 && $imc <=34.9){
            $this->grupo = 'Obesidade grau I';
        }elseif($imc >= 35 && $imc <=39.9){
            $this->grupo = 'Obesidade grau II';
        }elseif($imc >= 40){
            $this->grupo = 'Obesidade grau III';
        }
    }






}



