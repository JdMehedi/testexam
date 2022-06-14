<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agent::create([
            'name' => 'Agent',
            'email' => 'agent@gmail.com',
            'password' => Hash::make("123456"),
            'user_id' => 'user-'.rand(1000,10000),
        ]);
    }
}
