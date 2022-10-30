<?php

namespace App\Enums;

class UserRole
{
    const ADMIN = 'admin';
    const TEACHER = 'teacher';
    const USER = 'user';

    const TYPES = [
        self::ADMIN,
        self::TEACHER,
        self::USER,
    ];

}

