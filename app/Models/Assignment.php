<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = ['due_to', 'description', 'filename'];

    public function submit()
    {
        return $this->hasMany(Submission::class);
    }
}