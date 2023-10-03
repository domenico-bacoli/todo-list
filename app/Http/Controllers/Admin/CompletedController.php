<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class CompletedController extends Controller
{
    public function index(Todo $todo)
    {
        if ($todo->is_completed) {
            $todo->update(['is_completed' => false]);
        } else {
            $todo->update(['is_completed' => true]);
        }

        return redirect()->action([TodoController::class, 'index']);
    }
}
