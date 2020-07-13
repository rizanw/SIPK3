<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
        	'name' => 'Tim Inspeksi 1',
        	'email' => 'tim.inspeksi@sipk3.com',
        	'password' => bcrypt('sipsip')
        ]);
        $role = Role::create(['name' => 'TimInspeksi']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        //
        $user = User::create([
        	'name' => 'Penanggung Jawab Area 1',
        	'email' => 'tim.pja@sipk3.com',
        	'password' => bcrypt('sipsip')
        ]);
        $role = Role::create(['name' => 'PJA']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        //
        $user = User::create([
        	'name' => 'Pemadam Kebakaran 1',
        	'email' => 'tim.pmk@sipk3.com',
        	'password' => bcrypt('sipsip')
        ]);
        $role = Role::create(['name' => 'PMK']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        //
        $user = User::create([
        	'name' => 'Maintainer 1',
        	'email' => 'tim.maintainer@sipk3.com',
        	'password' => bcrypt('sipsip')
        ]);
        $role = Role::create(['name' => 'Maintainer']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
