<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable=['slug','type'];
    public function item(){
        return $this->belongsToMany(Item::class,'item_type');
    }
}