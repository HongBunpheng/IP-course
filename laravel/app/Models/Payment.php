<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['customer_id', 'order_id', 'amount', 'payment_method'];
    protected $table = 'payment';

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    protected $dates = ['deleted_at'];
}
