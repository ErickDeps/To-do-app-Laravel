<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'Tarea 1',
            'description' => 'Lorem Ipsum',
            'status' => null,
            'user_id' => null,
        ]);
        Task::create([
            'title' => 'Tarea 2',
            'description' => 'Lorem Ipsum',
            'status' => 'completed',
            'user_id' => null,
        ]);
        Task::create([
            'title' => 'Tarea 3',
            'description' => 'Lorem Ipsum',
            'status' => null,
            'user_id' => null,
        ]);
        Task::create([
            'title' => 'Tarea 4',
            'description' => 'Lorem Ipsum',
            'status' => 'completed',
            'user_id' => null,
        ]);
    }
}
