<?php

use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('stocks')->delete();
        
        \DB::table('stocks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'buyer_id' => '1',
                'product_id' => '3',
                'quantity' => 100,
                'buying_price' => 2.0,
                'total' => 200.0,
                'buy_date' => '2020-09-13',
                'created_at' => '2020-09-13 09:59:48',
                'updated_at' => '2020-09-13 09:59:48',
            ),
            1 => 
            array (
                'id' => 2,
                'buyer_id' => '1',
                'product_id' => '1',
                'quantity' => 1,
                'buying_price' => 1.0,
                'total' => 1.0,
                'buy_date' => '2020-09-13',
                'created_at' => '2020-09-13 10:03:05',
                'updated_at' => '2020-09-13 10:03:05',
            ),
            2 => 
            array (
                'id' => 3,
                'buyer_id' => '6',
                'product_id' => '3',
                'quantity' => 12,
                'buying_price' => 21.0,
                'total' => 252.0,
                'buy_date' => '2020-09-13',
                'created_at' => '2020-09-13 10:08:52',
                'updated_at' => '2020-09-13 10:08:52',
            ),
            3 => 
            array (
                'id' => 4,
                'buyer_id' => '6',
                'product_id' => '2',
                'quantity' => 1,
                'buying_price' => 3000.0,
                'total' => 3000.0,
                'buy_date' => '2020-09-13',
                'created_at' => '2020-09-13 10:21:13',
                'updated_at' => '2020-09-13 10:21:13',
            ),
            4 => 
            array (
                'id' => 5,
                'buyer_id' => '1',
                'product_id' => '1',
                'quantity' => 80,
                'buying_price' => 12.0,
                'total' => 960.0,
                'buy_date' => '2020-09-13',
                'created_at' => '2020-09-13 10:46:48',
                'updated_at' => '2020-09-13 10:46:48',
            ),
        ));
        
        
    }
}