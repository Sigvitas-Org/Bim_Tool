<?php

use App\Models\Permission;
use App\Models\PermissionType;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Recruit\Entities\ApplicationSource;
use Modules\Recruit\Entities\RecruitApplicationStatus;
use Modules\Recruit\Entities\RecruitInterviewSchedule;
use Modules\Recruit\Entities\RecruitJob;
use Modules\Recruit\Entities\RecruitJobboardSetting;
use Modules\Recruit\Entities\RecruitJobType;
use Modules\Recruit\Entities\RecruitSetting;
use Modules\Recruit\Entities\RecruitWorkExperience;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('recruit_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('recruit_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->string('slug')->nullable();

            $table->longText('job_description')->nullable();
            $table->integer('total_positions');

            $table->unsignedInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('company_addresses')->onUpdate('cascade')->onDelete('cascade');

            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->enum('status', ['open', 'closed'])->default('open');
            $table->text('meta_details');
            $table->timestamps();
            $table->softDeletes();
        });

        $recruitModule = \App\Models\Module::firstOrCreate(['module_name' => 'recruit']);
        \App\Models\ModuleSetting::firstOrCreate(
            [
                'module_name' => 'recruit',
                'status' => 'active',
                'type' => 'admin'
            ]
        );
        \App\Models\ModuleSetting::firstOrCreate(
            [
                'module_name' => 'recruit',
                'status' => 'active',
                'type' => 'employee'
            ]
        );

        $admin = User::allAdmins()->first();
        $admins = RoleUser::where('role_id', '1')->get();
        $allTypePermisison = PermissionType::where('name', 'all')->first();

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->integer('last_updated_by')->unsigned()->nullable();
            $table->foreign('last_updated_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');
        });

        if (!is_null($admin)) {
            RecruitJob::whereNull('added_by')->update(['added_by' => $admin->id]);
            RecruitJob::whereNull('last_updated_by')->update(['last_updated_by' => $admin->id]);
        }

        $customPermisisons = [
            'manage_skill',
        ];

        foreach ($customPermisisons as $permission) {
            $perm = Permission::create([
                'name' => $permission,
                'display_name' => ucwords(str_replace('_', ' ', $permission)),
                'is_custom' => 1,
                'module_id' => $recruitModule->id,
                'allowed_permissions' => '{"all":4, "none":5}'
            ]);

            foreach ($admins as $item) {
                UserPermission::create(
                    [
                        'user_id' => $item->user_id,
                        'permission_id' => $perm->id,
                        'permission_type_id' => $allTypePermisison->id
                    ]
                );
            }
        }

        Schema::create('recruit_interview_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->timestamps();
        });

        $data = [
            ['name' => 'HR round'], ['name' => 'technical round'], ['name' => 'Manager round'],
        ];
        DB::table('recruit_interview_stages')->insert($data);

        Schema::create('recruit_job_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('recruit_jobs')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('skill_id')->unsigned();
            $table->foreign('skill_id')->references('id')->on('recruit_skills')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('recruit_application_status_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        $data = [
            ['name' => 'applied'],['name' => 'shortlist'],['name' => 'interview'],['name' => 'hired'],['name' => 'rejected'],['name' => 'others']
        ];
        DB::table('recruit_application_status_categories')->insert($data);

        Schema::create('recruit_application_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->string('slug');
            $table->string('color');
            $table->integer('position');
            $table->timestamps();
        });

        $data = [
            ['status' => 'applied', 'slug' => 'applied', 'position' => '1', 'color' => '#2b2b2b'],
            ['status' => 'phone screen', 'slug' => 'phone_screen', 'position' => '2', 'color' => '#f1e52e'],
            ['status' => 'interview', 'slug' => 'interview', 'position' => '3', 'color' => '#3d8ee8'],
            ['status' => 'hired', 'slug' => 'hired', 'position' => '4', 'color' => '#32ac16'],
            ['status' => 'rejected', 'slug' => 'rejected', 'position' => '5', 'color' => '#ee1127'],
        ];
        DB::table('recruit_application_status')->insert($data);

        Schema::create('recruit_job_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('photo')->nullable();
            $table->text('resume');
            $table->mediumText('cover_letter');
            $table->integer('column_priority')->nullable();

            $table->bigInteger('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('recruit_jobs')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('status_id')->unsigned()->nullable()->default(null);
            $table->foreign('status_id')->references('id')->on('recruit_application_status')->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('company_addresses')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->integer('last_updated_by')->unsigned()->nullable();
            $table->foreign('last_updated_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('recruit_applicant_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('job_application_id')->unsigned();
            $table->foreign('job_application_id')->references('id')->on('recruit_job_applications')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->text('note_text');
            $table->timestamps();
        });

        Schema::create('recruit_application_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_id')->unsigned();
            $table->foreign('application_id')->references('id')->on('recruit_job_applications')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('skill_id')->unsigned();
            $table->foreign('skill_id')->references('id')->on('recruit_skills')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('recruit_jobboard_settings', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('board_column_id')->unsigned();
            $table->foreign('board_column_id')->references('id')->on('recruit_application_status')->onDelete('restrict')->onUpdate('cascade');

            $table->boolean('collapsed')->default(0);

            $table->timestamps();
        });

        $employees = User::allEmployees();
        $jobBoardColumn = RecruitApplicationStatus::all();

        if (!is_null($employees) && !is_null($jobBoardColumn)) {
            foreach ($employees as $item) {
                foreach ($jobBoardColumn as $board) {
                    RecruitJobboardSetting::create([
                        'user_id' => $item->id,
                        'board_column_id' => $board->id
                    ]);
                }
            }
        }

        Schema::create('recruiters', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->enum('status', ['enabled', 'disabled'])->default('enabled');

            $table->integer('added_by')->unsigned();
            $table->foreign('added_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('last_updated_by')->unsigned()->nullable();
            $table->foreign('last_updated_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->timestamps();
        });

        Schema::create('recruit_interview_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_application_id')->unsigned();
            $table->foreign('job_application_id')->references('id')->on('recruit_job_applications')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->enum('interview_type', ['online', 'offline'])->default('offline');
            $table->dateTime('schedule_date')->nullable();
            $table->enum('status', ['rejected','hired','pending','canceled','completed'])->default('pending');
            $table->enum('user_accept_status', ['accept','refuse','waiting'])->default('waiting');
            $table->integer('meeting_id')->nullable();
            $table->timestamps();
        });

        Schema::create('recruit_interview_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('interview_schedule_id')->unsigned();

            $table->foreign('interview_schedule_id')->references('id')->on('recruit_interview_schedules')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->enum('user_accept_status', ['accept', 'refuse', 'waiting'])->default('waiting');
            $table->timestamps();
        });

        Schema::create('recruit_interview_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('interview_schedule_id')->unsigned();

            $table->foreign('interview_schedule_id')->references('id')->on('recruit_interview_schedules')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->text('comment')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::table('recruit_job_applications', function (Blueprint $table) {
            $table->enum('job_type', ['part time', 'full time', 'internship'])->default('full time')->nullable()->after('column_priority');
        });

        Schema::create('recruit_application_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_id')->unsigned();
            $table->foreign('application_id')->references('id')->on('recruit_job_applications')->onDelete('cascade')->onUpdate('cascade');

            $table->string('filename');
            $table->string('hashname');
            $table->string('size');
            $table->text('description')->nullable();

            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->integer('last_updated_by')->unsigned()->nullable();
            $table->foreign('last_updated_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('recruit_candidate_database', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('job_id')->unsigned();
            $table->bigInteger('location_id')->unsigned();
            $table->date('Job_applied_on');
            $table->longText('skills');
            $table->timestamps();
        });

        Schema::table('recruit_job_applications', function (Blueprint $table) {
            $table->mediumText('cover_letter')->nullable()->change();
        });

        $applicationModule = \App\Models\ModuleSetting::where(['module_name' => 'jobApplication'])->delete();

        Schema::create('recruit_footer_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->integer('recruiter_id')->after('location_id');
            $table->enum('job_type', ['part time', 'full time'])->default('full time')->after('recruiter_id');
            $table->string('work_experience')->after('job_type');
            $table->string('pay_type')->after('work_experience');
            $table->double('start_amount')->after('pay_type');
            $table->double('end_amount')->nullable()->after('start_amount');
            $table->enum('pay_according', ['hour', 'day', 'week', 'month', 'year'])->after('end_amount');
        });

        \DB::statement("ALTER TABLE `recruit_interview_schedules` CHANGE `interview_type` `interview_type` ENUM('in person', 'video', 'phone') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in person';");

        Schema::table('recruit_interview_schedules', function (Blueprint $table) {
            $table->enum('video_type', ['zoom', 'other'])->default('other')->nullable()->after('meeting_id');
            $table->string('phone')->nullable();
            $table->string('other_link')->nullable();
        });

        Schema::create('recruit_job_offer_letter', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('job_app_id')->unsigned()->nullable()->default(null);
            $table->foreign('job_app_id')->references('id')->on('recruit_job_applications')->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('job_id')->unsigned()->nullable()->default(null);
            $table->foreign('job_id')->references('id')->on('recruit_jobs')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('employee_id')->unsigned()->nullable()->default(null);

            $table->date('job_expire');
            $table->date('expected_joining_date');
            $table->double('comp_amount');
            $table->string('status');
            $table->enum('pay_according', [ 'hour', 'day', 'week', 'month', 'year']);
            $table->string('sign_require')->nullable();
            $table->string('sign_image')->nullable();
            $table->string('decline_reason')->nullable();

            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->integer('last_updated_by')->unsigned()->nullable();
            $table->foreign('last_updated_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->timestamps();
        });

        Schema::create('recruit_job_histories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('job_id')->unsigned()->nullable();
            $table->foreign('job_id')->references('id')->on('recruit_jobs')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('job_application_id')->unsigned()->nullable();
            $table->foreign('job_application_id')->references('id')->on('recruit_job_applications')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('offer_id')->unsigned()->nullable();
            $table->foreign('offer_id')->references('id')->on('recruit_job_offer_letter')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('interview_schedule_id')->unsigned()->nullable();
            $table->foreign('interview_schedule_id')->references('id')->on('recruit_interview_schedules')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->text('details');

            $table->timestamps();
        });

        Schema::table('recruit_interview_schedules', function (Blueprint $table) {
            $table->boolean('notify_c')->default(0)->after('video_type');
            $table->integer('remind_time_all')->nullable()->after('video_type');
            $table->enum('remind_type_all', ['day', 'hour', 'minute'])->after('video_type');
            $table->boolean('send_reminder_all')->default(0)->after('video_type');
        });

        Schema::table('recruit_candidate_database', function (Blueprint $table) {
            $table->bigInteger('job_application_id')->unsigned()->after('skills');
        });

        Schema::table('recruit_job_applications', function ($table) {
            $table->dropColumn('job_type');
        });

        Schema::table('recruit_job_applications', function (Blueprint $table) {
            $table->string('application_source')->nullable()->after('column_priority');
        });

        Schema::create('recruit_job_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('recruit_jobs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('filename');
            $table->text('description')->nullable();
            $table->string('google_url')->nullable();
            $table->string('hashname')->nullable();
            $table->string('size')->nullable();
            $table->string('dropbox_link')->nullable();
            $table->string('external_link')->nullable();
            $table->string('external_link_name')->nullable();
            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->integer('last_updated_by')->unsigned()->nullable();
            $table->foreign('last_updated_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->timestamps();
        });

        Schema::create('recruit_interview_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('interview_id')->unsigned();
            $table->foreign('interview_id')->references('id')->on('recruit_interview_schedules')->onDelete('cascade')->onUpdate('cascade');
            $table->string('filename');
            $table->text('description')->nullable();
            $table->string('google_url')->nullable();
            $table->string('hashname')->nullable();
            $table->string('size')->nullable();
            $table->string('dropbox_link')->nullable();
            $table->string('external_link')->nullable();
            $table->string('external_link_name')->nullable();

            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->integer('last_updated_by')->unsigned()->nullable();
            $table->foreign('last_updated_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->timestamps();
        });

        Schema::create('recruit_interview_histories', function (Blueprint $table) {
            $table->id();

            $table->integer('interview_schedule_id')->unsigned()->nullable();
            $table->foreign('interview_schedule_id')->references('id')->on('recruit_interview_schedules')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('file_id')->unsigned()->nullable();
            $table->foreign('file_id')->references('id')->on('recruit_interview_files')->onDelete('cascade')->onUpdate('cascade')->after('interview_schedule_id');

            $table->text('details');

            $table->timestamps();
        });

        Schema::table('recruit_job_histories', function (Blueprint $table) {
            $table->integer('file_id')->unsigned()->nullable();
            $table->foreign('file_id')->references('id')->on('recruit_job_files')->onDelete('cascade')->onUpdate('cascade')->after('interview_schedule_id');
        });

        Schema::table('recruit_interview_schedules', function (Blueprint $table) {
            $table->string('remarks')->nullable();
        });

        Schema::create('recruit_recommendation_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');

            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->integer('last_updated_by')->unsigned()->nullable();
            $table->foreign('last_updated_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->timestamps();
        });

        Schema::create('recruit_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->longText('about')->nullable()->default(null);
            $table->string('type')->nullable()->default('bg-image');
            $table->string('background_image')->nullable();
            $table->string('background_color')->nullable();
            $table->longText('mail_setting');
            $table->longText('legal_term')->nullable()->default(null);
            $table->timestamps();
        });

        $status = RecruitApplicationStatus::all();
        $arr = [];

        foreach ($status as $val) {
            $arr[$val->id] = [
                'id' => $val->id,
                'name' => $val->status,
                'status' => true
            ];
        }


        $setting = new RecruitSetting();
        $setting->company_id = null;
        $setting->type = 'bg-image';
        $setting->background_color = null;
        $setting->background_image = null;
        $setting->mail_setting = $arr;
        $setting->legal_term = "If any provision of these Terms and Conditions is held to be invalid or unenforceable, the provision shall be removed (or interpreted, if possible, in a manner as to be enforceable), and the remaining provisions shall be enforced. Headings are for reference purposes only and in no way define, limit, construe or describe the scope or extent of such section. Our failure to act with respect to a breach by you or others does not waive our right to act with respect to subsequent or similar breaches. These Terms and Conditions set forth the entire understanding and agreement between us with respect to the subject matter contained herein and supersede any other agreement, proposals and communications, written or oral, between our representatives and you with respect to the subject matter hereof, including any terms and conditions on any of customer's documents or purchase orders.<br>No Joint Venture, No Derogation of Rights. You agree that no joint venture, partnership, employment, or agency relationship exists between you and us as a result of these Terms and Conditions or your use of the Site. Our performance of these Terms and Conditions is subject to existing laws and legal process, and nothing contained herein is in derogation of our right to comply with governmental, court and law enforcement requests or requirements relating to your use of the Site or information provided to or gathered by us with respect to such use.";
        $setting->about = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
        $setting->save();

        Schema::create('recruit_job_offer_files', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('job_offer_id')->unsigned();
            $table->foreign('job_offer_id')->references('id')->on('recruit_job_offer_letter')->onDelete('cascade')->onUpdate('cascade');

            $table->string('filename');
            $table->string('hashname')->nullable();

            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->integer('last_updated_by')->unsigned()->nullable();
            $table->foreign('last_updated_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->timestamps();
        });

        Schema::create('recruit_interview_evaluations', function (Blueprint $table) {
            $table->id();

            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('recruit_recommendation_statuses')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('interview_schedule_id')->unsigned()->nullable();
            $table->foreign('interview_schedule_id')->references('id')->on('recruit_interview_schedules')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('submitted_by')->unsigned()->nullable()->default(null);
            $table->foreign('submitted_by')->references('id')->on('users')->onDelete(null)->onUpdate('cascade');

            $table->text('details');

            $table->timestamps();
        });

        Schema::create('recruit_job_types', function (Blueprint $table) {
            $table->id();
            $table->string('job_type');
            $table->timestamps();
        });

        $jobType = new RecruitJobType();
        $jobType->job_type = "Full time";
        $jobType->save();

        $jobType = new RecruitJobType();
        $jobType->job_type = "Part time";
        $jobType->save();

        $jobType = new RecruitJobType();
        $jobType->job_type = "On Contract";
        $jobType->save();

        $jobType = new RecruitJobType();
        $jobType->job_type = "Internship";
        $jobType->save();

        $jobType = new RecruitJobType();
        $jobType->job_type = "Trainee";
        $jobType->save();

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('job_type_id')->nullable();
            $table->foreign('job_type_id')->references('id')->on('recruit_job_types')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('recruit_work_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('work_experience');
            $table->timestamps();
        });

        $workExperience = new RecruitWorkExperience();
        $workExperience->work_experience = "fresher";
        $workExperience->save();

        $workExperience = new RecruitWorkExperience;
        $workExperience->work_experience = "0-1 years";
        $workExperience->save();

        $workExperience = new RecruitWorkExperience;
        $workExperience->work_experience = "1-3 years";
        $workExperience->save();

        $workExperience = new RecruitWorkExperience;
        $workExperience->work_experience = "3-5 years";
        $workExperience->save();

        $workExperience = new RecruitWorkExperience;
        $workExperience->work_experience = "5+ years";
        $workExperience->save();

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('work_experience_id')->nullable()->after('work_experience');
            $table->foreign('work_experience_id')->references('id')->on('recruit_work_experiences')->onUpdate('cascade')->onDelete('cascade');
            $table->dropColumn('work_experience');
        });

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->boolean('is_photo_require')->default(false)->after('meta_details');
            $table->boolean('is_resume_require')->default(false)->after('is_photo_require');
        });

        Schema::create('application_sources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('application_source');
            $table->timestamps();
        });


        $application = new ApplicationSource();
        $application->application_source = "Linkedin";
        $application->save();

        $application = new ApplicationSource;
        $application->application_source = "Facebook";
        $application->save();

        $application = new ApplicationSource;
        $application->application_source = "Instagram";
        $application->save();

        $application = new ApplicationSource;
        $application->application_source = "Twitter";
        $application->save();

        $application = new ApplicationSource;
        $application->application_source = "Other";
        $application->save();

        Schema::table('recruit_job_applications', function (Blueprint $table) {
            $table->integer('source_id')->unsigned()->nullable()->after('application_source');
            $table->foreign('source_id')->references('id')->on('application_sources')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('application_sources', ['careerWebsite', 'addedByUser'])->after('location_id');
            $table->dropColumn('application_source');
        });

        Schema::create('recruit_job_addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('address_id');
            $table->foreign('job_id')->references('id')->on('recruit_jobs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('address_id')->references('id')->on('company_addresses')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });

        Schema::table('recruit_job_offer_letter', function (Blueprint $table) {
            $table->string('hash')->nullable()->after('decline_reason');
            $table->string('ip_address')->nullable();
            $table->timestamp('offer_accept_at')->nullable()->after('hash');
        });

        $recruitModule = \App\Models\Module::where(['module_name' => 'recruit'])->first();
        $id = $recruitModule->id;
        $admin = User::allAdmins()->first();

        Schema::table('recruit_interview_schedules', function (Blueprint $table) {
            $table->integer('added_by')->unsigned()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');

            $table->integer('last_updated_by')->unsigned()->nullable();
            $table->foreign('last_updated_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('cascade');
        });
        
        if (!is_null($admin)) {
            RecruitInterviewSchedule::whereNull('added_by')->update(['added_by' => $admin->id]);
            RecruitInterviewSchedule::whereNull('last_updated_by')->update(['last_updated_by' => $admin->id]);
        }

        $customPermisisons = [
            'add_job',
            'view_job',
            'edit_job',
            'delete_job',
            'add_job_application',
            'view_job_application',
            'update_job_application',
            'add_interview',
            'add_notes',
            'edit_notes',
            'delete_notes',
            'add_application_status',
            'edit_application_status',
            'delete_application_status',
            'change_application_status',
            'add_interview_schedule',
            'view_interview_schedule',
            'edit_interview_schedule',
            'delete_interview_schedule',
            'reschedule_interview',
            'add_recommendation_status',
            'edit_recommendation_status',
            'delete_recommendation_status',
            'add_recruiter',
            'delete_recruiter',
            'add_offer_letter',
            'view_offer_letter',
            'edit_offer_letter',
            'delete_offer_letter',
            'add_footer_link',
            'edit_footer_link',
            'delete_footer_link',
            'view_report',
            'recruit_settings'
        ];

        Permission::insert([
            ['name' => 'add_job', 'display_name' => 'Add Job', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'view_job', 'display_name' => 'View Job', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'edit_job', 'display_name' => 'Edit Job', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'delete_job', 'display_name' => 'Delete Job', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'add_job_application', 'display_name' => 'Add Job Application', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "none":5}'],
            ['name' => 'view_job_application', 'display_name' => 'View Job Application', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'edit_job_application', 'display_name' => 'Edit Job Application', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'delete_job_application', 'display_name' => 'Delete Job Application', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'add_notes', 'display_name' => 'Add Notes', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "owned":2, "none":5}'],
            ['name' => 'edit_notes', 'display_name' => 'Edit Notes', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'delete_notes', 'display_name' => 'Delete Notes', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],


            ['name' => 'add_application_status', 'display_name' => 'Add Application Status', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],
            ['name' => 'edit_application_status', 'display_name' => 'Edit Application Status', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],
            ['name' => 'delete_application_status', 'display_name' => 'Delete Application Status', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],
            ['name' => 'change_application_status', 'display_name' => 'Change Application Status', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],

            ['name' => 'add_interview_schedule', 'display_name' => 'Add Interview Schedule', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "none":5}'],
            ['name' => 'view_interview_schedule', 'display_name' => 'View Interview Schedule', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'edit_interview_schedule', 'display_name' => 'Edit Interview Schedule', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'delete_interview_schedule', 'display_name' => 'Delete Interview Schedule', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'reschedule_interview', 'display_name' => 'Reschedule Interview', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],

            ['name' => 'add_recommendation_status', 'display_name' => 'Add Recommendation Status', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],
            ['name' => 'edit_recommendation_status', 'display_name' => 'Edit Recommendation Status', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],
            ['name' => 'delete_recommendation_status', 'display_name' => 'Delete Recommendation Status', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],

            ['name' => 'add_recruiter', 'display_name' => 'Add Recruiter', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],
            ['name' => 'edit_recruiter', 'display_name' => 'Edit Recruiter', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],
            ['name' => 'delete_recruiter', 'display_name' => 'Delete Recruiter', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],
            ['name' => 'add_offer_letter', 'display_name' => 'Add Offer Letter', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "none":5}'],
            ['name' => 'view_offer_letter', 'display_name' => 'View Offer Letter', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'edit_offer_letter', 'display_name' => 'Edit Offer Letter', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],
            ['name' => 'delete_offer_letter', 'display_name' => 'Delete Offer Letter', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "added":1, "owned":2,"both":3, "none":5}'],


            ['name' => 'add_footer_link', 'display_name' => 'Add Footer Link', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],
            ['name' => 'edit_footer_link', 'display_name' => 'Edit Footer Link', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],
            ['name' => 'delete_footer_link', 'display_name' => 'Delete Footer Link', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],

            ['name' => 'view_report', 'display_name' => 'View Report', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],

            ['name' => 'recruit_settings', 'display_name' => 'Recruit Settings', 'is_custom' => 1, 'module_id' => $id, 'allowed_permissions' => '{"all":4, "none":5}'],

        ]);

        $allPermissions = Permission::where('module_id', $id)->get();
        $allTypePermisison = PermissionType::where('name', 'all')->first();
        $admins = RoleUser::where('role_id', '1')->get();

        foreach ($admins as $item) {
            foreach ($allPermissions as $permission) {
                UserPermission::create(
                    [
                        'user_id' => $item->user_id,
                        'permission_id' => $permission->id,
                        'permission_type_id' => $allTypePermisison->id
                    ]
                );
            }
        }

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->boolean('is_dob_require')->default(false)->after('is_resume_require');
            $table->boolean('is_gender_require')->default(false)->after('is_dob_require');
        });

        Schema::create('offer_letter_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('job_offer_id')->unsigned()->nullable();
            $table->foreign('job_offer_id')->references('id')->on('recruit_job_offer_letter')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('file_id')->unsigned()->nullable();
            $table->foreign('file_id')->references('id')->on('recruit_job_offer_files')->onDelete('cascade')->onUpdate('cascade')->after('job_offer_id');

            $table->text('details');
            $table->timestamps();
        });

        Schema::table('recruit_settings', function (Blueprint $table) {
            $table->string('logo')->after('legal_term')->nullable();
            $table->string('favicon')->after('logo')->nullable();
            $table->string('company_name')->after('favicon')->nullable();
            $table->string('company_website')->after('company_name')->nullable();
        });

        $setting = RecruitSetting::first();
        $setting->company_name = 'Worksuite';
        $setting->company_website = 'https://worksuite.biz';
        $setting->save();

        Schema::create('recruit_email_notification_settings', function (Blueprint $table) {
            $table->id();
            $table->string('setting_name');
            $table->enum('send_email', ['yes', 'no'])->default('no');
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        $data = [
            ['setting_name' => 'New Job/Added by Admin', 'send_email' => 'yes', 'slug' => 'new-jobadded-by-admin'],
            ['setting_name' => 'New Job Application/Added by Admin', 'send_email' => 'yes', 'slug' => 'new-job-applicationadded-by-admin'],
            ['setting_name' => 'New Interview Schedule/Added by Admin', 'send_email' => 'yes', 'slug' => 'new-interview-scheduleadded-by-admin'],
            ['setting_name' => 'New Offer Letter/Added by Admin', 'send_email' => 'yes', 'slug' => 'new-offer-letteradded-by-admin'],

        ];
        DB::table('recruit_email_notification_settings')->insert($data);

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->integer('remaining_openings');
        });

        Schema::table('recruit_application_status', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned()->nullable()->default(null);
            $table->foreign('category_id')->references('id')->on('recruit_application_status_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('action', ['yes', 'no'])->default('no');
        });

        $statuses = RecruitApplicationStatus::all();

        foreach ($statuses as $status) {
            if ($status->slug == 'applied') {
                $status->category_id = 1;
                $status->action = 'yes';
            }
            elseif ($status->slug == 'phone_screen') {
                $status->category_id = 2;
                $status->action = 'yes';
            }
            elseif ($status->slug == 'interview') {
                $status->category_id = 3;
                $status->action = 'yes';
            }
            elseif ($status->slug == 'hired') {
                $status->category_id = 4;
                $status->action = 'yes';
            }
            elseif ($status->slug == 'rejected') {
                $status->category_id = 5;
                $status->action = 'yes';
            }
            else {
                $status->category_id = 6;
                $status->action = 'no';
            }

            $status->save();
        }

        Schema::table('recruit_job_applications', function (Blueprint $table) {
            $table->string('remark');
        });

        Schema::table('recruit_settings', function (Blueprint $table) {
            $table->string('purchase_code')->nullable()->default(null);
        });

        Schema::create('job_interview_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('recruit_jobs')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('stage_id')->unsigned();
            $table->foreign('stage_id')->references('id')->on('recruit_interview_stages')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::table('recruit_interview_schedules', function (Blueprint $table) {
            $table->integer('stage_id')->unsigned()->nullable()->after('interview_type');
            $table->foreign('stage_id')->references('id')->on('recruit_interview_stages')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('recruit_interview_schedules')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('recruit_interview_evaluations', function (Blueprint $table) {
            $table->integer('stage_id')->unsigned()->nullable()->after('interview_schedule_id');
            $table->foreign('stage_id')->references('id')->on('recruit_interview_stages')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('job_application_id')->unsigned()->nullable()->after('interview_schedule_id');
            $table->foreign('job_application_id')->references('id')->on('recruit_job_applications');

        });

        DB::statement('ALTER TABLE `recruit_interview_evaluations` DROP FOREIGN KEY `recruit_interview_evaluations_job_application_id_foreign`');

        DB::statement('ALTER TABLE `recruit_interview_evaluations` ADD CONSTRAINT `recruit_interview_evaluations_job_application_id_foreign` FOREIGN KEY (`job_application_id`) REFERENCES `recruit_job_applications`(`id`) ON DELETE CASCADE ON UPDATE CASCADE');
    }

    /**
     * Reverse the migrations.
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_interview_stages');

        Schema::table('recruit_settings', function (Blueprint $table) {
            $table->dropColumn('purchase_code');
        });

        Schema::table('recruit_job_applications', function (Blueprint $table) {
            $table->dropColumn('remark');
        });

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->dropColumn('remaining_openings');
        });

        Schema::dropIfExists('recruit_email_notification_settings');

        Schema::table('recruit_settings', function (Blueprint $table) {
            $table->dropColumn(['logo', 'favicon', 'company_name', 'company_website']);
        });

        Schema::dropIfExists('offer_letter_histories');

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->dropColumn('is_dob_require');
            $table->dropColumn('is_gender_require');
        });

        Schema::table('recruit_job_offer_letter', function (Blueprint $table) {
            $table->dropColumn(['hash', 'ip_address', 'offer_accept_at']);
        });

        Schema::dropIfExists('recruit_job_addresses');

        Schema::table('recruit_job_applications', function (Blueprint $table) {
            $table->dropForeign(['source_id']);
            $table->dropColumn('source_id');
            $table->dropColumn('application_sources');
        });

        Schema::dropIfExists('application_sources');

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->dropColumn('is_photo_require');
            $table->dropColumn('is_resume_require');
        });

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->dropForeign(['work_experience_id']);
            $table->dropColumn('work_experience_id');
        });

        Schema::dropIfExists('recruit_work_experiences');

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->dropForeign('recruit_jobs_job_type_id_foreign');
            $table->dropColumn(['job_type']);
        });

        Schema::dropIfExists('recruit_job_types');

        Schema::dropIfExists('recruit_interview_evaluations');

        Schema::dropIfExists('recruit_job_offer_files');

        Schema::dropIfExists('recruit_settings');

        Schema::dropIfExists('recruit_recommendation_statuses');

        Schema::table('recruit_interview_schedules', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });

        Schema::table('recruit_job_histories', function (Blueprint $table) {
            $table->dropForeign(['file_id']);
            $table->dropColumn('file_id');
        });

        Schema::dropIfExists('recruit_interview_histories');

        Schema::dropIfExists('recruit_interview_files');

        Schema::dropIfExists('recruit_job_files');

        Schema::table('recruit_candidate_database', function (Blueprint $table) {
            $table->dropColumn('job_application_id');
        });

        Schema::table('recruit_interview_schedules', function (Blueprint $table) {
            $table->dropColumn(['notify_c', 'remind_time_all', 'remind_type_all', 'send_reminder_all']);
        });

        Schema::dropIfExists('recruit_job_histories');

        Schema::dropIfExists('recruit_job_offer_letter');

        Schema::table('recruit_interview_schedules', function (Blueprint $table) {
            $table->dropColumn('video_type');
            $table->dropColumn('phone');
            $table->dropColumn('other_link');
        });

        Schema::table('recruit_jobs', function (Blueprint $table) {
            $table->dropColumn('pay_type');
            $table->dropColumn('start_amount');
            $table->dropColumn('end_amount');
            $table->dropColumn('pay_according');
        });

        Schema::dropIfExists('recruit_footer_links');

        Schema::dropIfExists('recruit_candidate_database');

        Schema::dropIfExists('recruit_application_files');

        Schema::dropIfExists('recruit_interview_comments');

        Schema::dropIfExists('recruit_interview_employees');

        Schema::dropIfExists('recruit_interview_schedules');

        Schema::dropIfExists('recruiters');

        Schema::dropIfExists('recruit_jobboard_settings');

        Schema::dropIfExists('recruit_application_skills');

        Schema::dropIfExists('recruit_applicant_notes');

        Schema::dropIfExists('recruit_job_applications');

        Schema::dropIfExists('recruit_application_status');

        Schema::dropIfExists('recruit_application_status_categories');

        Schema::dropIfExists('recruit_job_skills');

        Schema::dropIfExists('recruit_interview_stages');

        $recruitModule = \App\Models\Module::where(['module_name' => 'recruit'])->first();
        Permission::where('module_id', $recruitModule->id)->delete();

        Schema::dropIfExists('recruit_jobs');

        Schema::dropIfExists('recruit_skills');
    }

};
