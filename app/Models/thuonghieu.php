<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class thuonghieu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'thuonghieus';
    protected $primaryKey = 'id';
    protected $fillable = [
       'tenthuonghieu',
       'parent_Id'
    ];
}
