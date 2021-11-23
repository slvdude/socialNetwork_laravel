<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function ownedBy($id) {
        return $id === $this->user_id;
    }

    protected $fillable = [
        'body',
        'profile_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replies(){
    	return $this->hasMany(Post::class);
    }
}
