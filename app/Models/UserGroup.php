<?php

namespace App\Models;

use App\Traits\HasEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory, HasEntity;

    protected $table = 'guacamole_user_group';
    protected $appends = ['name'];
}
