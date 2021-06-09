<?php

namespace Database\Seeders;

use App\Models\Command;
use App\Models\CommandGroup;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Superadmin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'), // password
            'remember_token' => Str::random(10),
        ]);

        $windowsDiskCommands = CommandGroup::create([
            'name' => 'Windows disk commands',
        ]);

        $windowsDiskCommands->commands()->attach(Command::create([
            'name' => 'format c',
            'action' => 'STOP_SESSION',
            'rdp' => true,
        ]));

        $linuxDiskCommands = CommandGroup::create([
            'name' => 'Linux disk commands',
        ]);

        $linuxDiskCommands->commands()->attach(Command::create([
            'name' => 'rm -rf /',
            'action' => 'STOP_SESSION',
            'vnc' => true,
        ]));
    }
}
