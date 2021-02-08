<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){
        $activities = Activity::paginate(PAGINATION_COUNT);
        return view('admin.activity.index', compact('activities'));
    }

    public function add(){
        return view('admin.activity.add');
    }

    public function store(ActivityRequest $request){
        $data = $request->except(['_token']);
        Activity::create( $data );
        return redirect()->route('activity.index')->with(['success' => __('admin.activity_added_successfully')]);
    }

    public function edit($id){
        $activity = Activity::find($id);

        if ( !$activity ){
            return redirect()->route('activity.index')->with(['error' => __('admin.activity_edit_error')]);
        }

        return view('admin.activity.edit', compact('activity'));
    }

    public function update($id, ActivityRequest $request){
        $activity = Activity::find($id);

        if ( !$activity ){
            return redirect()->route('activity.index')->with(['error' => __('admin.activity_edit_error')]);
        }

        $data = $request->except(['_token']);

        $activity->update($data);
        return redirect()->route('activity.index')->with(['success' => __('admin.activity_edit_successfully')]);
    }

    public function delete($id){
        $activity = Activity::find($id);

        if ( !$activity ){
            return redirect()->route('activity.index')->with(['error' => __('admin.activity_edit_error')]);
        }

        $activity->delete();
        return redirect()->route('activity.index')->with(['success' => __('admin.activity_deleted_successfully')]);
    }
}
