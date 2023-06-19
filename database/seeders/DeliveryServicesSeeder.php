<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $delivery = ['JnE','Si Cepat Exspress', 'JnT'];

        foreach($delivery as $item){
            DB::table('delivery_services')->insert([
                'delivery_service' => $item
            ]);
        }
    }
}
