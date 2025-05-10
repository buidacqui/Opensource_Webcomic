<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =[
        'title','image','status','publisher_id'
    ];
    protected $table = 'favourite';
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
}
