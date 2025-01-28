<?php

namespace App\Console\Commands;

use App\Models\JobPost;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateExpiredJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job-posts:update-expired-jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status of expired jobs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $jobPosts = JobPost::where('expire_date', '<', $now)->update([
            'status'=> 'expired',
        ]);

        $this->info('the status is updated successfully');
    }
}
