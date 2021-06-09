<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandGroup extends Model
{
    use HasFactory;

    protected $guarded = ['commands'];

    public function commands()
    {
        return $this->belongsToMany(Command::class);
    }

    public function guacUsers()
    {
        return $this->belongsToMany(GuacUser::class);
    }
}
