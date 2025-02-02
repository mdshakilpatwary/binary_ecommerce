<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteInfo;


class SiteInfoTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteInfo::insert([
            // site info data
        [
            'name' => 'TestSite',
            'email' => 'hello@gmail.com',
            'type' => '1',
            'phone' => '01858*****',
            'address' => 'Dhanmondi, Dhaka, Bangladesh',
        ]
        ]);
    }
}
