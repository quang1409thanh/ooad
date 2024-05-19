<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\AuctionItem;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test if the login page is accessible.
     */
    public function test_the_login_page_is_accessible(): void
    {
        $response = $this->get('/customer_login');

        $response->assertStatus(200);
        $response->assertSee('Login');
    }

    /**
     * Test user registration.
     */
//    public function test_user_can_register(): void
//    {
//        $response = $this->post('/register', [
//            'name' => 'Test User',
//            'email' => 'testuser@example.com',
//            'password' => 'password',
//            'password_confirmation' => 'password',
//        ]);
//
//        $response->assertRedirect('/');
//        $this->assertAuthenticated();
//    }
//
    /**
     * Test user login.
     */
    public function test_user_can_login(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'password'),
        ]);

        $response = $this->post('/customer_login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test creating an auction item.
     */
//    public function test_authenticated_user_can_create_auction_item(): void
//    {
//        $user = User::factory()->create();
//        $this->actingAs($user);
//
//        $response = $this->post('/product', [
//            'name' => 'Test Auction Item',
//            'description' => 'This is a test auction item.',
//            'starting_bid' => 100,
//            'end_time' => now()->addDays(7),
//        ]);
//
//        $response->assertStatus(201);
//        $this->assertDatabaseHas('auction_items', [
//            'name' => 'Test Auction Item',
//        ]);
//    }

    /**
     * Test viewing an auction item.
     */
//    public function test_user_can_view_an_auction_item(): void
//    {
//        $auctionItem = Product::factory()->create();
//
//        $response = $this->get('/product/' . $auctionItem->id);
//
//        $response->assertStatus(200);
//        $response->assertSee($auctionItem->name);
//        $response->assertSee($auctionItem->description);
//    }
}
