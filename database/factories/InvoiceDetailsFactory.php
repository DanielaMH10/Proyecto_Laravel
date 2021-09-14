<?php

namespace Database\Factories;

use App\Models\InvoiceDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceDetailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InvoiceDetails::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice_id' => random_int(1,5),
            'product_id' => random_int(1,30),
            'price' => random_int(200, 20000),
            'quantity' => random_int(1,5)
        ];
    }
}
