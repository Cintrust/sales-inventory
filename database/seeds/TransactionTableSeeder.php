<?php

use App\Catalog;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception|Throwable
     */
    public function run()
    {
        $faker = $faker = Faker\Factory::create();
//        $transactions = [];
        $catalogs = Catalog::all();
        $count = 0;
        while ($catalogs->count() && $count++ < 1500) {

            /** @var Catalog $catalog */
            $catalog = $catalogs->random();
            $transaction = $this->createTransaction($faker);

            $qty = $faker->numberBetween(1, 30);
            if ($transaction->qty_type == Transaction::QTY_TYPE_BULK) {
                $qty += $faker->randomElement([0, 0.5]);
            }

            $transaction->quantity = $qty;
            $transaction->catalog_id = $catalog->id;
            $transaction->transaction_type = Transaction::TYPE_PURCHASE;
//            $catalog->qty_in_stock += $transaction->qty_type == Transaction::QTY_TYPE_BULK ? $transaction->quantity * $catalog->qty_per_bulk : $transaction->quantity;

            $transaction->saveOrFail();
            if ($catalog->catalog_type == Catalog::TYPE_GOODS) {
                $transaction1 = $this->createTransaction($faker);
                $transaction1->catalog_id = $catalog->id;
                $transaction1->qty_type = $transaction->qty_type;
                $transaction1->transaction_type = Transaction::TYPE_SALES;
                $qty = $faker->numberBetween(1, $transaction->quantity);
                if ($transaction1->qty_type == Transaction::QTY_TYPE_BULK) {
                    $qty += $faker->randomElement([0, 0.5]);
                }
                $transaction1->quantity = $qty;
//                $catalog->qty_in_stock -= $transaction1->qty_type == Transaction::QTY_TYPE_BULK ? $transaction1->quantity * $catalog->qty_per_bulk : $transaction1->quantity;
                $transaction1->saveOrFail();
            }


        }

    }


    /**
     * @param \Faker\Generator $faker
     * @return Transaction
     * @throws Exception
     */
    protected function createTransaction(\Faker\Generator $faker)
    {
        $qty_type = $faker->randomElement([Transaction::QTY_TYPE_BULK, Transaction::QTY_TYPE_SINGLE]);


        $payment_status = $faker->randomElement([Transaction::PAYMENT_STATUS_PAID_OFF, Transaction::PAYMENT_STATUS_PENDING]);


        $transaction = new Transaction();
        $transaction->qty_type = $qty_type;
        $transaction->price = $faker->randomFloat(2,20,100000);
        $transaction->payment_status = $payment_status;
        $transaction->purchased_at = new Carbon($faker->dateTimeThisMonth("now", "Africa/Lagos"));
        $transaction->paid_at = $payment_status == Transaction::PAYMENT_STATUS_PAID_OFF ? new Carbon($faker->dateTimeThisYear("now", "Africa/Lagos")) : null;
        $transaction->description = $faker->sentence();

        return $transaction;
    }
}
