<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * Class Catalog
 * @package App
 *
 * @property int id
 * @property string name
 * @property string catalog_type
 * @property integer qty_per_bulk
 * @property integer qty_in_stock
 * @property integer low_stock_qty
 * @property string description
 *
 */
class Catalog extends Model
{

    public const TYPE_UTILITY = "UTILITY";
    public const TYPE_GOODS = "GOODS";

    protected $fillable = [
        "name",
        "catalog_type",
        "qty_per_bulk",
        "qty_in_stock",
        "low_stock_qty",
        "description",
    ];

    public function pendingSales()
    {
        return $this->sales()->where("payment_status", Transaction::PAYMENT_STATUS_PENDING);
    }

    public function sales()
    {
        return $this->transactions()->where("transaction_type", Transaction::TYPE_SALES);
    }

    public function transactions()
    {
        return $this->hasMany("App\Transaction", "catalog_id");
    }

    public function paidOffSales()
    {
        return $this->sales()->where("payment_status", Transaction::PAYMENT_STATUS_PAID_OFF);
    }

    public function pendingPurchase()
    {
        return $this->purchase()->where("payment_status", Transaction::PAYMENT_STATUS_PENDING);
    }

    public function purchase()
    {
        return $this->transactions()->where("transaction_type", Transaction::TYPE_PURCHASE);
    }

    public function paidOffPurchase()
    {
        return $this->purchase()->where("payment_status", Transaction::PAYMENT_STATUS_PAID_OFF);
    }


}
