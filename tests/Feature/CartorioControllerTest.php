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

    public function testFindIdNotfound()
    {
        $response = $this->cartorio->find(123);

        $this->assertFalse($response);
    }
}
