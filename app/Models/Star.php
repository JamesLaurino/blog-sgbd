<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'user_id',
        "article_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
