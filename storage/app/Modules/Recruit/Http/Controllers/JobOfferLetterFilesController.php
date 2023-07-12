<?php

namespace Modules\Recruit\Http\Controllers;

use App\Helper\Files;
use App\Helper\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\AccountBaseController;
use Modules\Recruit\Entities\RecruitJobOfferLetterFiles;

class JobOfferLetterFilesController extends AccountBaseController
{

    /**
     * @param Request $request
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $addPermission = user()->permission('add_offer_letter');
        abort_403(!in_array($addPermission, ['all', 'added']));

        if ($request->file) {
            foreach ($request->file as $fileData) {
                $file = new RecruitJobOfferLetterFiles();
                $file->job_offer_id = $request->applicationID;
                $filename = Files::uploadLocalOrS3($fileData, 'application-files/' . $request->applicationID);

                $file->filename = $fileData->getClientOriginalName();
                $file->hashname = $filename;

                $file->save();
            }

            $this->files = RecruitJobOfferLetterFiles::where('job_offer_id', $request->applicationID)->orderBy('id', 'desc')->get();
            $view = view('projects.files.show', $this->data)->render();

            return Reply::dataOnly(['status' => 'success', 'view' => $view]);
        }
    }

    public function destroy(Request $request, $id)
    {
        $file = RecruitJobOfferLetterFiles::findOrFail($id);

        Files::deleteFile($file->hashname, 'application-files/');

        RecruitJobOfferLetterFiles::destroy($id);

        return Reply::success(__('messages.fileDeleted'));
    }

    public function download($id)
    {
        $file = RecruitJobOfferLetterFiles::whereRaw('md5(id) = ?', $id)->firstOrFail();
        return download_local_s3($file, 'application-files/' . $file->job_offer_id . '/' . $file->hashname);
    }
    
}
