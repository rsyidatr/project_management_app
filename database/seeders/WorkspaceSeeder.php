<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Workspace;
use App\Models\User;

class WorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        
        if ($user) {
            Workspace::create([
                'name' => 'My Workspace',
                'slug' => 'my-workspace',
                'description' => 'Default workspace for project management',
                'user_id' => $user->id,
                'settings' => [],
                'is_active' => true,
            ]);
        }
    }
}
