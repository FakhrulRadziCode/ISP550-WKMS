<?php
namespace App\Enums;

enum LeaveTypeEnum : string {
    case SICK = 'sick';
    case ANNUAL = 'annual';
    case OTHER = 'other';
}