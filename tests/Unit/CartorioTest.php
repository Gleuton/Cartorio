<?php
/**
 * Author: gleuton.pereira
 */

namespace Tests\Unit;

use App\Models\Cartorio;
use PHPUnit\Framework\TestCase;

class CartorioTest extends TestCase
{
    private $cartorio;

    private $data = [
        "nome_fantasia" => "Oficio de Registro de Imoveis e 1º Tabelionato de Notas",
        "razao_social"  => "Oficio de Registro de Imoveis e 1º Tabelionato de Notas",
        "cnpj"          => "00003194000189"
    ];

    public function setUp(): void
    {
        $this->cartorio = new Cartorio();
        $this->cartorio->insert($this->data);
    }

    public function testInsertDuplicateId()
    {
        $response = $this->cartorio->insert($this->data);
        $this->assertFalse($response);
    }

    public function testFind()
    {
        $response = $this->cartorio->find($this->data['cnpj']);
        $this->assertIsObject($response);
    }

    public function testUpdate()
    {
        $response = $this->cartorio->update(
            $this->data['cnpj'],
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
        $response = $this->cartorio->all("WHERE cnpj = {$this->data['cnpj']}");
        $this->assertIsArray($response);
    }

    public function teardown(): void
    {
        $this->cartorio->delete($this->data['cnpj']);
    }
}
