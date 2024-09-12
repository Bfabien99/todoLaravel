<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('todos.list', ['todos' => Todo::where(['user_id' => auth()->user()->id])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:5|max:100',
            'detail' => 'nullable|min:5|max:500',
            'limit_date' => 'nullable|after_or_equal:'.now()->format('d-m-Y')
        ]);

        # recuperation de l'id de l'user connecté
        $validate['user_id'] = auth()->user()->id;

        # vérifier si l'utilisateur n'a pas de todo portant le même title
        $todo = Todo::where(['user_id' => auth()->user()->id, 'title' => $validate['title']])->first();
        
        # si le todo existe, on le ramène à la liste des todos
        if($todo){
            return back()->with('error', 'Title `'.$validate['title'].'` already exist')->withInput();
        }

        # création du todo en l'affextant à l'utilisatant connecté
        Todo::create($validate);
        return back()->with('success', 'New Todo added...');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        # recupérer le todo en fonction de son id et vérifier qu'il appartien bien à l'user connecté
        $todo = Todo::where(['user_id' => auth()->user()->id, 'id' => $id])->first();
        
        # si le todo n'existe pas, on le ramène à la liste des todos
        if(!$todo) return to_route('todos.index');
        return view('todos.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        # recupérer le todo en fonction de son id et vérifier qu'il appartien bien à l'user connecté
        $todo = Todo::where(['user_id' => auth()->user()->id, 'id' => $id])->first();
        
        # si le todo n'existe pas, on le ramène à la liste des todos
        if(!$todo) return to_route('todos.index');
        return view('todos.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        # recupérer le todo en fonction de son id et vérifier qu'il appartien bien à l'user connecté
        $todo = Todo::where(['user_id' => auth()->user()->id, 'id' => $id])->first();
        
        # si le todo n'existe pas, on le ramène à la liste des todos
        if(!$todo) return to_route('todos.index');

        $validate = $request->validate([
            'title' => 'required|min:5|max:100',
            'detail' => 'nullable|min:5|max:500',
            'limit_date' => 'nullable|after_or_equal:'.now()->format('d-m-Y')
        ]);

        # on s'assure que le nouveau titre n'appartient pas à un autre todo
        $verif_todo = Todo::where(['user_id' => auth()->user()->id, 'title' => $validate['title']])->first();
        if($verif_todo && ($verif_todo->id != $todo->id)) return back()->with('error', 'Title `'.$validate['title'].'` already exist')->withInput();

        # modification des données du todo
        $todo->title = $validate['title'];
        $todo->detail = $validate['detail'];
        $todo->limit_date = $validate['limit_date'];

        # mise à jour réel dans la bd
        $todo->update();
        return to_route('todos.show', $todo)->with('success', 'Todo updated...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        # recupérer le todo en fonction de son id et vérifier qu'il appartien bien à l'user connecté
        $todo = Todo::where(['user_id' => auth()->user()->id, 'id' => $id])->first();
        
        # si le todo n'existe pas, on le ramène à la liste des todos
        if(!$todo) return to_route('todos.index');

        Todo::destroy($id);
        return to_route('todos.index')->with('success', 'Todo deleted...');
    }
}
