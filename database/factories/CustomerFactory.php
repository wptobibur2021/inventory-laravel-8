<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word($nb=10,$absText = true);
        $slug = Str::slug($name);
        return [
            'name' =>  $name,
            'slug' => $slug,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'shop_address' => $this->faker->address(),
            'shop_name' => $this->faker->name(),
            'nid_photo' => 'nidphoto_'.$this->faker->unique(true)->numberBetween(1, 30).'.jpg',
            'nid_no' => $this->faker->phoneNumber,
            'photo'  => 'user_'.$this->faker->unique(true)->numberBetween(1, 30).'.jpg',
        ];
    }
}
