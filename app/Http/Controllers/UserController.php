<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct(public User $model)
    {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $users = User::whereIn('role', ['hr', 'manager', 'admin', 'employee']);

        if (isset($search) && !empty($search)) {
            $users = $users->where('username', 'like', '%' . $search . '%');
        }

        $users = $users->get();

        return view('admin.user.index', [
            'users' => $users,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'confirmed',
            'profile' => 'required|mimes:jpg,png,webp,svg,jpeg,gif'
        ]);

        DB::beginTransaction();
        try {
            $validate['password'] = Hash::make($validate['password']);
            if ($request->profile) {
                $gambar = $this->uploadFile($request->profile, 'user');
                $validate['profile'] = $gambar;
            }
            $user = $this->model->create($validate);



            DB::commit();
            session()->flash('success', 'Berhasil Menambahkan Data User!');
            return redirect()->route('user.index');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('warning', 'Gagal Menambahkan Data User!');
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.view', [
            'user' => $user
        ]);
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
        return view('admin.user.edit', [
            'user' => $user
        ]);
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
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'confirmed',
            'profile' => 'mimes:jpg,png,webp,svg,jpeg,gif'
        ]);

        try {
            DB::beginTransaction();
            $user = User::find($id);
            $user->username = $request->username;
            $user->email = $request->email;
            $user->role = $request->role;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            if ($request->profile) {
                $gambar = $this->uploadFile($request->profile, 'user');
                $user->profile = $gambar;
            }
            $user->save();

            DB::commit();
            session()->flash('success', 'Berhasil Mengubah Data User!');
            return redirect()->route('user.index');
        } catch (\Exception $e) {
            session()->flash('warning', 'Gagal Mengubah Data User!');
            return redirect()->route('user.index');
        }
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
        return response()->json([
            'message' => 'Berhasil Menghapus Data User'
        ]);
    }
}
