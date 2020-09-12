<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ravi Kumar',
                'shop_name' => 'Rv Enterprises',
                'email' => 'ravikumar181094@gmail.com',
                'user_type' => 'buyer',
                'gst_type' => NULL,
                'phone' => '8124680627',
                'alternate_phone' => NULL,
                'address' => NULL,
                'bank_details' => NULL,
                'email_verified_at' => NULL,
                'password' => NULL,
                'status' => 'active',
                'remember_token' => NULL,
                'created_at' => '2020-09-12 15:46:31',
                'updated_at' => '2020-09-12 15:46:31',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'Murugan',
                'shop_name' => 'Muruga Traders',
                'email' => 'weq2@vdf.mj',
                'user_type' => 'buyer',
                'gst_type' => 'other_state',
                'phone' => '12133333333',
                'alternate_phone' => '2312414345',
                'address' => 'No 3, Chinthari pet',
                'bank_details' => 'CUB, TNagar Branch',
                'email_verified_at' => NULL,
                'password' => NULL,
                'status' => 'active',
                'remember_token' => NULL,
                'created_at' => '2020-09-12 16:07:48',
                'updated_at' => '2020-09-12 17:03:44',
            ),
            2 => 
            array (
                'id' => 7,
                'name' => 'Doss',
                'shop_name' => 'D&C Makers Pvt Ltd.',
                'email' => 'adsasd@ggfhsga.in',
                'user_type' => 'seller',
                'gst_type' => 'our_state',
                'phone' => '23123',
                'alternate_phone' => '2312323',
                'address' => 'da',
                'bank_details' => 'CUN Nungabakkam Branch',
                'email_verified_at' => NULL,
                'password' => NULL,
                'status' => 'active',
                'remember_token' => NULL,
                'created_at' => '2020-09-12 16:23:44',
                'updated_at' => '2020-09-12 17:03:07',
            ),
            3 => 
            array (
                'id' => 8,
                'name' => 'Mohan',
                'shop_name' => 'Maruthi Traders',
                'email' => 'mohan@gmail.com',
                'user_type' => 'seller',
                'gst_type' => 'other_state',
                'phone' => '6312312323',
                'alternate_phone' => '3123124441',
                'address' => 'No 12, west masi road, Chennai',
                'bank_details' => '1234 4324 1323 1235, Hdfc Bank, Perungudi Branch',
                'email_verified_at' => NULL,
                'password' => NULL,
                'status' => 'active',
                'remember_token' => NULL,
                'created_at' => '2020-09-12 16:48:55',
                'updated_at' => '2020-09-12 16:59:27',
            ),
        ));
        
        
    }
}