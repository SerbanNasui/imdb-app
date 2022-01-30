<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;
   
    protected $fillable = [
        'status',
        'name',
        'rating',
        'description',
        'image',
    ];

    protected $hidden = ['pivot'];
 
    public function artists(){
        return $this->belongsToMany(Artist::class, 'movie_artist');
    }

    public function scopeFilterByStatusAndRating($query)
    {    
        $query->where('status', 1);
        $query->where('rating', '>', 5);
       
        return $query;
    }


}
