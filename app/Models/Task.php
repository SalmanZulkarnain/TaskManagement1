<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class); // banyak task, bisa 1 kategori
    }

    public function user(){
        return $this->belongsTo(User::class); // banyak task, bisa dihandle 1 akun
    }   
}
