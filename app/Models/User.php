<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Posts;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'gender',
        'place_of_birth',
        'country',
        'birth_date',
        'personal_number',
        'phone_number',
        'picture'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'subscribed_posts' => 'array'
    ];


    //Relationship with posts(Moderator, Which Moderator created post)
    public function posts ()
    {
        return $this->hasMany(Posts::class, 'user_id');
    }

    //Relationship with courses(Student, Show which student enrolled in which course)
    // Relationship with enrolled posts (Student, Shows which student is enrolled in which course)
public function enrolledPosts()
{
    return $this->belongsToMany(Posts::class, 'course_user', 'user_id', 'course_id');
}


}
