<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Fuller Nash',
                'category' => 'Voluptas omnis proid',
                'sku' => 'Corporis et non aut',
                'price' => 699.0,
                'quantity' => 732,
                'status' => '1',
                'slug' => 'voluptas-omnis-proid-fuller-nash-1',
                'deleted_at' => NULL,
                'created_at' => '2023-04-12 07:12:27',
                'updated_at' => '2023-04-12 09:08:17',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Helen Burks',
                'category' => 'Sit officia aut com',
                'sku' => 'Amet sit ut deserun',
                'price' => 387.0,
                'quantity' => 109,
                'status' => '1',
                'slug' => 'sit-officia-aut-com-helen-burks-2',
                'deleted_at' => NULL,
                'created_at' => '2023-04-12 09:09:32',
                'updated_at' => '2023-04-12 09:09:32',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Gray Nichols',
                'category' => 'Voluptates numquam a',
                'sku' => 'Non voluptates labor',
                'price' => 246.0,
                'quantity' => 190,
                'status' => '1',
                'slug' => 'voluptates-numquam-a-gray-nichols-3',
                'deleted_at' => NULL,
                'created_at' => '2023-04-12 09:09:38',
                'updated_at' => '2023-04-12 09:09:38',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Lillith Cannon',
                'category' => 'Rerum aliquip in sit',
                'sku' => 'Et in dolor qui et b',
                'price' => 286.0,
                'quantity' => 144,
                'status' => '1',
                'slug' => 'rerum-aliquip-in-sit-lillith-cannon-4',
                'deleted_at' => '2023-04-12 09:20:30',
                'created_at' => '2023-04-12 09:10:28',
                'updated_at' => '2023-04-12 09:20:30',
            ),
        ));
        
        
    }
}