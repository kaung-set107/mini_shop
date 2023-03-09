<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable=['slug','name','category_id','description','price','ownername','phone','address'];

public function condition(){
        return $this->belongsToMany(Condition::class,'item_condition');
    }
public function type(){
        return $this->belongsToMany(Type::class,'item_type');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
}