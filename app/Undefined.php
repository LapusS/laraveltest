<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Undefined extends Model
{
    /**
     * Связанная с моделью таблица
     *
     * @var string
     */
    protected $table = 'undefineds';
    /**
     * Массово присваиваем атрибуты
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Получить пользователя владельца текущей задачи undefineds
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
