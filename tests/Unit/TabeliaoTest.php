<?php
/**
 * Author: gleuton.dutra
 */

namespace Tests\Unit;

use App\Models\Cartorio;
use App\Models\Tabeliao;
use PHPUnit\Framework\TestCase;


class TabeliaoTest extends TestCase
{
    private $dataCartorio = [
        "nome_fantasia" => "Oficio de Registro de Imoveis e 1º Tabelionato de Notas",
        "razao_social"  => "Oficio de Registro de Imoveis e 1º Tabelionato de Notas",
        "cnpj"          => "00003194000189"
    ];

    private $tabeliao;
    private $cartorio;
    private $dataTabeliao;

    public function setUp(): void
    {
        $this->dataTabeliao['id_tabeliao'] = 1;
        $this->dataTabeliao['nome'] = 'Jose Alfredo';
        $this->dataTabeliao['cartorio_cnpj'] = $this->dataCartorio['cnpj'];

        $this->cartorio = new Cartorio();
        $this->tabeliao = new Tabeliao();

        $this->cartorio->insert($this->dataCartorio);
        $this->tabeliao->insert($this->dataTabeliao);
    }


    public function testFind()
    {
        $response = $this->tabeliao->find($this->dataTabeliao['id_tabeliao']);
        $this->assertIsObject($response);
    }

    public function testUpdate()
    {
        $response = $this->tabeliao->update(
            $this->dataTabeliao['id_tabeliao'],
            ["nome" => "Jose rodoufo jr."]
        );

        $this->assertTrue($response);
    }

    public function testAllWithoutFilter()
    {
        $response = $this->tabeliao->all();
        $this->assertIsArray($response);
    }

    public function testAllWithFilter()
    {
        $response = $this->tabeliao->all(
            "WHERE id_tabeliao = {$this->dataTabeliao['id_tabeliao']}"
        );
        $this->assertIsArray($response);
    }

    public function teardown(): void
    {
        $this->tabeliao->delete($this->dataTabeliao['id_tabeliao']);
        $this->cartorio->delete($this->dataCartorio['cnpj']);
    }
}
