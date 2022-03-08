<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker;
use Database\Seeders\Citys;
use Database\Seeders\States;

use App\Models\GlobalPages;
use Faker\Core\Number;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 15 ; $i++) {
            $id = new GlobalPages();
            $id->uuid4();

            $faker = Faker\Factory::create('pt_BR');
            $name = $faker->name;
            $email = explode(" ", $name);
            $cnpj = $faker->cnpj(false);
            $codigo_postal = $faker->postcode;
            $postcode = str_replace("-", "", $codigo_postal);

            DB::table('clients')->insert([
                'id' => $faker->uuid,
                'name' => $name,
                'is_cpf' => true,
                'cpf_cnpj' =>  $faker->cpf(false),
                'phone' => $faker->phone,
                'email' => $email[1].'@gmail.com',
                'address' => $faker->streetName,
                'number' => $faker->buildingNumber,
                'cep' => $postcode,
                'cod_city' => '00110131-5540-4c45-91c0-31985d97a6ed', // cod_city pego direto na tabela do banco de dados
            ]);
        }

        for ($i=0; $i < 30 ; $i++) {
            $id = new GlobalPages();
            $id->uuid4();

            $faker = Faker\Factory::create('pt_BR');

            DB::table('products')->insert([
                'id' => $faker->uuid,
                'name' => $faker->word,
                'description' => $faker->text($maxNbChars = 100),
                'bar_code' => $faker->ean13,
                'inventory' => $faker->numberBetween($min = 2, $max = 300),
                'value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.1, $max = 500),
            ]);
        }

        
    }
}
