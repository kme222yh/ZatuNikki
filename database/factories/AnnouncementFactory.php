<?php

namespace Database\Factories;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

    protected $i = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'メンテナンスのお知らせ',
            'contents' => <<< EOF
            ご利用ありがとうございます。
            ざつにっき運営です。
            8月21日午前0時よりサーバーメンテナンス
            を行います。
            メンテナンス終了時刻は同日午前2時を予
            定しております。
            EOF,
            'announcement_type_id' => $this->faker->boolean(50) ? 1 : 2,
            'created_at' => Carbon::now()->addDay(-$this->i++),
            'updated_at' => Carbon::now()->addDay(-$this->i++),
        ];
    }
}
