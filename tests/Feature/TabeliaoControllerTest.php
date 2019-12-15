<?php
/**
 * Author: gleuton.dutra
 */

namespace Tests\Feature;

use App\Controllers\TabeliaoController;
use PHPUnit\Framework\TestCase;

class TabeliaoControllerTest extends TestCase
{

    protected $tabeliao;

    protected function setUp(): void
    {
        $this->tabeliao = new TabeliaoController();
    }

    public function testFindIdNotfound()
    {
        $response = $this->tabeliao->show(1);

        $this->assertFalse($response);
    }
}
