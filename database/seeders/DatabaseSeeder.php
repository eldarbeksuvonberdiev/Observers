<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\AgentProduct;
use App\Models\Product;
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

        for ($i=1; $i <= 100; $i++) { 
            $a = rand(0,($i-1));
            Agent::create([
                'parent_id' => $i == 1 ? 0 : $a,
                'name' => $i == 1 ? 'Parent agent' : ($a == 0 ? 'Parent agent' : 'Child agent'),
                'phone' => '+99890123456'.$i
            ]);
        }

        for ($i=1; $i <= 10; $i++) { 
            Product::create([
                'name' => 'Product' . $i
            ]);
        }

        for ($i=1; $i <= 100; $i++) { 
            AgentProduct::create([
                'agent_id' => $i,
                'product_id' => rand(1,10),
                'price' => rand(1000,15000)
            ]);
        }
    }
}
