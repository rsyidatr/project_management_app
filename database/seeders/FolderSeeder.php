<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Folder;
use App\Models\User;
use App\Models\Workspace;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $workspace = Workspace::first();
        
        if ($user && $workspace) {
            $folders = [
                ['name' => 'Work', 'color' => '#3b82f6', 'sort_order' => 1],
                ['name' => 'Personal', 'color' => '#10b981', 'sort_order' => 2],
                ['name' => 'Ideas', 'color' => '#f59e0b', 'sort_order' => 3],
                ['name' => 'Archive', 'color' => '#6b7280', 'sort_order' => 4],
            ];
            
            foreach ($folders as $folder) {
                Folder::create([
                    'name' => $folder['name'],
                    'color' => $folder['color'],
                    'workspace_id' => $workspace->id,
                    'user_id' => $user->id,
                    'sort_order' => $folder['sort_order'],
                ]);
            }
        }
    }
}
