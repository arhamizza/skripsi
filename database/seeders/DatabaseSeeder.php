<?php
namespace Database\Seeders;

use Database\Factories\datatableFactory;
use Illuminate\Database\Seeder;
use App\Models\datatable;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            DashboardSeeder::class,
            NilaiSeeder::class,
            AlternatifSeeder::class,
            KriteriaSeeder::class,
        ]);
        // datatable::Factory()->count(10)->create();
    }
}
