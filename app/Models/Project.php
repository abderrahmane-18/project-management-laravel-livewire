<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Multitenantable;

class Project extends Model
{
    use HasFactory;
   

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}