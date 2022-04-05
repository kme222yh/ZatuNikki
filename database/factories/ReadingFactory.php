<?php

namespace Database\Factories;

use App\Models\Reading;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ReadingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reading::class;

    protected $i=0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => "かんそう".$this->i,
            'contents' => $this->faker->paragraph(),
            'updated_at' => Carbon::now()->addDay(-$this->i++),
        ];
    }
}
