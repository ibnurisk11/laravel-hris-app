<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('division')->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::all();
        return view('users.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:255|unique:users',
            'ktp' => 'required|string|max:255|unique:users',
            'npwp' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|string',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'division_id' => 'required|exists:divisions,id',
            'position' => 'required|string',
            'joined_at' => 'required|date',
            'contract_until' => 'nullable|date',
            'salary' => 'required|numeric',
        ]);

        $user = new User($request->except('password'));
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.users.index')
                         ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $divisions = Division::all();
        return view('users.edit', compact('user', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nip' => 'required|string|max:255|unique:users,nip,' . $user->id,
            'ktp' => 'required|string|max:255|unique:users,ktp,' . $user->id,
            'npwp' => 'required|string|max:255|unique:users,npwp,' . $user->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'division_id' => 'required|exists:divisions,id',
            'position' => 'required|string',
            'joined_at' => 'required|date',
            'contract_until' => 'nullable|date',
            'salary' => 'required|numeric',
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users.index')
                         ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')
                         ->with('success', 'User deleted successfully.');
    }
}