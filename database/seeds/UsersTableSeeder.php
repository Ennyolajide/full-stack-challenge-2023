<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (array_keys(config('constants.roles')) as $role) {
            factory(App\User::class)->create([
                'name' => ucfirst($role).' User',
                'email' => $role . '@' . config('app.domain'),
            ])->assignRole($role);
        }
    }
}
