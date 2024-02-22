<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->where('email','impact@e-impact.com')->delete();


        \DB::table('permissions')->insert(array ( 
            0 =>  
            array ( 
                'name' => 'super_admin',
                'guard_name' => 'web', 
            ), 
           
        ));

        $users = [
            [
                'name'           => 'User',
                'email'          => 'impact@e-impact.com',
                'password'       => Hash::make('password'),
            ],
        ];
        User::insert($users);

        \DB::table('roles')->insert(array ( 
            0 =>  
            array ( 
                'name' => 'admin',
                'guard_name' => 'web', 
            ),
        ));


        $role = Role::where("name", "admin")->first();
        $role->givePermissionTo("super_admin");

        $user = User::where("email", "impact@e-impact.com")->first();
        $user->assignRole('admin');
    }
}
