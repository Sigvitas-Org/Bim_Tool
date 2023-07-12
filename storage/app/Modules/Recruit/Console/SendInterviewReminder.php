<?php

namespace Modules\Recruit\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Recruit\Entities\RecruitInterviewSchedule;
use Modules\Recruit\Events\CandidateInterviewScheduleEvent;
use Modules\Recruit\Events\InterviewScheduleEvent;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SendInterviewReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-interview-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send interview reminder to the attendees before time specified in database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $events = RecruitInterviewSchedule::with(['jobApplication', 'employees'])
            ->select('id', 'job_application_id', 'interview_type', 'schedule_date', 'status', 'user_accept_status', 'meeting_id', 'video_type', 'send_reminder_all', 'remind_type_all', 'remind_time_all', 'notify_c')
            ->where('schedule_date', '>', Carbon::now(global_setting()->timezone)->format('Y-m-d H:i:s'))
            ->where('send_reminder_all', 1)
            ->get();

        if ($events->count() > 0) {
            foreach ($events as $interview) {
                $reminderDateTime = $this->calculateReminderDateTime($interview);

                if ($reminderDateTime->equalTo(Carbon::now()->timezone(global_setting()->timezone)->startOfMinute())) {
                    event(new InterviewScheduleEvent($interview, $interview->employees));
                    event(new CandidateInterviewScheduleEvent($interview, $interview->jobApplication));
                }
            }
        }
    }

    public function calculateReminderDateTime(RecruitInterviewSchedule $interview)
    {
        $time = $interview->remind_time_all;
        $type = $interview->remind_type_all;

        $reminderDateTime = '';

        switch ($type) {
        case 'day':
            $reminderDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $interview->schedule_date, global_setting()->timezone)->subDays($time);
            break;
        case 'hour':
            $reminderDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $interview->schedule_date, global_setting()->timezone)->subHours($time);
            break;
        case 'minute':
            $reminderDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $interview->schedule_date, global_setting()->timezone)->subMinutes($time);
            break;
        }

        return $reminderDateTime;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
    
}
