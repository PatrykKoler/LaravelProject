<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grades extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'teacher_classes_id',
        'school_subject_id',
        'user_id',
        'note',
    ];

    public function teacher_classes(): HasMany
    {
        return $this->HasMany(Teacher_classes::class);
    }

    public function user(): HasMany
    {
        return $this->HasMany(User::class);
    }

    public function school_subject(): HasMany
    {
        return $this->HasMany(School_subject::class);
    }
}
