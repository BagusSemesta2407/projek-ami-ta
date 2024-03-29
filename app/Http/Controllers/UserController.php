<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'User';

        $user = User::all();

        return view('admin.user.index', [
            'title' => $title,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'User';
        $roles = Role::all();

        
        
        return view('admin.user.form', [
            'title' => $title,
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $roles = Role::findOrFail($request->roles);

        $user = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole($roles);

        return redirect()->route('admin.user.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'User';
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.user.form-edit', [
            'user' => $user,
            'title' => $title,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $roles = Role::findOrFail($request->roles);
        

        $data = [
            'nip'=>$request->nip,
            'name' => $request->name,
            'email' => $request->email,
        ];

        User::where('id', $user->id)->update($data);

        $user->syncRoles($roles);

        return redirect()->route('admin.user.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user=User::find($id);

        $user->delete();

        return response()->json(['success','Data Berhasil Dihapus']);

    }

    public function active($id)
    {
        $user=User::findOrFail($id);

        if ($user->status == 'Active') {
            $user->status = 'Non Active';
        }else {
            $user->status = 'Active';
        }

        $user->save();

        return response()->json(['success', 'Status User Berhasil Diubah']);
    }
}
