<?php

namespace Database\Seeders;

use App\Models\LeadStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($companyId)
    {

        $pendingStatus = LeadStatus::where('company_id', $companyId)
            ->where('type', 'pending')
            ->first();

        $lead = new \App\Models\Lead();
        $lead->company_id = $companyId;
        $lead->company_name = 'Test Lead';
        $lead->website = 'www.testing.com';
        $lead->address = 'www.testing.com';
        $lead->client_name = 'Test client';
        $lead->client_email = 'testing@test.com';
        $lead->mobile = '123456789';
        $lead->status_id = $pendingStatus->id;
        $lead->note = 'Quas consectetur, tempor incidunt, aliquid voluptatem, velit mollit et illum, adipisicing ea officia aliquam placeat';
        $lead->save();

    }

}
