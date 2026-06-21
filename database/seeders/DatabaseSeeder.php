<?php

namespace Database\Seeders;

use App\IdeaStatus;
use App\Models\Idea;
use App\Models\Step;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $primaryUser = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => 'password',
            ],
        );

        $this->seedIdeasForUser($primaryUser, 4);

        User::factory()
            ->count(4)
            ->create()
            ->each(function (User $user): void {
                $this->seedIdeasForUser($user, 3);
            });
    }

    private function seedIdeasForUser(User $user, int $ideaCount): void
    {
        Idea::factory()
            ->count($ideaCount)
            ->for($user)
            ->sequence(
                ['status' => IdeaStatus::PENDING],
                ['status' => IdeaStatus::IN_PROGRESS],
                ['status' => IdeaStatus::COMPLETED],
            )
            ->create()
            ->each(function (Idea $idea): void {
                Step::factory()
                    ->count(3)
                    ->for($idea)
                    ->sequence(
                        ['completed' => false],
                        ['completed' => false],
                        ['completed' => true],
                    )
                    ->create();
            });
    }
}
