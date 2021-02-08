<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\ClassTeacher;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::paginate(PAGINATION_COUNT);
        return view('admin.teacher.index', compact('teachers'));
    }

    public function add(){
        return view('admin.teacher.add');
    }

    public function store(TeacherRequest $request){
        $data = $request->except(['_token', 'password', 'subjects']);
        $data['password'] = Hash::make($request->password);

        $teacher = Teacher::create( $data );

        foreach ($request->subjects as $subject_id){
            TeacherSubject::create([
                'teacher_id' => $teacher->id,
                'subject_id' => $subject_id,
            ]);
        }

        foreach ($request->class_rooms as $class_room_id){
            ClassTeacher::create([
                'teacher_id' => $teacher->id,
                'class_id' => $class_room_id,
            ]);
        }
        return redirect()->route('teacher.index')->with(['success' => __('admin.teacher_added_successfully')]);
    }

    public function edit($id){
        $teacher = Teacher::find($id);

        if ( !$teacher ){
            return redirect()->route('teacher.index')->with(['error' => __('admin.teacher_edit_error')]);
        }

        return view('admin.teacher.edit', compact('teacher'));
    }

    public function update($id, TeacherRequest $request){
        $teacher = Teacher::find($id);

        if ( !$teacher ){
            return redirect()->route('teacher.index')->with(['error' => __('admin.teacher_edit_error')]);
        }

        $data = $request->except(['_token', 'password']);
        if ( !is_null($request->password) )
            $data['password'] = Hash::make($request->password);

        $teacher->update($data);

        $this->updateTeacherSubject($id, $request->subjects);

        $this->updateTeacherClass($id, $request->class_rooms);

        return redirect()->route('teacher.index')->with(['success' => __('admin.teacher_edit_successfully')]);
    }

    public function delete($id){
        $teacher = Teacher::find($id);

        if ( !$teacher ){
            return redirect()->route('teacher.index')->with(['error' => __('admin.teacher_edit_error')]);
        }

        $teacher->delete();
        return redirect()->route('teacher.index')->with(['success' => __('admin.teacher_deleted_successfully')]);
    }

    public function updateTeacherSubject($teacher_id, $subjects = []){
        $teacher_subjects = TeacherSubject::where('teacher_id', $teacher_id)->get();
        $old_teacher_subjects = $teacher_subjects->count();
        $new_teacher_subjects = count($subjects);
        if ($old_teacher_subjects > $new_teacher_subjects){
            for ($i = 0, $j = $new_teacher_subjects; $i < $j; $i++){
                $teacher_subjects[$i]->update([
                    'teacher_id' => $teacher_id,
                    'subject_id' => $subjects[$i],
                ]);
            }
            for ($i = $new_teacher_subjects, $j = $old_teacher_subjects; $i < $j; $i++){
                $teacher_subjects[$i]->delete();
            }
        }

        elseif ($old_teacher_subjects == $new_teacher_subjects){
            for ($i = 0, $j = $new_teacher_subjects; $i < $j; $i++){
                $teacher_subjects[$i]->update([
                    'teacher_id' => $teacher_id,
                    'subject_id' => $subjects[$i],
                ]);
            }
        }

        else{
            for ($i = 0, $j = $old_teacher_subjects; $i < $j; $i++){
                $teacher_subjects[$i]->update([
                    'teacher_id' => $teacher_id,
                    'subject_id' => $subjects[$i],
                ]);
            }
            for ($i = $old_teacher_subjects, $j = $new_teacher_subjects; $i < $j; $i++){
                TeacherSubject::create([
                    'teacher_id' => $teacher_id,
                    'subject_id' => $subjects[$i],
                ]);
            }
        }
    }

    public function updateTeacherClass($teacher_id, $classes = []){
        $teacher_classes = ClassTeacher::where('teacher_id', $teacher_id)->get();
        $old_teacher_classes = $teacher_classes->count();
        $new_teacher_classes = count($classes);
        if ($old_teacher_classes > $new_teacher_classes){
            for ($i = 0, $j = $new_teacher_classes; $i < $j; $i++){
                $teacher_classes[$i]->update([
                    'teacher_id' => $teacher_id,
                    'class_id' => $classes[$i],
                ]);
            }
            for ($i = $new_teacher_classes, $j = $old_teacher_classes; $i < $j; $i++){
                $teacher_classes[$i]->delete();
            }
        }

        elseif ($old_teacher_classes == $new_teacher_classes){
            for ($i = 0, $j = $new_teacher_classes; $i < $j; $i++){
                $teacher_classes[$i]->update([
                    'teacher_id' => $teacher_id,
                    'class_id' => $classes[$i],
                ]);
            }
        }

        else{
            for ($i = 0, $j = $old_teacher_classes; $i < $j; $i++){
                $teacher_classes[$i]->update([
                    'teacher_id' => $teacher_id,
                    'class_id' => $classes[$i],
                ]);
            }
            for ($i = $old_teacher_classes, $j = $new_teacher_classes; $i < $j; $i++){
                ClassTeacher::create([
                    'teacher_id' => $teacher_id,
                    'class_id' => $classes[$i],
                ]);
            }
        }
    }
}
