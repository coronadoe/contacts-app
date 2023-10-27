<?php

namespace App\Jobs\Contact;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateContact implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $contactValues = [];

    /**
     * Create a new job instance.
     */
    public function __construct($contactValues)
    {
        $this->contactValues = $contactValues;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        (new Contact)->where('id', $this->contactValues['id'])->update($this->contactValues);
    }
}
