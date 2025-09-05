<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Note;
use App\Models\Folder;
use App\Models\User;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the test user (should exist from DatabaseSeeder)
        $user = User::where('email', 'test@example.com')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Get folders
        $folders = Folder::all();
        $personalFolder = $folders->where('name', 'Personal')->first();
        $workFolder = $folders->where('name', 'Work')->first();

        // Sample notes data
        $notes = [
            [
                'title' => 'Project Planning Meeting',
                'content' => 'Discussed the upcoming project timeline, resource allocation, and key milestones. Need to follow up on budget approval and team assignments.',
                'type' => 'meeting',
                'folder_id' => $workFolder?->id,
                'is_favorite' => true,
                'tags' => json_encode(['planning', 'meeting', 'budget'])
            ],
            [
                'title' => 'Weekend Recipe Ideas',
                'content' => 'Try making homemade pasta with fresh tomato sauce. Also consider attempting the chocolate soufflé recipe from the cookbook.',
                'type' => 'recipe',
                'folder_id' => $personalFolder?->id,
                'is_favorite' => false,
                'tags' => json_encode(['cooking', 'weekend', 'pasta'])
            ],
            [
                'title' => 'Q4 Goals and Objectives',
                'content' => 'Complete the mobile app redesign, improve user engagement by 25%, and launch the new feature set before year-end.',
                'type' => 'goal',
                'folder_id' => $workFolder?->id,
                'is_favorite' => true,
                'tags' => json_encode(['goals', 'Q4', 'mobile', 'redesign'])
            ],
            [
                'title' => 'Book Reading List',
                'content' => 'Books to read this month: "Atomic Habits" by James Clear, "The Design of Everyday Things" by Don Norman, and "Thinking, Fast and Slow" by Daniel Kahneman.',
                'type' => 'note',
                'folder_id' => $personalFolder?->id,
                'is_favorite' => false,
                'tags' => json_encode(['books', 'reading', 'personal-development'])
            ],
            [
                'title' => 'Website Redesign Project',
                'content' => 'Key requirements: Modern responsive design, improved user experience, faster load times, and better accessibility. Target completion: end of next month.',
                'type' => 'project',
                'folder_id' => $workFolder?->id,
                'is_favorite' => true,
                'tags' => json_encode(['project', 'redesign', 'website', 'UX'])
            ],
            [
                'title' => 'Daily Gratitude',
                'content' => 'Today I\'m grateful for good health, supportive colleagues, a successful project launch, and quality time with family.',
                'type' => 'note',
                'folder_id' => $personalFolder?->id,
                'is_favorite' => false,
                'tags' => json_encode(['gratitude', 'daily', 'mindfulness'])
            ],
            [
                'title' => 'Client Feedback Session',
                'content' => 'Client loves the new design direction. Requested minor adjustments to color scheme and typography. Overall very positive response to our work.',
                'type' => 'meeting',
                'folder_id' => $workFolder?->id,
                'is_favorite' => false,
                'tags' => json_encode(['client', 'feedback', 'design'])
            ],
            [
                'title' => 'Fitness Goals 2025',
                'content' => 'Run a 10K race, attend yoga classes twice a week, improve strength training consistency, and maintain a healthy work-life balance.',
                'type' => 'goal',
                'folder_id' => $personalFolder?->id,
                'is_favorite' => true,
                'tags' => json_encode(['fitness', '2025', 'health', 'goals'])
            ]
        ];

        foreach ($notes as $noteData) {
            Note::create([
                'user_id' => $user->id,
                'workspace_id' => 1, // Default workspace
                'title' => $noteData['title'],
                'content' => $noteData['content'],
                'type' => $noteData['type'],
                'folder_id' => $noteData['folder_id'],
                'is_favorite' => $noteData['is_favorite'],
                'tags' => $noteData['tags'],
            ]);
        }
    }
}
