<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //Arrange  - Preparacion

        //Act - Accion

        //Assert - Verificacion

        $response = $this->get('/');

        //Act - Accion
        $response->assertStatus(200);
        //Assert - Verificacion
        $response->assertSee('laratter');
    }

    public function testCanSearchForMessages()
    {
        $response = $this->get('/messages?query=alice');

        $response->assertSee('Alice');
    }

}
