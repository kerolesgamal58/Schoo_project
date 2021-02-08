<?php

namespace App\Jobs;

use App\Mail\PayPayments;
use App\Models\SchoolYear;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPaymentsEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $school_years = SchoolYear::select('id', 'fee')->get();
        foreach ($school_years as $school_year){
            $students = Student::select('email', 'payed', 'name', 'id')
                ->where('school_year_id', $school_year->id)
                ->where('payed', '<', $school_year->fee)->get();
            foreach ($students as $student){
                foreach ($student->parents as $parent){
                    Mail::to($parent->email)->send(new PayPayments($parent->name));
                }
            }
        }
    }
}
