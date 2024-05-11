<?php
// classes/api.php

class API {
    private $curl;
    private $url_api = 'https://brasilapi.com.br/api/';

    public function __construct() {
        $this->curl = new Curl();
    }

    public function obterCNPJ($cnpj) {
        $url = $this->url_api . "cnpj/v1/" . $cnpj;
        $response = $this->curl->get($url);
        return json_decode($response, true);
    }

    public function obterCEP($cep) {
        $url = $this->url_api . "cep/v1/" . $cep;
        $response = $this->curl->get($url);
        return json_decode($response, true);
    }

    public function obterDDD($ddd) {
        $url = $this->url_api . "ddd/v1/" . $ddd;
        $response = $this->curl->get($url);
        return json_decode($response, true);
    }

    // Adicione outras funções conforme necessário para obter informações adicionais
}
