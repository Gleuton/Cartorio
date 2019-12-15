<?php
/**
 * Author: gleuton.dutra
 */

namespace Tests\Feature;

use App\Controllers\ContatoController;
use PHPUnit\Framework\TestCase;

class ContatoControllerTest extends TestCase
{

    protected $contato;

    protected function setUp(): void
    {
        $this->contato = new ContatoController();
    }

    public function testFindIdNotfound()
    {
        $response = $this->contato->show(1);

        $this->assertFalse($response);
    }
}
