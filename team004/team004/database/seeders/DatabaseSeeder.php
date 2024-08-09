<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // テスト用の一般ユーザー
        User::create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'), // パスワードをハッシュ化
            'is_admin' => 0, // 一般ユーザー
        ]);

        // テスト用の管理者ユーザーを作成
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // パスワードをハッシュ化
            'is_admin' => 1, // 管理者ユーザー
        ]);
    }
}
