<?php

namespace App\Http\Controllers;

use App\Undefined;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class UndefinedController extends Controller
{

    /**
    * Экземпляр TaskRepository.
    *
    * @var TaskRepository
    */
    protected $tasks;

    /**
     * Создание нового экземпляра контроллера.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /**
     * Показать список всех задач пользователя.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request) {

        return view('undefined.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }


    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $request->user()->undefined()->create([
            'name' => $request->name,
        ]);
        return redirect('/undefineds');
    }

    public function destroy (Request $request, Undefined $task) {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/undefineds');
    }
}
