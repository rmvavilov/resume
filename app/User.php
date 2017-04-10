<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class User extends Authenticatable
{
    use Notifiable;

    const DEFAULT_USER_IMAGE = 'default.jpg';
    const PHONE_DELIMITER = '-';
    const AVATAR_PATH = '/img/avatar/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login',
        'email',
        'password',
        'first_name',
        'last_name',
        'avatar',
        'phone',
        'date_of_birth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Return simplified user full name. (Using in templates)
     * example:
     *      first_name = 'John'
     *      last_name = 'Smith'
     * return
     *      full_name = 'John S.'
     * @return string
     */
    public function getFullNameAttribute()
    {
        $first_name = $this->attributes['first_name'];
        $last_name = $this->attributes['last_name'];
        return $first_name . ' ' . strtoupper(mb_substr($last_name, 0, 1)) . '.';
    }

    public function setPhoneAttribute($value)
    {
        if (strpos($value, self::PHONE_DELIMITER)) {
            $phone = str_replace(self::PHONE_DELIMITER, '', $value);
            $this->attributes['phone'] = $phone;
        }
    }

    public function getPhoneAttribute($value)
    {
        $formatted_phone = substr_replace($value, self::PHONE_DELIMITER, 3, 0);
        return $formatted_phone;
    }

    public static function deleteUserAvatar()
    {
        $user = Auth::user();
        $avatar_file_name = $user->avatar;

        if ($avatar_file_name != self::DEFAULT_USER_IMAGE) {
            File::delete(public_path(self::AVATAR_PATH) . $avatar_file_name);
        }
        $user->avatar = User::DEFAULT_USER_IMAGE;

        $user->save();
    }
}
