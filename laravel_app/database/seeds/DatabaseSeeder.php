<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{ //どのseederを実行するか制御している
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // $this->call(UsersTableSeeder::class); // 削除
        $this->call(TodosTableSeeder::class); //TodosTableSeederを実行する
    }
}
