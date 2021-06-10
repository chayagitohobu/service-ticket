<?php

namespace App\Http\Controllers;

use App\Models\Division;
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
            ->join('divisions', 'users.division_id', 'divisions.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->select('users.id', 'users.email', 'users.name', 'users.phone', 'users.created_at', 'divisions.division', 'roles.role')
            ->paginate(8);

        $divisis = Division::all();
        return view('admin.user')
            ->with('divisions', $divisis)
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisis = Division::all();
        $roles = Role::all();
        return view('admin.create_user')
            ->with('divisions', $divisis)
            ->with('roles', $roles);
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
            'phone' => $request->phone,
            'division_id' => $request->division,
            'role_id' => $request->role,
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
        $divisis = Division::all();
        $roles = Role::all();

        return view('admin.edit_user')
            ->with('user', $user)
            ->with('divisions', $divisis)
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
        $user->division_id = $request->input('division');
        $user->role_id = $request->input('role');
        $user->phone = $request->input('phone');
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
