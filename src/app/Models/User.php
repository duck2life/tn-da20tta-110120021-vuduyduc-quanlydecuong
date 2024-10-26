<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;  
use Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'password',
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
    ];

        static public function getSingle($id)
    {
        return self::find($id);
    }

        static public function getTeacher()
    {
        $return = self::select('users.*')
                            ->where('user_type','=',2)
                            ->where('is_delete','=',0);
                            if(!empty(Request::get('name')))   
                            {
                                $return = $return->where('name','like', '%'.Request::get('name').'%');
                            }
                            if(!empty(Request::get('email')))   
                            {
                                $return = $return->where('email','like', '%'.Request::get('email').'%');
                            }
                            if(!empty(Request::get('date')))   
                            {
                                $return = $return->whereDate('created_at','=',Request::get('date'));
                            }
                            if(!empty(Request::get('division')))   
                            {
                                $return = $return->where('division','=',Request::get('division'));
                            }
                
        $return = $return->orderBy('id', 'desc')
                            ->paginate(5);
        return $return;
    }
    
    
    static public function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }

        static public function GetTokenSingle($remember_token)
    {
        return User::where('remember_token', '=', $remember_token)->first();
    }
}