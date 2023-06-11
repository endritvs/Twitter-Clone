<title>Profile</title>
<main role="main">
    <div class="flex" style="width: 990px;">
        @include('layouts.sidebar')
        <section class="w-3/5 border border-y-0 border-gray-800" style="max-width:600px;">
            <div>
                <div class="flex justify-start">
                    <div class="px-4 py-2 mx-2">
                        <a href=""
                            class=" text-2xl font-medium rounded-full text-blue-400 hover:bg-gray-800 hover:text-blue-300 float-right">
                            <svg class="m-2 h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <g>
                                    <path
                                        d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                                    </path>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="mt-3">
                        <h2 class="mb-0 text-xl font-bold text-white capitalize">{{ Auth::user()->name }}</h2>
                    </div>
                </div>

                <hr class="border-gray-800">
            </div>

            <!-- User card-->
            <div>
                <div class="w-full bg-cover bg-no-repeat bg-center bg-gray-500" style="height: 200px;">
                    @if (Auth::user()->bg_profile != 'def-bg.jpg')
                        <img class="w-full h-full" src="{{ Storage::url(Auth::user()->bg_profile) }}" alt="">
                    @else
                        <img class="opacity-0 w-full h-full" style="background-color:gray;" src="#"
                            alt="">
                    @endif
                </div>
                <div class="p-4">
                    <div class="relative flex w-full">
                        <!-- Avatar -->
                        <div class="flex flex-1">
                            <div style="margin-top: -6rem;">
                                <div style="height:9rem; width:9rem;" class="md rounded-full relative avatar">
                                    @if (Auth::user()->profile_pic != 'default-profile.jpg')
                                        <img class="rounded-full w-full h-full"
                                            src="{{ Storage::url(Auth::user()->profile_pic) }}" alt="">
                                    @else
                                        <img style="height:9rem; width:9rem;"
                                            class="md rounded-full relative border-4 border-gray-900"
                                            src="{{ asset('images/default-profile.jpg') }}" alt="">
                                    @endif
                                    <div class="absolute"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Follow Button -->
                        <div class="flex flex-col text-right">
                            <a href="{{ route('profile.edit') }}">
                                <button
                                    class="flex justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  rounded max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 hover:border-blue-800 flex items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                                    Edit Profile
                                </button>
                            </a>
                        </div>
                    </div>

                    <!-- Profile info -->
                    <div class="space-y-1 justify-center w-full mt-3 ml-3">
                        <!-- User basic-->
                        <div>
                            <h2 class="text-xl leading-6 font-bold text-white capitalize">{{ Auth::user()->name }}</h2>
                            <p class="text-sm leading-5 font-medium text-gray-600 lowercase">
                                {{  Auth::user()->email }}</p>
                        </div>
                        <!-- Description and others -->
                        <div class="mt-3">
                            <p class="text-white leading-tight mb-2">
                                {{ Auth::user()->description }}
                            </p>
                            <div class="text-gray-600 flex">
                                <span class="flex mr-2"><svg viewBox="0 0 24 24" class="h-5 w-5 paint-icon">
                                        <g>
                                            <path
                                                d="M11.96 14.945c-.067 0-.136-.01-.203-.027-1.13-.318-2.097-.986-2.795-1.932-.832-1.125-1.176-2.508-.968-3.893s.942-2.605 2.068-3.438l3.53-2.608c2.322-1.716 5.61-1.224 7.33 1.1.83 1.127 1.175 2.51.967 3.895s-.943 2.605-2.07 3.438l-1.48 1.094c-.333.246-.804.175-1.05-.158-.246-.334-.176-.804.158-1.05l1.48-1.095c.803-.592 1.327-1.463 1.476-2.45.148-.988-.098-1.975-.69-2.778-1.225-1.656-3.572-2.01-5.23-.784l-3.53 2.608c-.802.593-1.326 1.464-1.475 2.45-.15.99.097 1.975.69 2.778.498.675 1.187 1.15 1.992 1.377.4.114.633.528.52.928-.092.33-.394.547-.722.547z">
                                            </path>
                                            <path
                                                d="M7.27 22.054c-1.61 0-3.197-.735-4.225-2.125-.832-1.127-1.176-2.51-.968-3.894s.943-2.605 2.07-3.438l1.478-1.094c.334-.245.805-.175 1.05.158s.177.804-.157 1.05l-1.48 1.095c-.803.593-1.326 1.464-1.475 2.45-.148.99.097 1.975.69 2.778 1.225 1.657 3.57 2.01 5.23.785l3.528-2.608c1.658-1.225 2.01-3.57.785-5.23-.498-.674-1.187-1.15-1.992-1.376-.4-.113-.633-.527-.52-.927.112-.4.528-.63.926-.522 1.13.318 2.096.986 2.794 1.932 1.717 2.324 1.224 5.612-1.1 7.33l-3.53 2.608c-.933.693-2.023 1.026-3.105 1.026z">
                                            </path>
                                        </g>
                                    </svg> <a href="#" target="#"
                                        class="leading-5 ml-1 text-blue-400">www.fdsfdsfroDEV.com</a></span>
                                <span class="flex mr-2"><svg viewBox="0 0 24 24" class="h-5 w-5 paint-icon">
                                        <g>
                                            <path
                                                d="M19.708 2H4.292C3.028 2 2 3.028 2 4.292v15.416C2 20.972 3.028 22 4.292 22h15.416C20.972 22 22 20.972 22 19.708V4.292C22 3.028 20.972 2 19.708 2zm.792 17.708c0 .437-.355.792-.792.792H4.292c-.437 0-.792-.355-.792-.792V6.418c0-.437.354-.79.79-.792h15.42c.436 0 .79.355.79.79V19.71z">
                                            </path>
                                            <circle cx="7.032" cy="8.75" r="1.285"></circle>
                                            <circle cx="7.032" cy="13.156" r="1.285"></circle>
                                            <circle cx="16.968" cy="8.75" r="1.285"></circle>
                                            <circle cx="16.968" cy="13.156" r="1.285"></circle>
                                            <circle cx="12" cy="8.75" r="1.285"></circle>
                                            <circle cx="12" cy="13.156" r="1.285"></circle>
                                            <circle cx="7.032" cy="17.486" r="1.285"></circle>
                                            <circle cx="12" cy="17.486" r="1.285"></circle>
                                        </g>
                                    </svg> <span class="leading-5 ml-1">Joined
                                        {{ date_format(Auth::user()->created_at, 'F, Y') }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="border-gray-800">
            </div>

            <div id="posts-container">
                <ul id="posts" class="posts">
                    <div class="rounded-lg bg-[#192734] overflow-hidden shadow-lg m-4">
                        @foreach ($followers as $follower)
                            <div class="flex flex-shrink-0">
                                <div class="flex-1 ">
                                    <div class="flex items-center w-48">
                                        <div>
                                            <img class="inline-block h-10 w-10 rounded-full ml-4 mt-4"
                                                src="{{$follower->follower->profile_pic === 'default-profile.jpg' ?  asset('images/default-profile.jpg') : (Storage::url($follower->follower->profile_pic))}}"
                                                alt="" />
                                        </div>
                                        <div class="ml-5 mt-3 w-full">
                                            <p class="text-base leading-6 ml-2 mt-2 capitalize font-medium text-white">
                                                {{ $follower->follower->name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 px-4 py-2 m-2">
                                    <a href="" class=" float-right">
                                        <button
                                            class="bg-transparent hover:bg-blue-500 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded-full follow-button"
                                            data-user-id="{{ $follower->follower->id }}">
                                            Follow
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <hr class="border-gray-600">
                        @endforeach
                        <div class="p-5 text-white">
                            {{$followers->links()}}
                        </div>
                    </div>
                </ul>
            </div>
            <div id="load-more-container" class="text-center p-4"></div>

        </section>
    </div>
</main>