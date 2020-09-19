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
                'name' => 'Admin',
                'shop_name' => 'Tsk Agencies',
                'gst_number' => '33CVOPS4145P1ZS',
                'email' => 'admin@gmail.com',
                'user_type' => 'admin',
                'gst_type' => 'our_state',
                'phone' => '8124680627',
                'alternate_phone' => '123456789',
                'address' => '59/1, Sannathi Street, South Car Street, THIRUCHNGODE-637 211.',
                'shop_address' => 'Namakkal Dt, Tamilnadu.',
                'bank_details' => 'Vijaya Bank, Thiruchngode Branch, 305401013000016, VJYA3054',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ZH5uhuex4Satf1T0Jg7ElOkBMHdqnXt9yQdq2b5kKs4czS3HdY87y',
                'status' => 'active',
                'remember_token' => NULL,
                'created_at' => '2020-09-12 15:46:31',
                'updated_at' => '2020-09-19 09:27:41',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'Murugan',
                'shop_name' => 'Muruga Traders',
                'gst_number' => NULL,
                'email' => 'weq2@vdf.mj',
                'user_type' => 'buyer',
                'gst_type' => 'our_state',
                'phone' => '12133333333',
                'alternate_phone' => '2312414345',
                'address' => 'No 3, Chinthari pet',
                'shop_address' => NULL,
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
                'gst_number' => NULL,
                'email' => 'adsasd@ggfhsga.in',
                'user_type' => 'seller',
                'gst_type' => 'our_state',
                'phone' => '23123',
                'alternate_phone' => '2312323',
                'address' => 'da',
                'shop_address' => NULL,
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
                'gst_number' => NULL,
                'email' => 'mohan@gmail.com',
                'user_type' => 'seller',
                'gst_type' => 'other_state',
                'phone' => '6312312323',
                'alternate_phone' => '3123124441',
                'address' => 'No 12, west masi road, Chennai',
                'shop_address' => NULL,
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