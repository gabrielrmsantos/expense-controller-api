<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Expense::create([
            'description' => 'Aluguel',
            'amount' => 1800,
            'date' => new \DateTime('2023-05-10'),
            'user_id' => 1
        ]);

        Expense::create([
            'description' => 'Faculdade',
            'amount' => 400,
            'date' => new \DateTime('2023-05-12'),
            'user_id' => 1
        ]);
    }
}
