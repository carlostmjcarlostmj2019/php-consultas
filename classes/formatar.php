<?php
// classes/formatar.php

class Formatar {
    public static function Celular($numero) {
        // Remove todos os caracteres não numéricos
        $numeroLimpo = preg_replace("/[^0-9]/", "", $numero);
        $numero_total = strlen($numeroLimpo);
        if($numero_total === 10){
            $numeroFormatado = substr($numeroLimpo, 0, 2) . '9' . substr($numeroLimpo, 2);
            return $numeroFormatado;
        }
    }
        
       


    public static function data($data) {
        // Verifica se a data está vazia
        if (empty($data)) {
            return ""; // Retorna uma string vazia se estiver vazio
        }
        
        // Formata a data
        $dataFormatada = date('d/m/Y', strtotime($data));
        
        return $dataFormatada;
    }


    public static function cep($cep) {
        // Verifica se o CEP possui o formato correto (8 dígitos)
        if(preg_match("/^\d{8}$/", $cep)) {
            // Formata o CEP para o padrão XXXXX-XXX
            return substr($cep, 0, 5) . "-" . substr($cep, 5);
        } else {
            return $cep; // Retorna o CEP sem alterações se não estiver no formato correto
        }
    }

    public static function ddd($ddd) {
        // Verifica se o DDD possui o formato correto (2 dígitos)
        if(preg_match("/^\d{2}$/", $ddd)) {
            // Formata o DDD para o padrão (XX)
            return "(" . $ddd . ")";
        } else {
            return $ddd; // Retorna o DDD sem alterações se não estiver no formato correto
        }
    }

    public static function cnpj($cnpj) {
        // Verifica se o CNPJ possui o formato correto (14 dígitos)
        if(preg_match("/^\d{14}$/", $cnpj)) {
            // Formata o CNPJ para o padrão XX.XXX.XXX/YYYY-ZZ
            return substr($cnpj, 0, 2) . "." . substr($cnpj, 2, 3) . "." . substr($cnpj, 5, 3) . "/" . substr($cnpj, 8, 4) . "-" . substr($cnpj, 12);
        } else {
            return $cnpj; // Retorna o CNPJ sem alterações se não estiver no formato correto
        }
    }

    public static function cpf($cpf) {
        // Verifica se o CPF possui o formato correto (11 dígitos)
        if(preg_match("/^\d{11}$/", $cpf)) {
            // Formata o CPF para o padrão XXX.XXX.XXX-XX
            return substr($cpf, 0, 3) . "." . substr($cpf, 3, 3) . "." . substr($cpf, 6, 3) . "-" . substr($cpf, 9);
        } else {
            return $cpf; // Retorna o CPF sem alterações se não estiver no formato correto
        }
    }

    public static function placa($placa) {
        // Verifica se a placa possui o formato correto (7 caracteres)
        if(preg_match("/^[A-Za-z]{3}\d{4}$/", $placa)) {
            // Formata a placa para o padrão XXX-YYYY
            return substr($placa, 0, 3) . "-" . substr($placa, 3);
        } else {
            return $placa; // Retorna a placa sem alterações se não estiver no formato correto
        }
    }

    public static function rg($rg) {
        // Verifica se o RG possui o formato correto (9 dígitos)
        if(preg_match("/^\d{9}$/", $rg)) {
            // Formata o RG para o padrão XX.XXX.XXX-X
            return substr($rg, 0, 2) . "." . substr($rg, 2, 3) . "." . substr($rg, 5, 3) . "-" . substr($rg, 8);
        } else {
            return $rg; // Retorna o RG sem alterações se não estiver no formato correto
        }
    }
}
?>
