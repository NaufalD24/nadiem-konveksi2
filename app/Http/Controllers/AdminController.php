<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = Admin::all();
        return view('admin', compact('data'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins',
            'username' => 'required|unique:admins',
            'nama' => 'required',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'email' => $request->email,
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin')->with('success', 'Admin created successfully.');
    }

    public function edit($id)
    {
        $data = Admin::findOrFail($id);
        return view('admin.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:admins,email,'.$admin->id,
            'username' => 'required|unique:admins,username,'.$admin->id,
            'nama' => 'required',
            'password' => 'nullable|min:6',
        ]);

        $admin->update([
            'email' => $request->email,
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $data = Admin::findOrFail($id);
        $data->delete();

        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
    }
    public function dashboard()
    {
        $adminCount = Admin::count();
        $transactionCount = Transaction::count();
        // Tambahkan statistik lain jika diperlukan

        return view('admin.dashboard', compact('adminCount', 'transactionCount'));
    }
}
