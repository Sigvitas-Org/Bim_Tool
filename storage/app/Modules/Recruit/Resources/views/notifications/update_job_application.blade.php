@php
$notificationUser = App\Models\User::where('id', $notification->data['user_id'])
->orderBy('id', 'desc')
->first();
@endphp
<x-cards.notification :notification="$notification" :link="route('job-applications.show', $notification->data['jobApp_id'])" :image="$notificationUser && $notificationUser ? $notificationUser->image_url : ''" :title="__('recruit::modules.updateJobApplication.subject')" :text="$notification->data['heading']" :time="$notification->created_at" />
