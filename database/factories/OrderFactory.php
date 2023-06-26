<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    // protected $model = \Modules\Edu\Entities\TopicFactory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "sn" => md5(mt_rand(1, 9999) . mt_rand(1, 9999)),
            "trade_no" => md5(mt_rand(1, 9999) . mt_rand(1, 9999)),
            "pay_type" => "alipay",
            "data" => [],
            "package_id" => 1,
            'subject' => config('app.name'),
            'price' => 375,
            'pay_state' => true,
        ];
    }
}
