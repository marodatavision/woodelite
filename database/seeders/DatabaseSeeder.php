<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Inventoryitem;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Paymentinfo;
use App\Models\Squaretimber;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Woodlog;
use Exception;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{

    protected $faker;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /**
         * initialise faker instance
         */
        $this->faker = Faker::create();

        /**
         * Create fake model instances
         */
        $users = User::factory(10)->create();
        $addresses = Address::factory(30)->create();
        $customers = Customer::factory(10)->create();
        $suppliers = Supplier::factory(10)->create();
        $inventoryitems = Inventoryitem::factory(30)->create();
        $orders = Order::factory(100)->create();
        $woodlogs = Woodlog::factory(200)->create();
        $squaretimbers = Squaretimber::factory(1000)->create();
        $invoices = Invoice::factory(120)->create();
        $paymentinfos = Paymentinfo::factory(5)->create();

        /**
         * setting up oneToMany relations
         */
        $this->relateMany($customers, $addresses, 'addresses', 6);
        $this->relateMany($suppliers, $addresses, 'addresses', 6);
        $this->relateMany($suppliers, $inventoryitems, 'inventoryitems', 4);
        $this->relateMany($customers, $orders, 'orders', 20);
        $this->relateMany($orders, $woodlogs, 'woodlogs', 3);
        $this->relateMany($woodlogs, $squaretimbers, 'squaretimbers', 5);
        $this->relateMany($orders, $invoices, 'invoices', 3);
        $this->relateMany($paymentinfos, $invoices, 'invoices', 25);

        /**
         * setting up manyToMany relations
         */
        for ($i=0; $i < 300; $i++) { 
            try {
                $randomInventoryitem = $this->faker->randomElement($inventoryitems);
                $randomOrder = $this->faker->randomElement($orders);
                $randomInventoryitem->orders()->attach($randomInventoryitem->id);

            } catch (Exception $e) {
                echo 'relation of Inventoryitem ' . $randomInventoryitem->id . ' with Order ' . $randomOrder->id . ' failed!';
            }
        }

    }
    
    /**
     * relate two collections of type oneToMany regardless
     * if it's a polymorphic or a normal relation
     *
     * @param  Illuminate\Support\Collection $hasManyCollection
     * @param  Illuminate\Support\Collection $belongsToCollection
     * @param  String $relation
     * @param  Int $iterations
     * @return void
     */
    public function relateMany(Collection $hasManyCollection, Collection $belongsToCollection, String $relation, Int $iterations)
    {
        if($hasManyCollection->count() < $belongsToCollection->count()) {
            $this->recursiveHelper($belongsToCollection, $hasManyCollection, $relation);   
        }
        else{
            echo "the hasManyCollection has to contain less items then the belongsToCollection!";
        }
    }

    public function recursiveHelper($belongsToCollection, $hasManyCollection, $relation){
        for ($i=0; $i < $belongsToCollection->count(); $i++) { 
            if($i < $hasManyCollection->count()){
                $hasManyCollection->get($i)->{$relation}()->save($belongsToCollection->get($i));
            }
            else if($belongsToCollection->count() > $i){
                $belongsToCollection->shift($i);
                $this->recursiveHelper($belongsToCollection, $hasManyCollection, $relation);
            }
        }
    }
}
