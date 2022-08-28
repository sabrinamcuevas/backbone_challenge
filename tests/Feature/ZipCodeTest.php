<?php

namespace Tests\Feature;

use Tests\TestCase;

class ZipCodeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_zip_code_found(): void
    {
        $response = $this->get('/api/zip-codes/01110');
        $response->assertStatus(200);
    }

    public function test_zip_code_not_found()
    {
        $response = $this->get('/api/zip-codes/01115');
        $response->assertStatus(404);
    }
}
