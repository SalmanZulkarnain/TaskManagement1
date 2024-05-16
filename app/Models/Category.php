<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; 

    protected $guarded = []; // ambil semua column yang ada di table

    public function tasks(){
        return $this->hasMany(Task::class); // 1 category, bisa punya banyak task 
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
