<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    /**
     * Таблица БД, ассоциированная с моделью.
     *
     * @var string
     */
    protected $table = 'positions';
    /**
     * Первичный ключ таблицы БД.
     *
     * @var int
     */
    protected $primaryKey = 'id';

    protected $visible = ['name'];

    protected $fillable = ['name'];
}
