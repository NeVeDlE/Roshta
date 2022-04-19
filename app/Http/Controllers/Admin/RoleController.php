<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {

    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store()
    {
        if (auth()->user()->role->name != 'admin') {
            abort(403);
        }
        request()->validate([
            'name' => 'required|min:2|max:255',
        ]);
        auth()->user()->addRole(request('name'));
        return redirect('/roles');

    }
}
