<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use Auth;
use FisiLog\Models\Student;
use FisiLog\Models\Clase;
use FisiLog\Models\UserType;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->user_type_id == UserType::STUDENT_TYPE) {
            $classes = Clase::whereHas('group', function ($group) use ($user) {
                $group->whereHas('students', function ($students) use ($user) {
                    $students->where('students.id', $user->id);
                });
            })->get();

            $view = 'backend.index.students';
        } elseif ($user->user_type_id == UserType::PROFESSOR_TYPE) {
            $classes = Clase::where('professor_id', $user->id)->get();

            $view = 'backend.index.professors';
        } else {
            // $classes = Clase::paginate(10)->get();
        }

        return view($view, compact('classes'));
    }
}
