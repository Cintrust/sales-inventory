<?php

use App\Catalog;
use Illuminate\Database\Seeder;

class CatalogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =         $faker = Faker\Factory::create();

//        $catalogs =[];
        for ($i=0;$i<50;++$i){

            Catalog::create (   [
                "name"=>$faker->name." ".$faker->currencyCode,
                "catalog_type"=>$faker->randomElement([Catalog::TYPE_GOODS, Catalog::TYPE_UTILITY]),
                "qty_per_bulk"=>$faker->randomElement([2,6,10,12,24]),
                "low_stock_qty"=>$faker->randomElement([1,2,3,5,6,9,10,12,24]),
                "description"=>$faker->sentence,
            ]);
        }

//        Catalog::query()->insert($catalogs);
    }
}
