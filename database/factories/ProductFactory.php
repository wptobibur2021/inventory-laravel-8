<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->word($nb=10,$absText = true);
        $slug = Str::slug($product_name);
        return [
            'product_name' => $product_name,
            'product_slug' => $slug,
            'product_code' => $this->faker->unique()->numberBetween(100, 500),
            'root' => $this->faker->text(50),
            'buying_price' => $this->faker->numberBetween(50, 200),
            'selling_price' => $this->faker->numberBetween(60, 250),
            'status' => $this->faker->numberBetween(0, 1),
            'product_quantity' => $this->faker->numberBetween(50, 200),
            'status' => $this->faker->numberBetween(0, 1),
            'return' => $this->faker->numberBetween(0, 1),
            'damage' => $this->faker->numberBetween(0, 1),
            'category_id' => $this->faker->numberBetween(1, 30),
            'brand_id'    => $this->faker->numberBetween(1, 30),
            'image' => 'digital_'.$this->faker->unique()->numberBetween(1, 30).'.jpg',
            'buying_date' => $this->faker->dateTime(),
        ];
    }
}
