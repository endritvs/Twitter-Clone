<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Followers extends Model
{
    use HasFactory;
    protected $table = "followers";
    protected $primaryKey = ['user_id', 'follower_id'];
    public $incrementing = false;

    protected $fillable = ['user_id', 'follower_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }
}
