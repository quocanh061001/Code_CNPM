<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function images()
    {
        return $this->hasMany(HinhAnh::class, 'sp_id');
    }
    
    public function size(){
        return $this->belongsToMany(Size::class, 'sp_size', 'sp_id', 'size_id');
    }
}
