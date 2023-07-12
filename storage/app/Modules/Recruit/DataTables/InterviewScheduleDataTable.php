<?php

namespace Modules\Recruit\DataTables;

use Illuminate\Support\Carbon;
use App\DataTables\BaseDataTable;
use Modules\Recruit\Entities\RecruitInterviewEmployees;
use Modules\Recruit\Entities\RecruitInterviewSchedule;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Button;

class InterviewScheduleDataTable extends BaseDataTable
{
    private $editInterviewSchedulePermission;
    private $deleteInterviewSchedulePermission;
    private $viewInterviewSchedulePermission;
    private $reschedulePermission;

    public function __construct()
    {
        parent::__construct();
        $this->editInterviewSchedulePermission = user()->permission('edit_interview_schedule');
        $this->deleteInterviewSchedulePermission = user()->permission('delete_interview_schedule');
        $this->viewInterviewSchedulePermission = user()->permission('view_interview_schedule');
        $this->reschedulePermission = user()->permission('reschedule_interview');
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('check', function ($row) {
                return '<input type="checkbox" class="select-table-row" id="datatable-row-' . $row->id . '"  name="datatable_ids[]" value="' . $row->id . '" onclick="dataTableRowCheck(' . $row->id . ')">';
            })
            ->editColumn('full_name', function ($row) {
                return '<div class="media align-items-center">
            <div class="media-body">
            <h5 class="mb-0 f-13 text-darkest-grey"><a href="' . route('interview-schedule.show', [$row->id]) . '">' . ucfirst($row->full_name) . '</a></h5>
            </div>
            </div>';
            })
            ->editColumn('schedule_date', function ($row) {
                return Carbon::parse($row->schedule_date)->format('d F, Y H:i a');
            })

            ->editColumn('stage', function ($row) {
                return ucfirst($row->name);
            })
            ->editColumn('status', function ($row) {
                if (
                    $this->editInterviewSchedulePermission != 'none'
                    && (
                        $this->editInterviewSchedulePermission == 'all'
                        || ($this->editInterviewSchedulePermission == 'added' && $row->added_by == user()->id)
                        || ($this->editInterviewSchedulePermission == 'owned' && $row->user_id == user()->id)
                        || ($this->editInterviewSchedulePermission == 'both' && ($row->user_id == user()->id || $row->added_by == user()->id))
                    )
                    ) {
                    $status = '<select class="form-control select-picker change-interview-status" data-interview-id="' . $row->id . '">';
                    $status .= '<option ';

                    if ($row->status == 'pending') {
                        $status .= 'selected';
                    }

                    $status .= ' value="pending" data-content="<i class=\'fa fa-circle mr-2 text-yellow\'></i> ' .  __('app.pending') . '">' . __('app.pending')  . '</option>';
                    $status .= '<option ';

                    if ($row->status == 'hired') {
                        $status .= 'selected';
                    }

                    $status .= ' value="hired" data-content="<i class=\'fa fa-circle mr-2 text-light-green\'></i> ' .  __('recruit::app.interviewSchedule.hired') . '"' . __('recruit::app.interviewSchedule.hired')  . '</option>';
                    $status .= '<option ';

                    if ($row->status == 'completed') {
                        $status .= 'selected';
                    }

                    $status .= ' value="completed" data-content="<i class=\'fa fa-circle mr-2 text-blue\'></i> ' .  __('app.completed') . '"' . __('app.completed')  . '</option>';
                    $status .= '<option ';

                    if ($row->status == 'canceled') {
                        $status .= 'selected';
                    }

                    $status .= ' value="canceled" data-content="<i class=\'fa fa-circle mr-2 text-red\'></i> ' .  __('app.canceled') . '">' . __('app.canceled')  . '</option>';

                    $status .= '<option ';

                    if ($row->status == 'rejected') {
                        $status .= 'selected';
                    }

                    $status .= ' value="rejected" data-content="<i class=\'fa fa-circle mr-2 text-black\'></i> ' .  __('app.rejected') . '">' . __('app.rejected')  . '</option>';

                    $status .= '</select>';
                }
                else {
                    if ($row->status == 'pending') {
                        $class = 'text-yellow';
                        $status = __('app.pending');
                    }
                    elseif ($row->status == 'hired') {
                        $class = 'text-light-green';
                        $status = __('recruit::app.interviewSchedule.hired');
                    }
                    elseif ($row->status == 'canceled') {
                        $class = 'text-red';
                        $status = __('app.canceled');
                    }
                    elseif ($row->status == 'completed') {
                        $class = 'text-purple';
                        $status = __('app.completed');
                    }
                    else {
                        $class = 'text-black';
                        $status = __('app.rejected');
                    }

                    $status = '<i class="fa fa-circle mr-1 ' . $class . ' f-10"></i> ' . $status;
                }

                return $status;
            })
            ->addColumn('status_export', function ($row) {
                return ucfirst($row->status);
            })
            ->addColumn('name', function ($row) {
                return ucfirst($row->full_name);
            })
            ->addColumn('action', function ($row) {
                $action = '<div class="task_view">

                <div class="dropdown">
                    <a class="task_view_more d-flex align-items-center justify-content-center dropdown-toggle" type="link"
                        id="dropdownMenuLink-' . $row->id . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-options-vertical icons"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-' . $row->id . '" tabindex="0">';

                $emp = RecruitInterviewEmployees::where('interview_schedule_id', $row->id)->pluck('user_id')->toArray();

                if ($this->viewInterviewSchedulePermission == 'all' ||
                ($this->viewInterviewSchedulePermission == 'added' && $row->added_by == user()->id) ||
                ($this->viewInterviewSchedulePermission == 'owned' && in_array(user()->id, $emp)) ||
                ($this->viewInterviewSchedulePermission == 'both' && (in_array(user()->id, $emp) ||
                $row->added_by == user()->id))) {
                    $action .= '<a href="' . route('interview-schedule.show', [$row->id]) . '" class="dropdown-item"><i class="fa fa-eye mr-2"></i>' . __('app.view') . '</a>';
                }

                if ($this->editInterviewSchedulePermission == 'all' ||
                    ($this->editInterviewSchedulePermission == 'added' && $row->added_by == user()->id) ||
                    ($this->editInterviewSchedulePermission == 'owned' && in_array(user()->id, $emp)) ||
                    ($this->editInterviewSchedulePermission == 'both' && (in_array(user()->id, $emp) ||
                    $row->added_by == user()->id))) {
                    $action .= '<a class="dropdown-item openRightModal" href="' . route('interview-schedule.edit', [$row->id]) . '">
                                    <i class="fa fa-edit mr-2"></i>
                                    ' . trans('app.edit') . '
                                </a>';
                }

                if (in_array(user()->id, $emp) && $row->user_accept_status == 'waiting' && $row->status == 'pending') {
                    $action .= '<a class="dropdown-item employeeResponse" data-response-id=' . $row->emp_id . '
                            data-response-action="accept" href="javascript:;">
                            <i class="fa fa-check mr-2"></i>
                            ' . __('app.approve') . '
                    </a>';
                    $action .= '<a data-response-id=' . $row->emp_id . '
                            data-response-action="refuse" class="dropdown-item employeeResponse" href="javascript:;">
                            <i class="fa fa-times mr-2"></i>
                            ' . __('app.reject') . '
                    </a>';
                }

                if ($this->reschedulePermission == 'all' ||
                ($this->reschedulePermission == 'added' && $row->added_by == user()->id) ||
                ($this->reschedulePermission == 'owned' && in_array(user()->id, $emp)) ||
                ($this->reschedulePermission == 'both' && (in_array(user()->id, $emp) ||
                $row->added_by == user()->id))) {
                    if ($row->status == 'pending') {
                        $action .= '<a class="dropdown-item reschedule-interview" href="javascript:;" data-user-id="' . $row->id . '"><i class="fa fa-recycle mr-2"></i>' . trans('recruit::modules.interviewSchedule.reSchedule') . '</a>';
                    }
                }
                
                if ($this->deleteInterviewSchedulePermission == 'all' ||
                    ($this->deleteInterviewSchedulePermission == 'added' && $row->added_by == user()->id) ||
                    ($this->deleteInterviewSchedulePermission == 'owned' && in_array(user()->id, $emp)) ||
                    ($this->deleteInterviewSchedulePermission == 'both' && (in_array(user()->id, $emp) ||
                    $row->added_by == user()->id))) {
                    $action .= '<a class="dropdown-item delete-table-row" href="javascript:;" data-user-id="' . $row->id . '">
                                <i class="fa fa-trash mr-2"></i>
                                ' . trans('app.delete') . '
                            </a>';
                }

                $action .= '</div>
                </div>
            </div>';

                return $action;
            })

            ->addIndexColumn()
            ->setRowId(function ($row) {
                return 'row-' . $row->id;
            })
            ->rawColumns(['action', 'full_name', 'schedule_date', 'stage', 'status', 'check']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(RecruitInterviewSchedule $model)
    {
        $request = $this->request();
        $startDate = null;
        $endDate = null;

        if ($request->startDate !== null && $request->startDate != 'null' && $request->startDate != '') {
            $startDate = Carbon::createFromFormat($this->global->date_format, $request->startDate)->toDateString();
        }

        if ($request->endDate !== null && $request->endDate != 'null' && $request->endDate != '') {
            $endDate = Carbon::createFromFormat($this->global->date_format, $request->endDate)->toDateString();
        }

        $model = $model->select('recruit_interview_schedules.id', 'recruit_interview_schedules.interview_type', 'recruit_interview_schedules.stage_id', 'recruit_interview_employees.user_id as employee_id', 'recruit_interview_employees.user_accept_status', 'recruit_interview_employees.id as emp_id', 'recruit_job_applications.full_name', 'recruit_interview_schedules.status', 'recruit_interview_schedules.schedule_date', 'recruit_interview_stages.name')
            ->leftjoin('recruit_job_applications', 'recruit_job_applications.id', 'recruit_interview_schedules.job_application_id')
            ->leftjoin('recruit_interview_stages', 'recruit_interview_stages.id', 'recruit_interview_schedules.stage_id')
            ->leftjoin('recruit_interview_employees', 'recruit_interview_employees.interview_schedule_id', 'recruit_interview_schedules.id');
        
        if ($this->request()->searchText != '') {
            $model = $model->where(function ($query) {
                $query->where('recruit_job_applications.full_name', 'like', '%' . request('searchText') . '%');
            });
        }

        if ($this->viewInterviewSchedulePermission == 'added') {
            $model->where(function ($query) {
                return $query->where('recruit_interview_schedules.added_by', user()->id);
            });
        }

        if ($this->viewInterviewSchedulePermission == 'owned') {
            $model->where(function ($query) {
                return $query->where('recruit_interview_employees.user_id', user()->id);
            });
        }

        if ($this->viewInterviewSchedulePermission == 'both') {
            $model->where(function ($query) {
                $query->orWhere('recruit_interview_schedules.added_by', '=', user()->id);
                ;
                $query->orWhere('recruit_interview_employees.user_id', '=', user()->id);
                ;
            });
        }

        if (request()->has('status') && $request->status != 'all') {
            if ($request->status == 'not finished') {
                $model->where('status', '<>', 'hired');
            }
            else {
                $model->where('status', $request->status);
            }
        }

        if ($request->startDate != null && $request->startDate != '') {
            $model = $model->whereDate('recruit_interview_schedules.schedule_date', '>=', $startDate);
        }

        if ($request->endDate != null && $request->endDate != '') {
            $model = $model->whereDate('recruit_interview_schedules.schedule_date', '<=', $endDate);
        }

        if ($request->has('job_id') && $request->job_id != null && $request->job_id != '') {
            $model = $model->where('recruit_job_applications.job_id', '=', $request->job_id);
        }

        $model->groupBy('recruit_interview_employees.interview_schedule_id');

        return $model;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('interview-schedule-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom($this->domHtml)
            ->destroy(true)
            ->orderBy(1)
            ->responsive(true)
            ->serverSide(true)
            ->stateSave(false)
            ->processing(true)
            ->language(__('app.datatable'))
            ->parameters([
                'initComplete' => 'function () {
                    window.LaravelDataTables["interview-schedule-table"].buttons().container()
                     .appendTo( "#table-actions")
                 }',
                'fnDrawCallback' => 'function( oSettings ) {
                   //
                   $(".select-picker").selectpicker();
                 }'
            ])
            ->buttons(Button::make(['extend' => 'excel', 'text' => '<i class="fa fa-file-export"></i> ' . trans('app.exportExcel')]));
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'check' => [
                'title' => '<input type="checkbox" name="select_all_table" id="select-all-table" onclick="selectAllTable(this)">',
                'exportable' => false,
                'orderable' => false,
                'searchable' => false
            ],
            '#' => ['data' => 'DT_RowIndex', 'orderable' => false, 'searchable' => false, 'visible' => false],
            __('recruit::modules.interviewSchedule.candidate') => ['data' => 'full_name', 'exportable' => false, 'name' => 'full_name'],
            __('recruit::modules.interviewSchedule.candidateName') => ['data' => 'name', 'visible' => false, 'name' => 'name'],
            __('recruit::modules.interviewSchedule.scheduleDateTime') => ['data' => 'schedule_date', 'name' => 'schedule_date'],
            __('recruit::modules.interviewSchedule.stageAndStatus') => ['data' => 'stage','exportable' => true, 'name' => 'stage'],
            __('recruit::modules.interviewSchedule.status') => ['data' => 'status','exportable' => false, 'name' => 'status'],
            __('recruit::modules.interviewSchedule.interviewStatus') => ['data' => 'status_export', 'visible' => false,'name' => 'status_export'],
            Column::computed('action', __('app.action'))
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
                ->width(200)
                ->addClass('text-right pr-20')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Interview_Schedule' . date('YmdHis');
    }

    public function pdf()
    {
        set_time_limit(0);

        if ('snappy' == config('datatables-buttons.pdf_generator', 'snappy')) {
            return $this->snappyPdf();
        }

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('datatables::print', ['data' => $this->getDataForPrint()]);

        return $pdf->download($this->getFilename() . '.pdf');
    }

}
