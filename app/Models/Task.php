<?php

namespace App\Models;
use App\Enums\TaskEnumType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'project_id',
        'status'
    ];
    /*
    protected $casts=[
        'status' =>TaskEnumType::class
    ];
    */
    public function projects()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
  
}