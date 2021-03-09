<?php

namespace Modules\Article\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * 模型
 * @package Modules\Article\Database\factories
 */
class ModelFactory extends Factory
{

    protected $model = \Modules\Article\Entities\Model::class;

    public function definition()
    {
        return [
            'user_id' => 1,
            'site_id' => 1,
            'title' => $this->faker->word(),
        ];
    }
}
