<?php
/**
 * Author: gleuton.dutra
 */

namespace Tests\Feature;

use App\Controllers\CartorioController;
use PHPUnit\Framework\TestCase;

class CartorioControllerTest extends TestCase
{

    protected $cartorio;

    protected function setUp(): void
    {
        $this->cartorio = new CartorioController();
    }

    public function testIndex()
    {
        $response = json_decode($this->cartorio->index());
        $this->assertnotEmpty($response);

        $this->assertIsArray($response);
    }

    public function testFindIdNotfound()
    {
        $response = json_decode($this->cartorio->find(123));

        $this->assertFalse($response);
    }
}
