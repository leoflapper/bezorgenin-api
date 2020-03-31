<?php

namespace App\Console\Commands;

use App\Models\Meal;
use App\Repositories\KitchenRepository;
use App\Repositories\MealCategoryRepository;
use Illuminate\Console\Command;

class CleanMealCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meal-categories:clean-up';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleans up meal categories';

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
        /**
         * @var $mealCategoryRepository MealCategoryRepository
         */
        $mealCategoryRepository = app( MealCategoryRepository::class);

        $existing = [];
        foreach($mealCategoryRepository->makeModel()->query()->get() as $mealCategory) {
            if(!Meal::query()->where('meal_category_id', $mealCategory->id)->count()) {
                $this->output->success(sprintf('Deleting %s, there are not products', $mealCategory->name));
                $mealCategory->delete();
            }

            if(isset($existing[strtolower($mealCategory->name)])) {
                $correctMealCategoryId = $existing[strtolower($mealCategory->name)];
                if($meals = Meal::query()->where('meal_category_id', $mealCategory->id)->get()) {
                    foreach ($meals as $meal) {
                        $this->output->success(sprintf('Changing %d, to same category %d', $mealCategory->id, $correctMealCategoryId));
                        $meal->meal_category_id = $correctMealCategoryId;
                        $meal->save();
                    }
                }

                if(!Meal::query()->where('meal_category_id', $mealCategory->id)->count()) {
                    $mealCategory->delete();
                    $this->output->success(sprintf('Deleting %s, there are not products', $mealCategory->name));
                }
            } else {
                $existing[strtolower($mealCategory->name)] = $mealCategory->id;
            }

        }
    }
}
