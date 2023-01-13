<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Vendor',
            'description' => 'Vendor',
        ]);

        DB::table('roles')->insert([
        
            'name' => 'Manager',
            'description' => 'Manager',
        ]);
        
           DB::table('roles')->insert([
            'name' => 'District-Manager',
            'description' => 'District-Manager',
        ]);

        DB::table('roles')->insert([
        
            'name' => 'Customer',
            'description' => 'Customer',
        ]);
    }
}
