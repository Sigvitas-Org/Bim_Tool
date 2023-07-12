@php
$notificationUser = App\Models\User::where('id', $notification->data['user_id'])
->orderBy('id', 'desc')
->first();
@endphp
<x-cards.notification :notification="$notification" :link="route('jobs.show', $notification->data['job_id'])" :image="$notification->data['user_image'] ? $notification->data['user_image'] : asset('img/avatar.png')" :title="__('recruit::modules.adminMail.newJobSubject')" :text="$notification->data['heading']" :time="$notification->created_at" />
