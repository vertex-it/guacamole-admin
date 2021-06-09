<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $guarded = ['command_groups'];

    public function commandGroups()
    {
        return $this->belongsToMany(CommandGroup::class);
    }

    public function guacUsers()
    {
        return $this->belongsToMany(GuacUser::class);
    }
}
