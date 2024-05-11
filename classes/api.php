<?php

class Acesso {
    private $conexao; // Conexão com o banco de dados

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function login($usuario, $senha) {
        // Preparando a consulta SQL com uma instrução preparada (stmt)
        $sql = "SELECT id, nome, email, usuario, senha FROM usuarios WHERE usuario = ? AND senha = ?";
        $stmt = $this->conexao->prepare($sql);

        // Verificando se a preparação da consulta foi bem-sucedida
        if ($stmt === false) {
            return null; // Retorna null se houve um erro na preparação da consulta
        }

        // Criptografando a senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Ligando os parâmetros da consulta
        $stmt->bind_param("ss", $usuario, $senhaHash);

        // Executando a consulta
        $stmt->execute();

        // Obtendo o resultado da consulta
        $result = $stmt->get_result();

        // Verificando se a consulta retornou algum resultado
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Verificando se a senha está correta
            if (password_verify($senha, $row['senha'])) {
                // Remova 'senha' do array antes de retornar
                unset($row['senha']);
                // Retorna o array do usuário
                return $row;
            }
        }

        // Se o usuário não existe ou a senha está incorreta, retorna null
        return null;
    }
}

?>
