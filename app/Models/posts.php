<?php

namespace App\Models;


// use App\Models\categories;
// use App\Models\post_categories;
use App\Models\post_category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class posts extends Model
{
    use HasFactory;
    public function post_category()
    {
        return $this->belongsTo(post_category::class,"category_id");
    }
    protected $fillable = ['name','description'];
    // protected $guarded = [];

}
