@php
$notificationUser = App\Models\User::where('id', $notification->data['user_id'])
->orderBy('id', 'desc')
->first();
@endphp
<x-cards.notification :notification="$notification" :link="route('interview-schedule.show', $notification->data['interview_id'])" :image="$notificationUser && $notificationUser ? $notificationUser->image_url : ''" :title="__('recruit::modules.adminMail.rescheduleSubject')" :text="$notification->data['heading']" :time="$notification->created_at" />
