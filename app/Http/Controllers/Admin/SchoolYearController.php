<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolYearRequest;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    public function index(){
        $school_years = SchoolYear::paginate(PAGINATION_COUNT);
        return view('admin.school_year.index', compact('school_years'));
    }

    public function add(){
        return view('admin.school_year.add');
    }

    public function store(SchoolYearRequest $request){
        $data = $request->except(['_token']);
        SchoolYear::create( $data );
        return redirect()->route('school_year.index')->with(['success' => __('admin.school_year_added_successfully')]);
    }

    public function edit($id){
        $school_year = SchoolYear::find($id);

        if ( !$school_year ){
            return redirect()->route('school_year.index')->with(['error' => __('admin.school_year_edit_error')]);
        }

        return view('admin.school_year.edit', compact('school_year'));
    }

    public function update($id, SchoolYearRequest $request){
        $school_year = SchoolYear::find($id);

        if ( !$school_year ){
            return redirect()->route('school_year.index')->with(['error' => __('admin.school_year_edit_error')]);
        }

        $data = $request->except(['_token']);

        $school_year->update($data);
        return redirect()->route('school_year.index')->with(['success' => __('admin.school_year_edit_successfully')]);
    }

    public function delete($id){
        $school_year = SchoolYear::find($id);

        if ( !$school_year ){
            return redirect()->route('school_year.index')->with(['error' => __('admin.school_year_edit_error')]);
        }

        $school_year->delete();
        return redirect()->route('school_year.index')->with(['success' => __('admin.school_year_deleted_successfully')]);
    }
}
