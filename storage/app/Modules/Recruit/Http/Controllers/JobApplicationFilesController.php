<?php

namespace Modules\Recruit\Http\Controllers;

use App\Helper\Files;
use App\Helper\Reply;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\AccountBaseController;
use Modules\Recruit\Entities\RecruitApplicationFile;
use Modules\Recruit\Entities\RecruitInterviewSchedule;
use Modules\Recruit\Entities\RecruitJobApplication;

class JobApplicationFilesController extends AccountBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = __('recruit::app.menu.jobApplication');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */

    public function store(Request $request)
    {
        $addPermission = user()->permission('add_job_application');
        abort_403(!in_array($addPermission, ['all', 'added']));

        if ($request->hasFile('file')) {
            foreach ($request->file as $fileData) {
                $file = new RecruitApplicationFile();
                $file->application_id = $request->applicationID;

                $filename = Files::uploadLocalOrS3($fileData, 'application-files/' . $request->applicationID);

                $file->filename = $fileData->getClientOriginalName();
                $file->hashname = $filename;
                $file->size = $fileData->getSize();
                $file->save();
            }

            $this->files = RecruitApplicationFile::where('application_id', $request->applicationID)->orderBy('id', 'desc');

            $this->files = $this->files->where('added_by', user()->id);

            $this->files = $this->files->get();
            $view = view('tasks.files.show', $this->data)->render();

            return Reply::dataOnly(['status' => 'success', 'view' => $view]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */

    public function destroy($id)
    {
        $file = RecruitApplicationFile::findOrFail($id);
        $this->deletePermission = user()->permission('delete_interview_schedule');
        abort_403(!($this->deletePermission == 'all' || ($this->deletePermission == 'added' && $file->added_by == user()->id)));

        Files::deleteFile($file->hashname, 'application-files/');

        RecruitApplicationFile::destroy($id);

        $this->files = RecruitApplicationFile::where('application_id', $file->application_id)->orderBy('id', 'desc')->get();
        $view = view('tasks.files.show', $this->data)->render();

        return Reply::successWithData(__('messages.fileDeleted'), ['view' => $view]);
    }

    /**
    * @param int $id
    * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|\Symfony\Component\HttpFoundation\StreamedResponse
    */

    public function download($id)
    {
        $file = RecruitApplicationFile::whereRaw('md5(id) = ?', $id)->firstOrFail();
        return download_local_s3($file, 'application-files/' . $file->application_id . '/' . $file->hashname);
    }
    
}
