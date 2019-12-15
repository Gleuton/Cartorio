<?php
/**
 * Author: gleuton.dutra
 */

namespace Tests\Unit;

use App\Models\Cartorio;
use App\Models\Contato;
use App\Models\Tabeliao;
use PHPUnit\Framework\TestCase;


class ContatoTest extends TestCase
{
    private $dataCartorio = [
        "nome_fantasia" => "Oficio de Registro de Imoveis e 1º Tabelionato de Notas",
        "razao_social"  => "Oficio de Registro de Imoveis e 1º Tabelionato de Notas",
        "cnpj"          => "00003194000189"
    ];

    private $contato;
    private $cartorio;
    private $dataContato;

    public function setUp(): void
    {
        $this->dataContato['id_contato'] = '3';
        $this->dataContato['fone'] = '6436381218';
        $this->dataContato['email'] = 'criisraelandia@yahoo.com.br';
        $this->dataContato['cartorio_cnpj'] = $this->dataCartorio['cnpj'];

        $this->cartorio = new Cartorio();
        $this->contato = new Contato();

        $this->cartorio->insert($this->dataCartorio);
        $this->contato->insert($this->dataContato);
    }


    public function testFind()
    {
        $response = $this->contato->find($this->dataContato['id_contato']);
        $this->assertIsObject($response);
    }

    public function testUpdate()
    {
        $response = $this->contato->update(
            $this->dataContato['id_contato'],
            ["fone" => "9999999999"]
        );

        $this->assertTrue($response);
    }

    public function testAllWithoutFilter()
    {
        $response = $this->contato->all();
        $this->assertIsArray($response);
    }

    public function testAllWithFilter()
    {
        $response = $this->contato->all(
            "WHERE id_contato = {$this->dataContato['id_contato']}"
        );
        $this->assertIsArray($response);
    }

    public function teardown(): void
    {
        $this->contato->delete($this->dataContato['id_contato']);
        $this->cartorio->delete($this->dataCartorio['cnpj']);
    }
}
