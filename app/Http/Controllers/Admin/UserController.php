<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;
use SEO;

class UserController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:manage-users');
    }

    public function index()
    {
        SEO::setTitle(__('Users'));

        $users = User::with('thumbnail')->latest()->get();

        return view('admin.pages.users', compact('users'));
    }

    public function form(User $user = null)
    {
        $title = $user ? __('Edit User') . ' : ' . $user->name : __('Add User');

        SEO::setTitle($title);

        $roles = Role::all();

        return view('admin.pages.user-form', compact('user', 'title', 'roles'));
    }

    public function store(StoreUserRequest $request, User $user)
    {
        $data = $request->validated();

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }

        $model = User::updateOrCreate(['id' => $user->id], array_filter($data));

        if ($role = $request->get('role')) {
            $role = Role::findByName($role);
            $model->syncRoles([$role]);
        }

        $this->alert('success', $model->wasRecentlyCreated ? 'create' : 'update');

        return redirect(route('admin.users.index'));
    }

    public function delete(User $user)
    {
        try {
            $user->delete();

            $this->alert('success', 'delete');

        } catch (\Exception $e) {

            $this->alert('error', 'delete');
        }

        return redirect(route('admin.users.index'));
    }
}
