<?php
/**
 * Author: gleuton.dutra
 */

namespace Tests\Unit;

use App\Models\Cartorio;
use PHPUnit\Framework\TestCase;

class CartorioTest extends TestCase
{
    private $dataCartorio = [
        "nome_fantasia" => "Oficio de Registro de Imoveis e 1º Tabelionato de Notas",
        "razao_social"  => "Oficio de Registro de Imoveis e 1º Tabelionato de Notas",
        "cnpj"          => "00003194000189"
    ];

    private $cartorio;

    public function setUp(): void
    {
        $this->cartorio = new Cartorio();
        $this->cartorio->insert($this->dataCartorio);
    }

    public function testInsertDuplicateId()
    {
        $this->expectException(\PDOException::class);
        $this->cartorio->insert($this->dataCartorio);
    }

    public function testFind()
    {
        $response = $this->cartorio->find($this->dataCartorio['cnpj']);
        $this->assertIsObject($response);
    }

    public function testUpdate()
    {
        $response = $this->cartorio->update(
            $this->dataCartorio['cnpj'],
            ["razao_social" => "Oficio de Registro de Imoveis"]
        );

        $this->assertTrue($response);
    }

    public function testAllWithoutFilter()
    {
        $response = $this->cartorio->all();
        $this->assertIsArray($response);
    }

    public function testAllWithFilter()
    {
        $response = $this->cartorio->all("WHERE cnpj = {$this->dataCartorio['cnpj']}");
        $this->assertIsArray($response);
    }

    public function teardown(): void
    {
        $this->cartorio->delete($this->dataCartorio['cnpj']);
    }
}
