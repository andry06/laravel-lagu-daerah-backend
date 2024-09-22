<?php

namespace Database\Seeders;

use App\Models\FolkSong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FolkSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FolkSong::factory()->count(10)->create();
    }
}
