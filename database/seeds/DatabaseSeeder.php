<?php

use Illuminate\Database\Seeder;
use App\{News,Role,Permission};
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	News::truncate();
    	// Role::truncate();
    	// Permission::truncate();
    	
        $this->call(NewsTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
    }
}
