<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $subject;
    protected $body;
    
    public function __construct($subject, $body)
    {
        $this->subject = $subject;
        $this->body = $body;
    }
    

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
{
    $subject = $this->subject;
    $body = $this->body;
 
    Mail::to('ankurc@whizkraft.net')->send(new TestMail($subject, $body));

}

    
}
