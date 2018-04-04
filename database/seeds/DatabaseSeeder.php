<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Models\Category::class, 50)->create();
        factory(App\Models\StaticPage::class, 10)->create();
    }
}
