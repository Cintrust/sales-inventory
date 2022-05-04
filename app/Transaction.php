<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * Class Transaction
 * @package App
 *
 * @property integer catalog_id
 * @property Catalog catalog
 * @property float price
 * @property integer quantity
 * @property string qty_type
 * @property string payment_status
 * @property string transaction_type
 * @property string description
 * @property \Carbon\Carbon created_at
 * @property \Carbon\Carbon updated_at
 * @property \Carbon\Carbon purchased_at
 * @property \Carbon\Carbon paid_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder where(string $string, string $string1, string $string2 = "")
 */
class Transaction extends Model
{
    /*TRANSACTION QTY TYPE*/
    public const QTY_TYPE_SINGLE = "SINGLE";
    public const QTY_TYPE_BULK = "BULK";

    /*TRANSACTION PAYMENT STATUS*/
    public const PAYMENT_STATUS_PENDING = "PENDING";
    public const PAYMENT_STATUS_PAID_OFF = "PAID_OFF";

    /*TRANSACTION TYPE*/

    public const TYPE_PURCHASE = "PURCHASE";
    public const TYPE_SALES = "SALES";


    protected $fillable = [
        "catalog_id",
        "qty_type",
        "quantity",
        "description",
        "price",
        "payment_status",
        "transaction_type",
        "purchased_at",
        "paid_at",
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'purchased_at',
        'paid_at',
    ];


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function (Transaction  $transaction) {
            $catalog = $transaction->catalog;
            $qty = $transaction->qty_type == Transaction::QTY_TYPE_BULK ? $transaction->quantity * $catalog->qty_per_bulk : $transaction->quantity;

            if ($transaction->transaction_type == Transaction::TYPE_SALES) {
                $catalog->qty_in_stock -= $qty;
            } else {
                $catalog->qty_in_stock += $qty;

            }
            $catalog->saveOrFail();
        });
        static::deleted(function (Transaction  $transaction) {
            $catalog = $transaction->catalog;
            $qty = $transaction->qty_type == Transaction::QTY_TYPE_BULK ? $transaction->quantity * $catalog->qty_per_bulk : $transaction->quantity;

            if ($transaction->transaction_type == Transaction::TYPE_SALES) {
                $catalog->qty_in_stock += $qty;
            } else {
                $catalog->qty_in_stock -= $qty;

            }
            $catalog->saveOrFail();
        });
    }

    public function catalog()
    {
        return $this->belongsTo('App\Catalog', 'catalog_id');
    }

    public static function helper(array $data)
    {
        $builder = self::query();

        foreach (["payment_status", "transaction_type", "qty_type"] as $item) {
            if (isset($data[$item])) {
                $builder->where($item, $data[$item]);
            }
        }

    }

}
