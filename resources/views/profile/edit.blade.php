<title>Profile</title>
<main role="main">
    <div class="flex" style="width: 990px;">
@include('layouts.sidebar')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-[#15202b] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#15202b] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-white">
                            {{ __('Profile Picture') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-white">
                            {{ __("Update your account's profile picture.") }}
                        </p>
                    </header>
                    <div class="flex flex-col items-center justify-center">
                        <form method="POST" action="{{ route('image.upload') }}" enctype="multipart/form-data">
                          @csrf
                          <div class="flex flex-col items-center justify-center w-full">
                            <label for="profile_pic" class="mt-4 mb-2 text-xl font-medium text-gray-700">Select a file to upload:</label>
                            <input type="file" name="profile_pic" id="profile_pic" class="px-4 py-2 text-lg text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            @error('profile_pic')
                              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                          </div>
                          <div class="flex items-center justify-end mt-6">
                            <x-primary-button type="submit" >{{ __('Save') }}</x-primary-button>
                        </div>
                        </form>
                      </div>
                      
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#15202b] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-white">
                            {{ __('Background Picture') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-white">
                            {{ __("Update your account's background picture.") }}
                        </p>
                    </header>
                    <div class="flex flex-col items-center justify-center">
                        <form method="POST" action="{{ route('bg.upload') }}" enctype="multipart/form-data">
                          @csrf
                          <div class="flex flex-col items-center justify-center w-full">
                            <label for="bg_profile" class="mt-4 mb-2 text-xl font-medium text-gray-700">Select a file to upload:</label>
                            <input type="file" name="bg_profile" id="bg_profile" class="px-4 py-2 text-lg text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            @error('bg_profile')
                              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                          </div>
                          <div class="flex items-center justify-end mt-6">
                            <x-primary-button type="submit" >{{ __('Save') }}</x-primary-button>
                        </div>
                        </form>
                      </div>
                      
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#15202b] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#15202b] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    </div>
</main>
