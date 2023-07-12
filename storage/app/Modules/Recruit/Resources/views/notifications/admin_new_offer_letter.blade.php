@php
$notificationUser = App\Models\User::where('id', $notification->data['user_id'])
->orderBy('id', 'desc')
->first();
@endphp
<x-cards.notification :notification="$notification" :link="route('job-offer-letter.show', $notification->data['offer_id'])" :image="$notificationUser && $notificationUser ? $notificationUser->image_url : asset('img/avatar.png')" :title="__('recruit::modules.offerLetter.subject')" :text="$notification->data['heading']" :time="$notification->created_at" />
