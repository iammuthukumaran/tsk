<?php

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('todos')->delete();
        
        \DB::table('todos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_name' => 'Thread',
                'hsn_code' => 'PRD0001234',
                'stock' => 81,
                'cgst' => 6.0,
                'sgst' => 4.0,
                'igst' => 12.0,
                'selling_amount' => 50,
                'status' => 'active',
                'created_at' => '2020-09-12 17:58:03',
                'updated_at' => '2020-09-12 18:57:46',
            ),
            1 => 
            array (
                'id' => 2,
                'product_name' => 'Sewing Machine',
                'hsn_code' => 'PRD1928197',
                'stock' => 1,
                'cgst' => 4.0,
                'sgst' => 3.0,
                'igst' => 10.0,
                'selling_amount' => 12000,
                'status' => 'active',
                'created_at' => '2020-09-12 18:58:32',
                'updated_at' => '2020-09-12 18:59:03',
            ),
            2 => 
            array (
                'id' => 3,
                'product_name' => 'Buttons',
                'hsn_code' => 'PRD2134567',
                'stock' => 112,
                'cgst' => 0.0,
                'sgst' => 0.0,
                'igst' => 2.0,
                'selling_amount' => 10,
                'status' => 'active',
                'created_at' => '2020-09-12 19:00:59',
                'updated_at' => '2020-09-12 19:01:14',
            ),
            3 => 
            array (
                'id' => 4,
                'product_name' => 'Tables',
                'hsn_code' => 'PRD1234567',
                'stock' => 0,
                'cgst' => 10.0,
                'sgst' => 4.0,
                'igst' => 20.0,
                'selling_amount' => 2200,
                'status' => 'active',
                'created_at' => '2020-09-12 19:05:32',
                'updated_at' => '2020-09-12 19:05:32',
            ),
            4 => 
            array (
                'id' => 5,
                'product_name' => 'Needles',
                'hsn_code' => 'PRD1234765',
                'stock' => 0,
                'cgst' => 0.0,
                'sgst' => 0.0,
                'igst' => 0.0,
                'selling_amount' => 300,
                'status' => 'active',
                'created_at' => '2020-09-12 19:06:28',
                'updated_at' => '2020-09-12 19:06:28',
            ),
        ));
        
        
    }
}