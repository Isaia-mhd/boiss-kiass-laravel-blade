<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "short_description",
        "description",
        "price",
        "image",
        "imageUrls"
    ];

    public function getImageUrl(){
        if($this->image){
            return url("storage" . $this->image);
        }
        return "No image";
    }
}
