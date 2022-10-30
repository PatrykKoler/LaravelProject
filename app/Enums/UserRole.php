<?php

namespace App\Enums;

class UserRole
{
    const ADMIN = 'admin';
    const TEACHER = 'teacher';
    const STUDENT = 'student';

    const TYPES = [
        self::ADMIN,
        self::TEACHER,
        self::STUDENT,
    ];

}

