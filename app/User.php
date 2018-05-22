<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * отношения один ко многим
     * получить все задачи пользователя из таблицы undefine используя класс привязанный к таблице Undefineds
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function undefined () {
        return $this->hasMany(Undefined::class);
    }
}
