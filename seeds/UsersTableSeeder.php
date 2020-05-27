<?php

use App\Models\Tenant;
use Illuminate\Database\Seeder;
use App\Models\User; 
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->users()->create([
            'name' => 'Carlos',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('casb'),

            ]);   
        }
    }