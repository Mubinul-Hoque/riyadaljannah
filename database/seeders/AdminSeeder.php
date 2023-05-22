<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $admin = [
            'name' => 'Mubinul',
            'email' => 'mubinul77@gmail.com',
            'password' => bcrypt('78127812')
        ];
        Admin::create($admin);
    }
}
