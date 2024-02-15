<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $votes = [
            ['user_id' => 1, 'post_id' => 2],
            ['user_id' => 3, 'post_id' => 1],
            ['user_id' => 2, 'post_id' => 3],
            ['user_id' => 1, 'post_id' => 4],
            ['user_id' => 4, 'post_id' => 5],

        ];

        foreach ($votes as $vote) {
            // Agregar un voto relacionado con el usuario y el post correspondientes
            $user = User::find($vote['user_id']);
            $post = Post::find($vote['post_id']);

            if ($user && $post) {
                $post->votedUsers()->attach($user);
            }
        }
    }
}
