<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Models\User::class, 1)->create();

        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
    }
}
