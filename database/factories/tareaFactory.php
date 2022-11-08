<?php

namespace Database\Factories;

use App\Models\Tarea;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarea>
 */
class tareaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'description'=>$this->faker->paragraph(),
            'imagen' => $this->faker->image('public/storage', 640, 480 , null, false),
            'category'=>$this->faker->name(),
        ];

            //
    }
}
