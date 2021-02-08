<?php

namespace App\Helper;

use App\Models\ClassTeacher;
use App\Models\StudentSubject;
use App\Models\TeacherSubject;
use Illuminate\Support\Facades\Auth;

function getCurrentAdminID(){
    return Auth::guard('admin')->user()->id;
}

function getStudentSubject($student_id){
    $subjects = StudentSubject::where('student_id', $student_id)->get();

    $subject_ids = [];
    foreach ($subjects as $subject){
        array_push($subject_ids, $subject->subject_id);
    }
    return $subject_ids;
}

function getTeacherSubject($teacher_id){
    $subjects = TeacherSubject::where('teacher_id', $teacher_id)->get();

    $subject_ids = [];
    foreach ($subjects as $subject){
        array_push($subject_ids, $subject->subject_id);
    }
    return $subject_ids;
}

function getTeacherClass($teacher_id){
    $classes = ClassTeacher::where('teacher_id', $teacher_id)->get();

    $class_ids = [];
    foreach ($classes as $class){
        array_push($class_ids, $class->class_id);
    }
    return $class_ids;
}

function getCurrentTeacherID(){
    return Auth::guard('teacher')->user()->id;
}

function getCurrentStudentID(){
    return Auth::guard('student')->user()->id;
}

function countTeacherClasses(){
    $teacher_id = getCurrentTeacherID();
    $teacher_classes = ClassTeacher::where('teacher_id', $teacher_id)->count();
    return $teacher_classes;
}
