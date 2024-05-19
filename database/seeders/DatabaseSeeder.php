<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tạo 5 tài khoản Customer với dữ liệu cụ thể
        DB::table('customers')->insert([
            [
                'customer_name' => 'Customer1',
                'email_id' => 'customer1@gmail.com',
                'password' => Hash::make('Test12345678'),
                'address' => 'Address 1',
                'state' => 'State 1',
                'city' => 'City 1',
                'landmark' => 'Landmark 1',
                'pincode' => '111111',
                'status' => 'active',
                'note' => 'Note 1',
                'mobile_no' => '+841234567890',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'customer_name' => 'Customer2',
                'email_id' => 'customer2@gmail.com',
                'password' => Hash::make('Test12345678'),
                'address' => 'Address 2',
                'state' => 'State 2',
                'city' => 'City 2',
                'landmark' => 'Landmark 2',
                'pincode' => '222222',
                'status' => 'active',
                'note' => 'Note 2',
                'mobile_no' => '0987654321',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'customer_name' => 'Customer3',
                'email_id' => 'customer3@gmail.com',
                'password' => Hash::make('Test12345678'),
                'address' => 'Address 3',
                'state' => 'State 3',
                'city' => 'City 3',
                'landmark' => 'Landmark 3',
                'pincode' => '333333',
                'status' => 'active',
                'note' => 'Note 3',
                'mobile_no' => '1122334455',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'customer_name' => 'Customer4',
                'email_id' => 'customer4@gmail.com',
                'password' => Hash::make('Test12345678'),
                'address' => 'Address 4',
                'state' => 'State 4',
                'city' => 'City 4',
                'landmark' => 'Landmark 4',
                'pincode' => '444444',
                'status' => 'active',
                'note' => 'Note 4',
                'mobile_no' => '2233445566',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'customer_name' => 'Customer5',
                'email_id' => 'customer5@gmail.com',
                'password' => Hash::make('Test12345678'),
                'address' => 'Address 5',
                'state' => 'State 5',
                'city' => 'City 5',
                'landmark' => 'Landmark 5',
                'pincode' => '555555',
                'status' => 'active',
                'note' => 'Note 5',
                'mobile_no' => '3344556677',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Tạo 1 tài khoản Employee với dữ liệu cụ thể (nếu cần)
        DB::table('employees')->insert([
            'employee_id' => 1,
            'employee_name' => 'Admin',
            'login_id' => 'admin@gmail.com',
            'password' => Hash::make('Test12345678'), // Mã hóa mật khẩu
            'employee_type' => 'admin',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
