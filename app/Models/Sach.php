<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;
   
    public $timestamps = true;
    protected $fillable =[
        'tensach', 'tomtat','kichhoat','slug_sach','hinhanh','views','created_at','updated_at','tukhoa','noidung'
    ];
    protected $primaryKey= 'id';
    protected $table = 'sach';

}
