<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

final class Item extends Model
{
    protected $fillable = ['name', 'amount'];
}
