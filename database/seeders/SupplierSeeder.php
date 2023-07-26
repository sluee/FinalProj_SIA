<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers=[
            [
                'name' => 'Eunizel Gabas',
                'email'=> 'eulagabas24@gmail.com',
                'phone'=>'0912124488'
            ],
            [
                'name' => 'Eunice Gabas',
                'email'=> 'eunicegabas9@gmail.com',
                'phone'=>'0912124488'
            ],
            [
                'name' => 'Edgar Gabas',
                'email'=> 'edgardogabas2@gmail.com',
                'phone'=>'0912124488'
            ],
            [
                'name' => 'Adelina Gabas',
                'email'=> 'geunizels@gmail.com',
                'phone'=>'0912124488'
            ],


        ];

        foreach($suppliers as $supplier){
             Supplier::create([
                'name' => $supplier['name'],
                'email' => $supplier['email'],
                'phone' => $supplier['phone']
            ]);



        }
    }
}
