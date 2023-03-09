<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;
    protected $fillable=['slug','condition'];

        public function item(){
        return $this->belongsToMany(Item::class,'item_condition');
    }
}