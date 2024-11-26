<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        for ($i=0; $i < 15; $i++) { 
            Student::create([
                'name' => 'Name'.$i,
                'birth_day' => fake()->date(),
                'age' => fake()->numberBetween(1,50),
                'field' => fake()->name()
            ]);
        }

        for ($i=1; $i < 100; $i++) { 
            Agent::create([
                'parent_id' => $i % 3 != 0 ? 0 : rand(0,($i - 1)),
                'name' => $i % 3 != 0 ? 'Child' : 'Child'.$i,
                'phone' => '+99890123456'.$i
            ]);
        }
    }
}
