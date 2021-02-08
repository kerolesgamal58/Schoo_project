<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Http\Request;
use function App\Helper\getCurrentStudentID;

class ClassController extends Controller
{
    public function showChat($class_id){
        $student_id = getCurrentStudentID();
        $class_student = Student::where('id', $student_id)->where('class_room_id', $class_id)->first();

        if ( $class_student->count() > 0 ){
//            return $student_classes = Student::find($student_id)->class_room->class_token;
            $class = ClassRoom::find($class_student->class_room_id);
            return view('student.chat', compact('class'));
        }
    }
}
