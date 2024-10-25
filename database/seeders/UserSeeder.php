<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\DokterPoli;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**SUPER ADMIN */
        $faker = Faker::create('id_ID');

        $users = [
            ['Ringin', 'ringin', 'ringin@mail.com'],
            ['Rais', 'rais', 'rais@mail.com'],
            ['Riga', 'riga', 'riga@mail.com'],
        ];

        foreach ($users as $user) {
            $user = User::create([
                'name' => $user[0],
                'username' => $user[1],
                'email' => $user[2],
                'password' => bcrypt('admin')
            ]);
            Profile::create([
                'user_id' => $user->id
            ]);
            $role = 'super_admin';
            $permission = 'full_permission';
            $user->assignRole([$role]);
            $user->givePermissionTo([$permission]);
            $role = Role::find(1);
            $role->givePermissionTo([$permission]);
        }

        /**ADMIN */
        $admins = [
            ['admin', 'admin', 'admin@mail.com'],
        ];

        foreach ($admins as $admin) {
            $admin = User::create([
                'name' => $admin[0],
                'username' => $admin[1],
                'email' => $admin[2],
                'password' => bcrypt('admin')
            ]);
            Profile::create([
                'user_id' => $admin->id
            ]);
            $role = 'admin';
            $permission = 'full_permission';
            $admin->assignRole([$role]);
            $admin->givePermissionTo([$permission]);
            $role = Role::find(2);
            $role->givePermissionTo([$permission]);
        }

        /**OWNER */
        $owners = [
            ['Owner', 'owner', 'owner@mail.com'],
        ];

        foreach ($owners as $owner) {
            $owner = User::create([
                'name' => $owner[0],
                'username' => $owner[1],
                'email' => $owner[2],
                'password' => bcrypt('admin')
            ]);
            Profile::create([
                'user_id' => $owner->id
            ]);
            $role = 'owner';
            $permission = 'full_permission';
            $owner->assignRole([$role]);
            $owner->givePermissionTo([$permission]);
            $role = Role::find(4);
            $role->givePermissionTo([$permission]);
        }
    }
}
