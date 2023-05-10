@extends('layout.master')

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto mt-2">
            Inbox
        </h2>
    </div>
    <div class="intro-y col-span-12 lg:col-span-8 2xl:col-span-9">
        <!-- BEGIN: Inbox Content -->
        <div class="intro-y inbox box mt-5">
            <!-- BEGIN: Chat Default -->
            <div class="intro-x box relative flex p-5 ">
                <div class="w-12 h-12 flex-none image-fit mr-1">
                    @if (!empty($inbox_info->getSenderPicture($inbox_info->sender_user_id)))
                        <img src="{{ asset('storage/' . $inbox_info->getSenderPicture($inbox_info->sender_user_id)) }}"
                            class="rounded-md" alt="Client Image">
                    @else
                        <img alt="Client Image" class="rounded-md" src=" {{ asset('dist/images/profile-1.jpg') }}">
                    @endif
                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                </div>
                <div class="ml-2 overflow-hidden">
                    <div class="flex items-center">
                        <a href="{{ route('view_user', [$user_info->id, $inbox_info->sender_user_id]) }}" class="font-medium">{{ $inbox_info->getSenderName($inbox_info->sender_user_id) }}</a>
                        <div class="text-xs text-slate-400 ml-auto">{{ $inbox_info->dateFormatMdY($inbox_info->date_sent) }}</div>
                    </div>
                    <div class="w-full text-slate-500 mt-2 p-3 ">
                        {{ $inbox_info->content}}
                    </div>
                </div>
            </div>
            <!-- END: Chat Default -->
            <!-- END: Inbox Content -->
        </div>
        <!-- END: Content -->
    </div>
@endsection
