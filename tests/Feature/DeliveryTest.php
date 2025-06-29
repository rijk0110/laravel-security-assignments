<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Delivery;

class DeliveryTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_delivery_success()
    {
        $response = $this->post('/deliveries', [
            'name' => 'Test levering',
            'status' => 'open',
            'order_deadline' => now()->addDays(5)->toDateString(),
        ]);

        $response->assertRedirect('/deliveries');
        $this->assertDatabaseHas('deliveries', [
            'name' => 'Test levering',
        ]);
    }

    public function test_create_delivery_validation_error()
    {
        $response = $this->post('/deliveries', [
            'name' => '',
            'status' => '',
            'order_deadline' => 'invalid-date',
        ]);

        $response->assertSessionHasErrors(['name', 'status', 'order_deadline']);
    }

    public function test_delete_delivery_success()
    {
        $delivery = Delivery::create([
            'name' => 'Te verwijderen levering',
            'status' => 'open',
            'order_deadline' => now()->addDays(3)->toDateString(),
        ]);

        $response = $this->delete("/deliveries/{$delivery->id}");

        $response->assertRedirect('/deliveries');
        $this->assertDatabaseMissing('deliveries', ['id' => $delivery->id]);
    }

    public function test_index_delivery_shows_deliveries()
    {
        Delivery::create([
            'name' => 'Test delivery 1',
            'status' => 'open',
            'order_deadline' => now()->addDays(2)->toDateString(),
        ]);

        $response = $this->get('/deliveries');
        $response->assertStatus(200);
        $response->assertSee('Test delivery 1');
    }
}
