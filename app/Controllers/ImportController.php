<?php
/**
 * Author: gleuton.pereira
 */

namespace App\Controllers;


use App\Models\Cartorio;
use App\Models\Cidade;
use App\Models\Endereco;
use App\Models\Tabeliao;

class ImportController
{
    private $cartorios;
    private $cartorio;
    private $endereco;
    private $cidade;
    private $tabeliao;

    public function __construct()
    {
        $this->cartorio = new Cartorio();
        $this->endereco = new Endereco();
        $this->cidade = new Cidade();
        $this->tabeliao = new Tabeliao();
    }

    public function xml()
    {
        $file_tmp = $_FILES['xml']['tmp_name'];
        $this->cartorios = simplexml_load_file($file_tmp);

        foreach ($this->cartorios as  $cartorio) {

            $this->cartorio($cartorio);
            $this->tabeliao($cartorio);
            $this->endereco($cartorio);
            header("Refresh:0; url=/");
        }
    }

    private function cartorio($cartorio)
    {
        $data['nome_fantasia'] = $cartorio->nome;
        $data['razao_social'] = $cartorio->razao;
        $data['cnpj'] = $cartorio->documento;
        $data['ativo'] = $cartorio->ativo;

        if ($this->cartorio->find($data['cnpj'])) {
            unset($data['cnpj']);
            return $this->cartorio->update($cartorio->documento, $data);
        }
        return $this->cartorio->insert($data);
    }

    private function endereco($cartorio)
    {
        $data['endereco'] = filter_var($cartorio->endereco,FILTER_SANITIZE_STRING);
        $data['cep'] = $cartorio->cep;
        $data['bairro'] = filter_var($cartorio->bairro,FILTER_SANITIZE_STRING);
        $data['cartorio_cnpj'] = $cartorio->documento;

        $municipio = filter_var($cartorio->cidade, FILTER_SANITIZE_STRING);

        $cidade = $this->cidade->findBy(
            "WHERE cidade = '{$municipio}'"
        );
        if(!$cidade){
            $dataCidade['cidade'] = $municipio;
            $dataCidade['estado_uf'] = strtoupper($cartorio->uf);
            $this->cidade->insert($dataCidade);
        }

        $data['cidade_id'] = $this->cidade->findBy(
            "WHERE cidade = '{$municipio}'"
        )->id_cidade;

        $enderecoData = $this->endereco->findBy(
            "WHERE cartorio_cnpj = {$data['cartorio_cnpj']}"
        );

        if ($enderecoData) {
            return $this->endereco->update($enderecoData->id_endereco, $data);
        }

        return $this->endereco->insert($data);
    }

    private function tabeliao($cartorio)
    {
        $data['nome'] = filter_var($cartorio->tabeliao, FILTER_SANITIZE_STRING);
        $data['cartorio_cnpj'] = $cartorio->documento;

        $tabeliaData = $this->tabeliao->findBy(
            "WHERE cartorio_cnpj = {$data['cartorio_cnpj']}"
        );

        if ($tabeliaData) {
            return $this->tabeliao->update($tabeliaData->id_tabeliao, $data);
        }
        return $this->tabeliao->insert($data);
    }
}