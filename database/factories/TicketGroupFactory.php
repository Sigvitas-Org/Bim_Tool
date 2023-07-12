<?php

namespace Database\Factories;

use App\Models\TicketGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketGroup>
 */
class TicketGroupFactory extends Factory
{

    protected $model = TicketGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'group_name' => fake()->realText(15),
            'created_at' => fake()->randomElement([date('Y-m-d', strtotime( '+'.mt_rand(0, 7).' days')), fake()->dateTimeThisYear($max = 'now')]),
            'updated_at' => fake()->randomElement([date('Y-m-d', strtotime( '+'.mt_rand(0, 7).' days')), fake()->dateTimeThisYear($max = 'now')]),
        ];
    }

}
