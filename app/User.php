<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Post;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'gender', 'birthday'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

/*     public function getAuthPassword() {
        return $this->email;
    } */

    public function scopeFilter($query, $name) 
    {
        return User::where('name', $name)->get();
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public function details()
    {
        $details = array();

        return [
            [
                'index' => 0,
                'key' => 'name',
                'value' => $this->name,
                'edit' => false,
                'type' => 'text'
            ],
            [
                'index' => 1,
                'key' => 'email',
                'value' => $this->email,
                'edit' => false,
                'type' => 'email'
            ],
            [
                'index' => 2,
                'key' => 'password',
                'value' => 'nazir allaham',
                'edit' => false,
                'type' => 'password'
            ],
            [
                'index' => 3,
                'key' => 'birthday',
                'value' => $this->birthday,
                'edit' => false,
                'type' => 'date'
            ],
        ];
    }
}
