<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->insert([
            [
                'street' => 'Rua João Manoel dos Santos',
                'number' => '1519',
                'district' => 'Centro',
                'complement' => '',
                'zip_code' => '86390-000',
                'city' => 'Cambará',
                'state' => 'Paraná',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
