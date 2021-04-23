<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'comments'
    ];

    protected $appends = ['avater'];

    public $timestamps = false;


    public function getAvaterAttribute()
    {
        return $this->id < 3 ? $this->id . '.jpg' : rand(1,2) . '.jpg';
    }
}
