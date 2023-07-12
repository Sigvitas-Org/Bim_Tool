<?php

namespace Modules\Recruit\Http\Controllers;

use App\Helper\Reply;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use App\Http\Controllers\AccountBaseController;
use Modules\Recruit\Entities\RecruitFooterLink;
use Modules\Recruit\DataTables\FooterLinksDataTable;
use Modules\Recruit\Http\Requests\FooterLinks\StoreFooterLinks;
use Modules\Recruit\Http\Requests\FooterLinks\UpdateFooterLinks;

class FooterLinksController extends AccountBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = __('recruit::app.menu.footerlinks');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $addPermission = user()->permission('add_footer_link');
        abort_403(!in_array($addPermission, ['all']));

        $this->pageTitle = __('recruit::modules.footerlinks.addfooterlinks');

        if (request()->ajax()) {
            $html = view('recruit::footer-links.ajax.create')->render();
            return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle]);
        }

        $this->view = 'recruit::footer-links.ajax.create';
        return view('recruit::footer-links.create', $this->data);
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

        return Reply::successWithData(__('recruit::messages.linkadded'), ['redirectUrl' => route('footer-links.index')]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $viewPermission = user()->permission('view_footer_link');
        abort_403(!in_array($viewPermission, ['all']));

        $this->pageTitle = __('recruit::modules.footerlinks.footerdetail');
        $this->links = RecruitFooterLink::find($id);
        $this->statusSymbol = ($this->links->status == 'active') ? 'green' : 'red';

        if (request()->ajax()) {
            $html = view('recruit::footer-links.ajax.show', $this->data)->render();
            return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle]);
        }

        $this->view = 'recruit::footer-links.ajax.show';
        return view('recruit::footer-links.create', $this->data);
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

        $this->pageTitle = __('recruit::modules.job.editJob');
        $this->job = RecruitFooterLink::find($id);

        if (request()->ajax()) {
            $html = view('recruit::footer-links.ajax.edit', $this->data)->render();
            return Reply::dataOnly(['status' => 'success', 'html' => $html, 'title' => $this->pageTitle]);
        }

        $this->view = 'recruit::footer-links.ajax.edit';

        return view('recruit::footer-links.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateFooterLinks $request, $id)
    {
        $editPermission = user()->permission('edit_footer_link');
        abort_403(!in_array($editPermission, ['all']));

        $link = RecruitFooterLink::findOrFail($id);

        $link->title = $request->title;
        $link->slug = $request->slug;
        $link->description = $request->description;
        $link->status = $request->status;
        $link->save();

        return Reply::successWithData(__('recruit::messages.linkUpdate'), ['redirectUrl' => route('footer-links.index')]);
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
        return Reply::successWithData(__('recruit::messages.linkDeleted'), ['redirectUrl' => route('footer-links.index')]);
    }

    public function applyQuickAction(Request $request)
    {
        switch ($request->action_type) {
        case 'delete':
            $this->deleteRecords($request);
            return Reply::success(__('messages.deleteSuccess'));
        case 'change-status':
            $this->changeStatus($request);
            return Reply::success(__('messages.statusUpdatedSuccessfully'));
        default:
            return Reply::error(__('messages.selectAction'));
        }
    }

    protected function deleteRecords($request)
    {
        $deletePermission = user()->permission('delete_footer_link');
        abort_403(!in_array($deletePermission, ['all']));

        RecruitFooterLink::whereIn('id', explode(',', $request->row_ids))->delete();
        return true;
    }

    protected function changeStatus($request)
    {
        $editPermission = user()->permission('edit_footer_link');
        abort_403(!in_array($editPermission, ['all']));

        RecruitFooterLink::whereIn('id', explode(',', $request->row_ids))->update(['status' => $request->status]);
        return true;
    }
    
}
