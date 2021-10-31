<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create fake model instances
         */
        $users = User::factory(10)->create();
        $addresses = Address::factory(10)->create();
        $customers = Customer::factory(10)->create();
        
    }
}
