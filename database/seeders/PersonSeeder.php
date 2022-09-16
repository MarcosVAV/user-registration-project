<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    public function run()
    {
        Person::firstOrCreate(
            ['id' => 1],
            ['name' => 'Luke Skywalker', 'cpf' => '16798125050', 'gender' => 'M', 'year_of_birth' => '1976-03-02']
        );
        Person::firstOrCreate(
            ['id' => 2],
            ['name' => 'Bruce Wayne', 'cpf' => '59875804045', 'gender' => 'M', 'year_of_birth' => '1960-04-03']
        );
        Person::firstOrCreate(
            ['id' => 3],
            ['name' => 'Diane Prince', 'cpf' => '04707649025', 'gender' => 'F', 'year_of_birth' => '1988-05-04']
        );
        Person::firstOrCreate(
            ['id' => 4],
            ['name' => 'Bruce Banner', 'cpf' => '21142450040', 'gender' => 'M', 'year_of_birth' => '1954-06-05']
        );
        Person::firstOrCreate(
            ['id' => 5],
            ['name' => 'Harley Quinn', 'cpf' => '83257946074', 'gender' => 'F', 'year_of_birth' => '1970-07-06']
        );
        Person::firstOrCreate(
            ['id' => 6],
            ['name' => 'Peter Parker', 'cpf' => '07583509025', 'gender' => 'M', 'year_of_birth' => '1972-08-07']
        );
    }
}