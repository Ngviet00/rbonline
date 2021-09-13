<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapper extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id','name_chapper','slug', 'content'
    ];
    
    public function book(){
        return $this->belongsTo(Book::class,'book_id', 'id');
    }
}
