<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = DB::table('users')
            ->join('divisis', 'users.divisi_id', 'divisis.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->select('users.id', 'users.email', 'users.name', 'users.telp', 'divisis.divisi', 'roles.role')
            ->paginate(8);

        return view('admin.user')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisis = Divisi::all();
        $roles = Role::all();
        return view('admin.create_user')->with('divisis', $divisis)->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'divisi_id' => $request->divisi,
            'role_id' => $request->role,
            'telp' => $request->telp,
        ]);

        return redirect('admin/user')->with('success', 'User berhasil dibuat !');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $divisis = Divisi::all();
        $roles = Role::all();

        return view('admin.edit_user')
            ->with('user', $user)
            ->with('divisis', $divisis)
            ->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = user::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->divisi_id = $request->input('divisi');
        $user->role_id = $request->input('role');
        $user->telp = $request->input('telp');
        $user->save();

        return redirect('admin/user')->with('success', 'User berhasil di update !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/user')->with('success', 'user berhasil di hapus !');
    }
}
