<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'village' => $this->faker->address(),
            'post_office' => $this->faker->name(),
            'upzila' => $this->faker->name(),
            'zila' => $this->faker->name(),
            'joining_date' => $this->faker->dateTime(),
            'nid_photo' => 'nidphoto_'.$this->faker->unique(true)->numberBetween(1, 30).'.jpg',
            'nid_no' => $this->faker->phoneNumber,
            'photo'  => 'user_'.$this->faker->unique(true)->numberBetween(1, 30).'.jpg',
        ];
    }
}
