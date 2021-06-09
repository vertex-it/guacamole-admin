<?php

namespace App\Models;

use App\Traits\HasEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuacUser extends Model
{
    use HasFactory, HasEntity;

    protected $primaryKey = 'user_id';
    protected $table = 'guacamole_user';
    protected $appends = ['name'];

    public function commandGroups()
    {
        return $this->belongsToMany(CommandGroup::class);
    }

    public function commands()
    {
        return $this->belongsToMany(Command::class);
    }
}
