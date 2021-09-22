<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvoiceDetails;


class InvoiceDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvoiceDetails::factory(15)->create();
    }
}
