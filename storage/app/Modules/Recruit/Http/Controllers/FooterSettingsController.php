<?php

namespace Modules\Recruit\Http\Controllers;

use App\Helper\Reply;
use App\Http\Controllers\AccountBaseController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Recruit\Entities\RecruitFooterLink;
use Modules\Recruit\Http\Requests\FooterLinks\StoreFooterLinks;

class FooterSettingsController extends AccountBaseController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index()
    {
        return view('recruit::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $addPermission = user()->permission('add_footer_link');
        abort_403(!in_array($addPermission, ['all']));

        return view('recruit::recruit-setting.footer.create-footer-modal');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreFooterLinks $request)
    {
        $addPermission = user()->permission('add_footer_link');
        abort_403(!in_array($addPermission, ['all']));

        $link = new RecruitFooterLink();
        $link->title = $request->title;
        $link->slug = $request->slug;
        $link->description = $request->description;
        $link->status = $request->status;
        $link->save();

        return Reply::success(__('recruit::messages.footerLinkAdded'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $editPermission = user()->permission('edit_footer_link');
        abort_403(!in_array($editPermission, ['all']));

        $this->footerLink = RecruitFooterLink::findOrfail($id);
        return view('recruit::recruit-setting.footer.edit-footer-modal', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $editPermission = user()->permission('edit_footer_link');
        abort_403(!in_array($editPermission, ['all']));

        $link = RecruitFooterLink::findOrFail($id);
        $link->title = $request->title;
        $link->slug = $request->slug;
        $link->description = $request->description;
        $link->status = $request->status;
        $link->save();
        return Reply::success(__('recruit::messages.linkUpdate'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $deletePermission = user()->permission('delete_footer_link');
        abort_403(!in_array($deletePermission, ['all']));

        RecruitFooterLink::destroy($id);
        return Reply::success(__('recruit::messages.linkDeleted'));
    }

    public function changeStatus(Request $request, $id)
    {
        $editPermission = user()->permission('edit_footer_link');
        abort_403(!in_array($editPermission, ['all']));

        $link = RecruitFooterLink::findOrFail($id);
        $link->status = lcFirst($request->status);
        $link->update();

        return Reply::success(__('recruit::messages.linkUpdate'));
    }
    
}
