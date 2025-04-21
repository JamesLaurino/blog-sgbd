<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "img_avatar"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function stars() {
        return $this->hasMany(Star::class);
    }

    public function starForArticle($articleId)
    {
        return $this->stars->firstWhere('article_id', $articleId);
    }

    public function starQuantityForArticle($articleId)
    {
        return $this->stars->firstWhere('article_id', $articleId)->quantity;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
