<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $groups = ['informe', 'examen', 'practica', 'entrega'];
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'groups' => $this->faker->randomElements($groups, $this->faker->numberBetween(1, count($groups)-1))
        ];
    }
}
