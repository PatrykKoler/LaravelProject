<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student_classses extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_classes_id',
        'user_id',
    ];

    public function teacher_classes(): HasMany
    {
        return $this->HasMany(Teacher_classes::class);
    }

    public function user(): HasMany
    {
        return $this->HasMany(User::class);
    }
}
