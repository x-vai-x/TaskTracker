<?php

namespace App\Enums;

enum TaskStatus: string
{
    case Pending = 'PENDING';
    case NonCompliant = 'NON COMPLIANT';
    case Completed = 'COMPLETED';
}