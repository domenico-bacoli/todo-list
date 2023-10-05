<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $todos = Todo::all();
        $user_id = Auth::id();
        $todos = Todo::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();

        return view('admin.todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        $this->validation($formData);

        $todo = new Todo();
        $todo->fill($formData);
        $todo->user_id = Auth::id();

        $todo->slug = Str::slug($todo->title, '-');

        $todo->save();

        return redirect()->route('admin.todos.show', $todo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {

        return view('admin.todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('admin.todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $formData = $request->all();
        $this->validation($formData);

        $todo->slug = Str::slug($formData['title'], '-');
        $todo->update($formData);

        return redirect()->route('admin.todos.show', $todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('admin.todos.index');
    }

    private function validation($formData) {
        $validator = Validator::make($formData, [
            'title' => 'required|max:50|min:3',
            'note' => 'nullable',
        ], [
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'title.required' => 'Inserisci un titolo',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
        ])->validate();
    }
}
