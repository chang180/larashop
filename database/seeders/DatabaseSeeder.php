<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Traits\Dumpable;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // default test user, myself
        User::factory()->create([
            'name' => 'chang180',
            'email' => 'chang180@gmail.com',
        ]);

        Product::factory(4)
            ->hasVariants(5)
            ->has(Image::factory(3)->sequence(fn (Sequence $sequence) => ['featured' => $sequence->index === 0]))
            ->create();
    }
}
