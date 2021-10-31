<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Order;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

class DatabaseRelationsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

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
        
        $hasManyCollection->each(function($hasManyElement)use($belongsToCollection, $relation, $iterations){
            for ($i=0; $i < $this->faker->numberBetween(2, $iterations); $i++) { 
                try{
                    $randomBelongsToElement = $this->faker->randomElement($belongsToCollection);
                    $hasManyElement->{$relation}()->save($randomBelongsToElement);
                }
                catch(Exception $e){
                    echo 'relation of ' . get_class($hasManyElement) . ' ' 
                    . $hasManyElement->id . ' with ' . get_class($randomBelongsToElement) . ' ' 
                    . $randomBelongsToElement->id .  ' failed!';
                }
            }
        });
    
    }

    public function test_customer_orders_relation()
    {
        $customers = Customer::factory(3)->make();
        $orders = Order::factory(10)->make();

        $this->relateMany($customers, $orders, 'orders', 3);

        $customers->each(function($customer){
            $this->assertGreaterThan(0, $customer->orders->count());
        });

        $orders->each(function($order){
            if($order->customer){
                $this->assertEquals('App\Models\Customer', get_class($order->customer));
            }
            else{
                $this->assertEquals(null, $order->customer);
            }
        });


    }
}
