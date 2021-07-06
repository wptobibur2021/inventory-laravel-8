<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expense_title' => $this->faker->name(),
            'details' =>$this->faker->name(),
            'amount' => $this->faker->unique()->numberBetween(1000, 5000),
            'date' => $this->faker->dateTime(),
        ];
    }
}
