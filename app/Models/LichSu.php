<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSu extends Model
{
    protected $table = 'lichsu';
    protected $fillable = [
        'user_id',
        'truyen_id',
        'chapter_id',
        'created_at',
        'updated_at',
    ];
    
    public function truyen()
    {
        return $this->belongsTo(Truyen::class, 'truyen_id');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }
}