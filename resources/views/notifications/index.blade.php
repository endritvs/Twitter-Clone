<title>Home</title>
<div class="bg-[#192734]">
    <div class="flex">
        @include('layouts.sidebar')
        <div class="w-4/5 border border-gray-600 h-auto border-t-0 p-5">
             <h1 class="capitalize text-center text-white font-bold mt-5">Notification {{Auth::user()->name}}</h1>   
             @if ($notifications->total()>0)                    
             <div class="w-full border-gray-600 rounded-lg border shadow p-1 mt-10">
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-500">
                        @foreach ($notifications as $notification)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4 px-5">
                                    <div class="flex-shrink-0">
                                        @if ($notification->fromUser->profile_pic != 'default-profile.jpg')
                                        <img class="w-8 h-8 rounded-full" src="{{Storage::url($notification->fromUser->profile_pic)}}" alt="Neil image">
                                        @else
                                        <img class="w-8 h-8 rounded-full" src="{{ asset('images/default-profile.jpg') }}" alt="Neil image">
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-white truncate">
                                            {{$notification->fromUser->name}}
                                        </p>
                                        <p class="text-sm text-gray-300 truncate">
                                            {{$notification->notification_message}}<span class="text-[11px] ml-2 text-gray-400">{{Carbon\Carbon::parse($notification->created_at)->format('d-M - H:i')}}</span>
                                        </p>
                                    </div>
                                    <div class="flex">
                                        <div>
                                            @if ($notification->notification_type=='Follow')
                                            <img src="{{asset('images/follow.png')}}" alt="" width="60" height="60" class="bg-white rounded-full">
                                            @else
                                            <img src="{{asset('images/like.png')}}" alt="" width="60" height="60" class="bg-white rounded-full">
                                            @endif
                                        </div>
                                        <div class="inline-flex bg-blue-500 items-center rounded-full w-2 h-2 text-gray-900">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="border-t-[1px] border-gray-500 py-2 text-white">
                    {{$notifications->links()}}
                </div>
            </div>
            @else
            <div class="w-full border-gray-600 rounded-lg border shadow p-1 mt-10">
            <p class="text-center text-white">No notifications for you!</p> 
            </div>
            @endif
        </div>
    </div>
</div>