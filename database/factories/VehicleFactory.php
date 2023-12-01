<?php
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'make' => $this->faker->word,
            'model' => $this->faker->word,
            'year' => $this->faker->numberBetween(2000, 2023),
            'vin' => $this->faker->unique()->regexify('[A-Z0-9]{17}'),
            'title_code' => $this->faker->word,
            'color' => $this->faker->colorName,
            'primary_damage' => $this->faker->word,
            'secondary_damage' => $this->faker->word,
            'retail_value' => $this->faker->randomFloat(2, 1000, 50000),
            'mileage' => $this->faker->numberBetween(0, 100000),
            'current_bid' => $this->faker->randomFloat(2, 100, 1000),
            'target' => $this->faker->randomFloat(2, 1000, 5000),
            'buy_now_price' => $this->faker->randomFloat(2, 1000, 10000),
            'auction_id' => 1,
            // Assuming a default auction ID of 1
        ];
    }
}
