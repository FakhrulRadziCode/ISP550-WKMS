<?php
namespace App\Enums;

enum LeaveStatusEnum : string {
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}