<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    protected $fillable =[
        'tentruyen', 'tomtat','kichhoat','slug_truyen','hinhanh','danhmuc_id','theloai_id','created_at','updated_at','truyen_noibat','luotxem'
    ];
    protected $primaryKey= 'id';
    protected $table = 'truyen';

    public function danhmuctruyen(){
        return $this->belongsTo('App\Models\DanhmucTruyen','danhmuc_id','id');
    }
    public function chapter(){
        
        return $this->hasMany('App\Models\DanhmucTruyen','truyen_id','id');

    }
    public function theloai(){
        return $this->belongsTo('App\Models\Theloai','theloai_id','id');
    }
    public function thuocnhieudanhmuctruyen(){
        return $this->belongsToMany(DanhmucTruyen::class,'thuocdanh','truyen_id','danhmuc_id');
    }
    public function thuocnhieutheloaitruyen(){
        return $this->belongsToMany(Theloai::class,'thuocloai','truyen_id','theloai_id');
    }
    public function ds_chapter()
{
    return $this->hasMany('App\Models\Chapter', 'truyen_id', 'id');
}
public function lichsu()
{
    return $this->hasMany(LichSu::class, 'truyen_id');
}

}
