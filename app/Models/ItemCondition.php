<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCondition extends Model
{
    use HasFactory;

    protected $table = 'item_conditions';

    protected $fillable = [
        'condition'
    ];
}
