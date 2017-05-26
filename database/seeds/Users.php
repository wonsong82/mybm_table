<?php

use App\Models\User;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        Role::create(['name' => 'Admin']);
        Role::create(['name' => '간사']);
        Role::create(['name' => '순장']);
        Role::create(['name' => '그룹장']);
        Role::create(['name' => '팀4']);


        // Users
        $i=0;
        $user = User::create([
            'name' =>  '송원철',
            'email' => 'won@mybm.io',
            'password' => bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '간사', 'Admin']);


        $user = User::create([
            'name' => '김가현',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '순장']);

        $user = User::create([
            'name' => '이근행',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '그룹장']);

        $user = User::create([
            'name' => '이지형',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '순장']);

        $user = User::create([
            'name' => '김은경',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '그룹장']);

        $user = User::create([
            'name' => '조준상',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '송민규',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '장지원',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '그룹장']);

        $user = User::create([
            'name' => '고에나',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '이다솜',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '순장']);

        $user = User::create([
            'name' => '최지해',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '간사']);

        $user = User::create([
            'name' => '하영빈',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '우준수',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '김민정',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '간사']);

        $user = User::create([
            'name' => '김시영',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '그룹장']);

        $user = User::create([
            'name' => '이창선',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '김정연',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '김용욱',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '정태헌',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '순장']);

        $user = User::create([
            'name' => '한고은',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '이범진',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '김보연',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '이현영',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '함은규',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '윤해나',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '박재홍',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '그룹장']);

        $user = User::create([
            'name' => '이슬우',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '한일신',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '순장']);

        $user = User::create([
            'name' => '안인완',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '김지수',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '김명',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '최정원',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '궁현',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '이현미',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);

        $user = User::create([
            'name' => '김현정',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4', '그룹장']);

        $user = User::create([
            'name' => '김성민',
            'email' => ++$i . '@mybm.io',
            'password' =>  bcrypt('777'),
        ]);
        $user->assignRole(['팀4']);
    }
}
