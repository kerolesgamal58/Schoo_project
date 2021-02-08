<?php

namespace App\Console\Commands;

use App\Mail\PayPayments;
use App\Models\SchoolYear;
use App\Models\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPaymentsEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to students who are not yet payed the payments';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \App\Jobs\SendPaymentsEmails::dispatch();
    }
}
