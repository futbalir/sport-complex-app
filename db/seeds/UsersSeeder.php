<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class UsersSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            [
                'login'=>'user1',
                'password'=>password_hash('password123', PASSWORD_DEFAULT),
                'status'=>1,
                'phone'=>'89145204532',
                'age'=>'21'
            ],
            [
                'login'=>'user2',
                'password'=>password_hash('password456', PASSWORD_DEFAULT),
                'status'=>1,
                'phone'=>'89147895421',
                'age'=>'17'
            ],
            [
                'login'=>'user3',
                'password'=>password_hash('password123', PASSWORD_DEFAULT),
                'status'=>1,
                'phone'=>'89145204532',
                'age'=>'21'
            ],
            [
                'login'=>'admin',
                'password'=>password_hash('password7516', PASSWORD_DEFAULT),
                'status'=>2,
                'phone'=>'89145204532',
                'age'=>'21'
            ]
        ];

        $this->table('users')->insert($data)->saveData();
    }
}
