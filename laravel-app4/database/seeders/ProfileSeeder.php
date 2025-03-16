<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 添加一条个人信息
        DB::table('profiles')->insert([
            'name' => 'JaguarJack',
            'email' => 'njphper@gmail.com',
            'age'  => 18,
            'info' => '后端开发工程师，前端入门选手，略知相关服务器知识，偏爱❤️ Laravel & Vue',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
