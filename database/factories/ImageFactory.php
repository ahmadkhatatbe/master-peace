<?php
// database/factories/ImageFactory.php

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition()
    {
        return [
            'vehicle_id' => $this->faker->numberBetween(1, 50),
            'filename' => $this->faker->imageUrl(640, 480, 'vehicles'),
            // Adjust dimensions and keyword as needed
            'description' => $this->faker->sentence,
        ];
    }
}
