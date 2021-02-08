<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentRequest;
use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function index(){
        $parents = StudentParent::paginate(PAGINATION_COUNT);
        return view('admin.parent.index', compact('parents'));
    }

    public function add(){
        return view('admin.parent.add');
    }

    public function store(ParentRequest $request){
        $data = $request->except(['_token']);
        $student = Student::select('id')->where('name', $request->student_name)->first();
        if (is_null($student)){
            return redirect()->route('parent.index')->with(['error' => __('admin.incorrect_student_name')]);
        }

        $data['student_id'] = $student->id;

        StudentParent::create( $data );

        return redirect()->route('parent.index')->with(['success' => __('admin.parent_added_successfully')]);
    }

    public function edit($id){
        $parent = StudentParent::find($id);

        if ( !$parent ){
            return redirect()->route('parent.index')->with(['error' => __('admin.parent_edit_error')]);
        }

        return view('admin.parent.edit', compact('parent'));
    }

    public function update($id, ParentRequest $request){
        $parent = StudentParent::find($id);

        if ( !$parent ){
            return redirect()->route('parent.index')->with(['error' => __('admin.parent_edit_error')]);
        }

        $student = Student::select('id')->where('name', $request->student_name)->first();
        if (is_null($student)){
            return redirect()->route('parent.index')->with(['error' => __('admin.incorrect_student_name')]);
        }

        $data['student_id'] = $student->id;

        $data = $request->except(['_token']);

        $parent->update($data);

        return redirect()->route('parent.index')->with(['success' => __('admin.parent_edit_successfully')]);
    }

    public function delete($id){
        $parent = StudentParent::find($id);

        if ( !$parent ){
            return redirect()->route('parent.index')->with(['error' => __('admin.parent_edit_error')]);
        }

        $parent->delete();
        return redirect()->route('parent.index')->with(['success' => __('admin.parent_deleted_successfully')]);
    }
}
