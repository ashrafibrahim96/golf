<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    protected $table="user_partie";
    protected $fillable = [
        'user_id', 'partie_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
