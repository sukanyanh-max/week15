<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_name', 'quantity', 'total', 'status'];

    protected function casts(): array
    {
        return ['quantity' => 'integer', 'total' => 'decimal:2'];
    }
}
