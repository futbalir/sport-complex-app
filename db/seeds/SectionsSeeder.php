<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class SectionsSeeder extends AbstractSeed
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
                'name'=>'Футбол',
                'image'=>'/public/images/футбол.jpg',
                'description'=>'Место где любители самого популярного вида спорта могут найти все необходимое для комфортной игры'
            ],
            [
                'name'=>'Бокс',
                'images'=>'/public/images/Бокс.jpg',
                'description'=>'Секция для настоящих мужчин'
            ],
            [
                'name'=>'Теннис',
                'image'=>'/public/images/теннис.jpg',
                'description'=>'Новые ракетки, современный корт - ждем всех любителей тенниса!'
            ]
        ];
        $this->table('sections')->insert($data)->saveData();
    }
}
