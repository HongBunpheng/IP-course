<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_we_can_access_get_all_categories_api()
    {
        // Seed the database with test data
        $this->artisan('db:seed', ['--class' => 'CategorySeeder']);

        // Make a GET request to the categories endpoint
        $response = $this->get('/api/categories');

        // Assert that the response status is 200 and contains the expected structure
        $response->assertStatus(200)
                 ->assertJsonFragment(["message" => "success"]);
    }
}