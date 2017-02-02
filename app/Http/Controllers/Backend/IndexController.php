<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use Auth;
use FisiLog\Models\Student;
use FisiLog\Models\Clase;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->user_type_id == 1) {
            $classes = Clase::whereHas('group', function ($group) use ($user) {
                $group->whereHas('students', function ($students) use ($user) {
                    $students->where('students.id', $user->id);
                });
            })->get();

            $view = 'backend.index.students';
            $data = [
                'classes' => $classes,
            ];
        } elseif ($user->user_type_id == 2) {
            $classes = $this->class_persistence->getByProfessorId($user->id);

            $view = 'backend.index.professors';
            $data = [
                'classes' => $classes,
            ];
        } else {
            //return view('');
        }

        return view($view, $data);
    }
}
