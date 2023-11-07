<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('constants.roles') as $key => $value) {
            Role::create(['name' => $key])->givePermissionTo($value);
        }
    }
}
