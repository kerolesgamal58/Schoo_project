<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\StudentSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function App\Helper\getStudentSubject;

class StudentController extends Controller
{
    public function index(){
        $students = Student::paginate(PAGINATION_COUNT);
        return view('admin.student.index', compact('students'));
    }

    public function add(){
        return view('admin.student.add');
    }

    public function store(StudentRequest $request){
        $data = $request->except(['_token', 'password', 'subjects']);
        $data['password'] = Hash::make($request->password);

        $student = Student::create( $data );

        foreach ($request->subjects as $subject_id){
            StudentSubject::create([
                'student_id' => $student->id,
                'subject_id' => $subject_id,
            ]);
        }

        return redirect()->route('student.index')->with(['success' => __('admin.student_added_successfully')]);
    }

    public function edit($id){
        $student = Student::find($id);

        if ( !$student ){
            return redirect()->route('student.index')->with(['error' => __('admin.student_edit_error')]);
        }

        return view('admin.student.edit', compact('student'));
    }

    public function update($id, StudentRequest $request){
        $student = Student::find($id);

        if ( !$student ){
            return redirect()->route('student.index')->with(['error' => __('admin.student_edit_error')]);
        }

        $data = $request->except(['_token', 'password', 'subjects']);
        if ( !is_null($request->password) )
            $data['password'] = Hash::make($request->password);

        $student->update($data);

        $this->updateStudentSubject($id, $request->subjects);

        return redirect()->route('student.index')->with(['success' => __('admin.student_edit_successfully')]);
    }

    public function delete($id){
        $student = Student::find($id);

        if ( !$student ){
            return redirect()->route('student.index')->with(['error' => __('admin.student_edit_error')]);
        }

        $student->delete();
        return redirect()->route('student.index')->with(['success' => __('admin.student_deleted_successfully')]);
    }

    public function loadSchoolYearSubject(Request $request){
        $subjects = Subject::where('school_year_id', $request->school_year)->get();
        if ( $subjects->count() > 0 )
            return response()->json([
                'status' => true,
                'data' => $subjects,
            ]);
    }

    public function updateStudentSubject($student_id, $subjects = []){
        $student_subjects = StudentSubject::where('student_id', $student_id)->get();
        $old_student_subjects = $student_subjects->count();
        $new_student_subjects = count($subjects);
        if ($old_student_subjects > $new_student_subjects){
            for ($i = 0, $j = $new_student_subjects; $i < $j; $i++){
                $student_subjects[$i]->update([
                    'student_id' => $student_id,
                    'subject_id' => $subjects[$i],
                ]);
            }
            for ($i = $new_student_subjects, $j = $old_student_subjects; $i < $j; $i++){
                $student_subjects[$i]->delete();
            }
        }

        elseif ($old_student_subjects == $new_student_subjects){
            for ($i = 0, $j = $new_student_subjects; $i < $j; $i++){
                $student_subjects[$i]->update([
                    'student_id' => $student_id,
                    'subject_id' => $subjects[$i],
                ]);
            }
        }

        else{
            for ($i = 0, $j = $old_student_subjects; $i < $j; $i++){
                $student_subjects[$i]->update([
                    'student_id' => $student_id,
                    'subject_id' => $subjects[$i],
                ]);
            }
            for ($i = $old_student_subjects, $j = $new_student_subjects; $i < $j; $i++){
                StudentSubject::create([
                    'student_id' => $student_id,
                    'subject_id' => $subjects[$i],
                ]);
            }
        }
    }
}
