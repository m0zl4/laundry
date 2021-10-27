<?php

use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user -> name = "Latief";
        $user -> username = "Latiefmz";
        $user -> email = "admin@test.com"; //nambah ini
        $user -> password = \Hash::make("12345678"); //hash membuat enskripsi random
        $user -> level = "admin"; //isi dari level wajib persis (admin) yang lainnya bebas
        $user -> save();
        $this->command->info("User ditambahkan"); //nambah ini

    }
}
