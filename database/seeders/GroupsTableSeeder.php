<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groups')->insert([
            [
                'name' => 'Group 1',
                'links' => 'http://example.com/group1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Group 2',
                'links' => 'http://example.com/group2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Group 3',
                'links' => 'http://example.com/group3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Group 3',
                'links' => 'http://example.com/group4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Group 5',
                'links' => 'http://example.com/group5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Group 6',
                'links' => 'http://example.com/group6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more dummy data as needed
        ]);
    }
}
