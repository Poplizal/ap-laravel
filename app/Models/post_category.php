<?php

namespace App\Models;

use App\Models\posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post_category extends Model
{
    use HasFactory;
    public function posts(){
        return $this->hasMany(posts::class,"value");
    }
}
