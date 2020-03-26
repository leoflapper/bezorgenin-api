<?php

namespace App\Console\Commands;

use App\Models\Address;
use Illuminate\Console\Command;

class AddCoordinatesToAddresses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addresses:add-coordinates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds coordinates to addresses';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (Address::query()->get() as $address) {
            if(!isset($address->latitude) || !isset($address->longitude)) {
                $this->output->success(sprintf('Setting coordinates for address %s', $address->id));
                $address->setCoordinates();
                $sleep = rand(0, 10);
                $this->output->warning(sprintf('Sleep %s', $sleep));
                sleep($sleep);
            }
        }
    }
}
