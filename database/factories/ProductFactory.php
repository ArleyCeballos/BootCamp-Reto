<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    use HasFactory;

    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->numerify('PROD-#####'),
            'name' => $this->faker->words(3, true),
            // 'stock' => 0,
            'stock' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->paragraph(2),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'categorie_id' => function () {
                return \App\Models\Categorie::factory()->create()->id;
            },
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Product $product) {
            if ($product->stock <= 0) {
                $product->status = 'inactive';
            }
            else{
                $product->status = 'active';
            }
        });
    }
}
