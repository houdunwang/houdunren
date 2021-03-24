<?php

namespace Modules\Article\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Article\Entities\Category;

/**
 * 文章内容
 * @package Modules\Article\Database\factories
 */
class ContentFactory extends Factory
{
    protected $model = \Modules\Article\Entities\Content::class;

    public function definition()
    {
        $category = Category::where('site_id', 1)->orderByRaw('rand()')->first();
        return [
            'site_id' => 1,
            'user_id' => 1,
            'model_id' => 1,
            'category_id' => $category->id,
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(10),
            'preview' => $this->faker->imageUrl(300, 300),
            'description' => $this->faker->sentence(),
        ];
    }
}
