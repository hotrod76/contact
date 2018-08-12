<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompaniesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_see_list_of_compaines()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
