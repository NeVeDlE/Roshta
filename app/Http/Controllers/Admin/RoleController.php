<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function __invoke()
    {
        if (Gate::authorize('admin')) {
            return view('admin.roles.index');
        } else return redirect('/');
    }
}
