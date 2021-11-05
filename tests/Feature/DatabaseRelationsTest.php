<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Inventoryitem;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Paymentinfo;
use App\Models\Squaretimber;
use App\Models\Supplier;
use App\Models\Woodlog;
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


    public function test_customer_orders_relation()
    {
        $customers = Customer::factory(3)->create();
        $orders = Order::factory(20)->create();

        $this->relateMany($customers, $orders, 'orders', 3);

        $customers->each(function($customer){
            $this->assertGreaterThan(0, $customer->orders->count());
        });

        $orders->each(function($order){
            $this->assertEquals('App\Models\Customer', get_class($order->customer));
        });
    }


    public function test_customer_address_relation()
    {
        $customers = Customer::factory(3)->create();
        $addresses = Address::factory(20)->create();

        $this->relateMany($customers, $addresses, 'addresses', 3);

        $customers->each(function($customer){
            $this->assertGreaterThan(0, $customer->addresses->count());
        });
    }


    public function test_order_woodlog_relation()
    {
        $orders = Order::factory(3)->create();
        $woodlogs = Woodlog::factory(20)->create();

        $this->relateMany($orders, $woodlogs, 'woodlogs', 3);

        $orders->each(function($order){
            $this->assertGreaterThan(0, $order->woodlogs->count());
        });

        $woodlogs->each(function($woodlog){
            $this->assertEquals('App\Models\Order', get_class($woodlog->order));
        });
    }

    public function test_order_invoice_relation()
    {
        $orders = Order::factory(3)->create();
        $invoices = Invoice::factory(20)->create();

        $this->relateMany($orders, $invoices, 'invoices', 3);

        $orders->each(function($order){
            $this->assertGreaterThan(0, $order->invoices->count());
        });

        $invoices->each(function($invoice){
            $this->assertEquals('App\Models\Order', get_class($invoice->order));
        });
    }

    public function test_woodlog_squaretimber_relation()
    {
        $woodlogs = Woodlog::factory(3)->create();
        $squaretimbers = Squaretimber::factory(20)->create();

        $this->relateMany($woodlogs, $squaretimbers, 'squaretimbers', 3);

        $woodlogs->each(function($woodlog){
            $this->assertGreaterThan(0, $woodlog->squaretimbers->count());
        });

        $squaretimbers->each(function($squaretimber){
            $this->assertEquals('App\Models\Woodlog', get_class($squaretimber->woodlog));
        });
    }

    public function test_paymentinfo_invoice_relation()
    {
        $paymentinfos = Paymentinfo::factory(3)->create();
        $invoices = Invoice::factory(20)->create();

        $this->relateMany($paymentinfos, $invoices, 'invoices', 3);

        $paymentinfos->each(function($paymentinfo){
            $this->assertGreaterThan(0, $paymentinfo->invoices->count());
        });

        $invoices->each(function($invoice){
            $this->assertEquals('App\Models\Paymentinfo', get_class($invoice->paymentinfo));
        });
    }

    public function test_supplier_inventoryitem_relation()
    {
        $suppliers = Supplier::factory(3)->create();
        $inventoryitems = Inventoryitem::factory(20)->create();

        $this->relateMany($suppliers, $inventoryitems, 'inventoryitems', 3);

        $suppliers->each(function($supplier){
            $this->assertGreaterThan(0, $supplier->inventoryitems->count());
        });

        $inventoryitems->each(function($inventoryitem){
            $this->assertEquals('App\Models\Supplier', get_class($inventoryitem->supplier));
        });
    }

    public function test_supplier_address_relation()
    {
        $suppliers = Supplier::factory(3)->create();
        $addresses = Address::factory(20)->create();

        $this->relateMany($suppliers, $addresses, 'addresses', 3);

        $suppliers->each(function($supplier){
            $this->assertGreaterThan(0, $supplier->addresses->count());
        });

    }

    public function test_order_inventoryitem_relation()
    {
        // many to many relation
        $orders = Order::factory(2)->create();
        $inventoryitems = Inventoryitem::factory(4)->create();

        $orders->each(function($order)use($inventoryitems){
            $inventoryitems->each(function($inventoryitem)use($order){
                $inventoryitem->orders()->attach($order->id);
            });
        });

        $orders->each(function($order){
            $this->assertGreaterThan(1, $order->inventoryitems->count());
        });

        $inventoryitems->each(function($inventoryitem){
            $this->assertGreaterThan(1, $inventoryitem->orders->count());
        });
    }
}
