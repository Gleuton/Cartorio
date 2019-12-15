<?php
/**
 * Author: gleuton.dutra
 */

namespace Tests\Unit;

use App\Models\Cartorio;
use App\Models\Endereco;
use PHPUnit\Framework\TestCase;


class EnderecoTest extends TestCase
{
    private $dataCartorio = [
        "nome_fantasia" => "Oficio de Registro de Imoveis e 1º Tabelionato de Notas",
        "razao_social"  => "Oficio de Registro de Imoveis e 1º Tabelionato de Notas",
        "cnpj"          => "00003194000189"
    ];

    private $endereco;
    private $cartorio;
    private $dataEndereco;

    public function setUp(): void
    {
        $this->dataEndereco['id_endereco'] = 1;
        $this->dataEndereco['endereco'] = 'Rua Jose Alfredo';
        $this->dataEndereco['bairro'] = 'Jose Alfredo';
        $this->dataEndereco['cep'] = '2876505';
        $this->dataEndereco['cidade_id'] = '5208707';
        $this->dataEndereco['cartorio_cnpj'] = $this->dataCartorio['cnpj'];

        $this->cartorio = new Cartorio();
        $this->endereco = new Endereco();

        $this->cartorio->insert($this->dataCartorio);
        $this->endereco->insert($this->dataEndereco);
    }


    public function testFind()
    {
        $response = $this->endereco->find($this->dataEndereco['id_endereco']);
        $this->assertIsObject($response);
    }

    public function testUpdate()
    {
        $response = $this->endereco->update(
            $this->dataEndereco['id_endereco'],
            ["endereco" => "Rua Jose rodoufo jr."]
        );

        $this->assertTrue($response);
    }

    public function testAllWithoutFilter()
    {
        $response = $this->endereco->all();
        $this->assertIsArray($response);
    }

    public function testAllWithFilter()
    {
        $response = $this->endereco->all(
            "WHERE id_endereco = {$this->dataEndereco['id_endereco']}"
        );
        $this->assertIsArray($response);
    }

    public function teardown(): void
    {
        $this->endereco->delete($this->dataEndereco['id_endereco']);
        $this->cartorio->delete($this->dataCartorio['cnpj']);
    }
}
