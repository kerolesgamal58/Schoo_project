<?php

use App\Models\ClassTeacher;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use function App\Helper\getCurrentStudentID;
use function App\Helper\getCurrentTeacherID;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('class_token.{class_token}', function ($user, $class_token) {
    if (Auth::guard('teacher')->check()){
        $teacher_id = getCurrentTeacherID();
        $teacher_classes = Teacher::find($teacher_id)->classes;
        $class_tokens = [];
        foreach ($teacher_classes as $class){
            array_push($class_tokens, $class->class_token);
        }
        return in_array($class_token, $class_tokens);
    }
    elseif (Auth::guard('student')->check()){
        $student_id = getCurrentStudentID();
        $student_class = Student::find($student_id)->class_room;
//        $class_tokens = [];
//        foreach ($student_classes as $class){
//            array_push($class_tokens, $class->class_token);
//        }
        return $student_class->class_token == $class_token ? true : false;
    }
    else return false;
});
