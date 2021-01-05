<?php

use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('membership')->insert([
            'name' => "Silver",
            'slug' => 'silver',
            'fee' => 100000,
            'vat' => 10,
        ]);
        DB::table('membership')->insert([
            'name' => "Gold",
            'slug' => 'gold',
            'fee' => 200000,
            'vat' => 10,
        ]);
        DB::table('membership')->insert([
            'name' => "Platinum",
            'slug' => 'platinum',
            'fee' => 300000,
            'vat' => 10,
        ]);
        DB::table('membership')->insert([
            'name' => "Black",
            'slug' => 'black',
            'fee' => 500000,
            'vat' => 10,
        ]);
        DB::table('membership')->insert([
            'name' => "VIP",
            'slug' => 'vip',
            'fee' => 1000000,
            'vat' => 10,
        ]);
        DB::table('membership')->insert([
            'name' => "VVIP",
            'slug' => 'vvip',
            'fee' => 2000000,
            'vat' => 10,
        ]);
    }
}
