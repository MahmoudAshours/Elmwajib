<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        $roles = [
            'super-admin',
            'editor',
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }

        /* Give Permissions to Editor Role */
        $editor = Role::findByName('editor');
        $editor->givePermissionTo(['manage-content', 'manage-dashboard']);
    }
}
