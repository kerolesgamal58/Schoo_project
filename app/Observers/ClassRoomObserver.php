<?php

namespace App\Observers;

use App\Models\ClassRoom;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Jenssegers\Mongodb\Schema\Blueprint;

class ClassRoomObserver
{
    /**
     * Handle the ClassRoom "created" event.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return void
     */
    public function created(ClassRoom $classRoom)
    {
        Schema::connection('mongodb')->create('class_room_'.$classRoom->id, function (Blueprint $collection){
            $collection->index('id');
            $collection->bigInteger('message_owner')->unsigned();
            $collection->string('message');
        });
    }

    /**
     * Handle the ClassRoom "updated" event.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return void
     */
    public function updated(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Handle the ClassRoom "deleted" event.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return void
     */
    public function deleted(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Handle the ClassRoom "restored" event.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return void
     */
    public function restored(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Handle the ClassRoom "force deleted" event.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return void
     */
    public function forceDeleted(ClassRoom $classRoom)
    {
        //
    }
}
