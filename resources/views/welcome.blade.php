@section('title', 'Welcome to AV - Live Games Platform')
@section('meta_description', 'Join AV for the best live games experience. Play, connect, and enjoy entertainment like never before!')
@section('meta_keywords', 'live games, AV, entertainment, play online, dashboard')
@section('og_title', 'Welcome to AV - Live Games Platform')
@section('og_description', 'Join AV for the best live games experience. Play, connect, and enjoy entertainment like never before!')
@section('og_image', asset('images/themes/og-default.jpg'))
@section('twitter_title', 'Welcome to AV - Live Games Platform')
@section('twitter_description', 'Join AV for the best live games experience. Play, connect, and enjoy entertainment like never before!')
@section('twitter_image', asset('images/themes/og-default.jpg'))

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
