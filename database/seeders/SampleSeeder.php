<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SampleSeeder extends Seeder
{
    public function run()
    {
        // Company Table
        $company1 = Company::create([
            'company_name' => '株式会社アナログ商事',
            'contact_person' => '田中 一郎',
            'contact_phone' => '03-9876-5432',
        ]);

        $company2 = Company::create([
            'company_name' => '株式会社昭和機械工業',
            'contact_person' => '鈴木 二郎',
            'contact_phone' => '03-6543-2109',
        ]);

        // Project Table
        $project1 = Project::create([
            'project_name' => 'ホームページ更新作業',
            'project_details' => '自社のホームページを少し更新したいです。専門知識はあまり必要ありませんが、ホームページビルダーが使える方を募集しています。',
        ]);

        $project2 = Project::create([
            'project_name' => 'パソコン設定サポート',
            'project_details' => '社内のパソコン設定をお願いします。プリンタの接続やメール設定ができる方を求めています。',
        ]);

        $project3 = Project::create([
            'project_name' => '社内ネットワーク見直し',
            'project_details' => '社内のネットワークを見直したいです。ルーターの設定や配線の整理が得意な方、大歓迎。',
        ]);

        // Company-Project Relationship Table
        DB::table('company_project')->insert([
            ['company_id' => $company1->company_id, 'project_id' => $project1->project_id],
            ['company_id' => $company1->company_id, 'project_id' => $project2->project_id],
            ['company_id' => $company2->company_id, 'project_id' => $project3->project_id],
        ]);

        User::create([
            'name' => '山田 太郎',
            'email' => 'taro.yamada@example.com',
            'password' => Hash::make('password'), // パスワードのハッシュ化
            'phone' => '080-1234-5678',
            'date_of_birth' => '1990-01-01',
        ]);
    }
}
