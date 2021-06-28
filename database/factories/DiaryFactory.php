<?php

namespace Database\Factories;

use App\Models\Diary;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DiaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diary::class;

    protected $i=0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => "タイトルタイトルタイトル",
            'contents' => 'これは内容これは内容これは内容これは内容これは内容こ
            れは内容これは内容これは内容これは内容これは内容
            これは内容これは内容これは内容これは内容これは内容これは内容これ
            は内容これは内容これは内容これは内容これは内容これは内容これは
            内容これは内容これは内容こ
            れは内容これは内容これは内容これは内容これは内容これは内容これは内
            容これは内容これは内容これは内容',
            'published' => $this->faker->boolean(50),
            'date' => Carbon::now()->addDay(-$this->i++)
        ];
    }
}
