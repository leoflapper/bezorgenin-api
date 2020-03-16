<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Kitchen;

class KitchenApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kitchen()
    {
        $kitchen = factory(Kitchen::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kitchens', $kitchen
        );

        $this->assertApiResponse($kitchen);
    }

    /**
     * @test
     */
    public function test_read_kitchen()
    {
        $kitchen = factory(Kitchen::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/kitchens/'.$kitchen->id
        );

        $this->assertApiResponse($kitchen->toArray());
    }

    /**
     * @test
     */
    public function test_update_kitchen()
    {
        $kitchen = factory(Kitchen::class)->create();
        $editedKitchen = factory(Kitchen::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kitchens/'.$kitchen->id,
            $editedKitchen
        );

        $this->assertApiResponse($editedKitchen);
    }

    /**
     * @test
     */
    public function test_delete_kitchen()
    {
        $kitchen = factory(Kitchen::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kitchens/'.$kitchen->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kitchens/'.$kitchen->id
        );

        $this->response->assertStatus(404);
    }
}
