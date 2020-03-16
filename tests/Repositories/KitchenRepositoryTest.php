<?php namespace Tests\Repositories;

use App\Models\Kitchen;
use App\Repositories\KitchenRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KitchenRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KitchenRepository
     */
    protected $kitchenRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kitchenRepo = \App::make(KitchenRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kitchen()
    {
        $kitchen = factory(Kitchen::class)->make()->toArray();

        $createdKitchen = $this->kitchenRepo->create($kitchen);

        $createdKitchen = $createdKitchen->toArray();
        $this->assertArrayHasKey('id', $createdKitchen);
        $this->assertNotNull($createdKitchen['id'], 'Created Kitchen must have id specified');
        $this->assertNotNull(Kitchen::find($createdKitchen['id']), 'Kitchen with given id must be in DB');
        $this->assertModelData($kitchen, $createdKitchen);
    }

    /**
     * @test read
     */
    public function test_read_kitchen()
    {
        $kitchen = factory(Kitchen::class)->create();

        $dbKitchen = $this->kitchenRepo->find($kitchen->id);

        $dbKitchen = $dbKitchen->toArray();
        $this->assertModelData($kitchen->toArray(), $dbKitchen);
    }

    /**
     * @test update
     */
    public function test_update_kitchen()
    {
        $kitchen = factory(Kitchen::class)->create();
        $fakeKitchen = factory(Kitchen::class)->make()->toArray();

        $updatedKitchen = $this->kitchenRepo->update($fakeKitchen, $kitchen->id);

        $this->assertModelData($fakeKitchen, $updatedKitchen->toArray());
        $dbKitchen = $this->kitchenRepo->find($kitchen->id);
        $this->assertModelData($fakeKitchen, $dbKitchen->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kitchen()
    {
        $kitchen = factory(Kitchen::class)->create();

        $resp = $this->kitchenRepo->delete($kitchen->id);

        $this->assertTrue($resp);
        $this->assertNull(Kitchen::find($kitchen->id), 'Kitchen should not exist in DB');
    }
}
