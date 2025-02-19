<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "article_id",
        "quantity",
        "price_unit",
        "total_price",
        "status"
    ];

    public function articles(){
        return $this->belongsTo(Article::class,"article_id");
    }

    public function users(){
        return $this->belongsTo(User::class, "user_id");
    }
}
