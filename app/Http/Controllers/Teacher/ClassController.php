<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\ClassTeacher;
use App\Models\Teacher;
use Illuminate\Http\Request;
use function App\Helper\getCurrentTeacherID;

class ClassController extends Controller
{
    public function showClass(){

    }

    public function showChat($class_id){
        $teacher_id = getCurrentTeacherID();
        $class_teacher = ClassTeacher::where('teacher_id', $teacher_id)->where('class_id', $class_id)->first();

        if ( $class_teacher->count() > 0 ){
            $class = ClassRoom::find($class_teacher->class_id);
            return view('teacher.chat', compact('class'));
        }
    }
}
