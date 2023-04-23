@extends('layout.master')

@section('content')
    @if (Session::has('status'))
        <div class="mt-10" style="color: green;">
            <ul>
                <li>{{ Session::get('status') }}</li>
            </ul>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="mt-10" style="color: red;">
            <ul>
                <li>{{ Session::get('error') }}</li>
            </ul>
        </div>
    @endif
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        General Report for Archived Users
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                            class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-success"></i>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6"></div>
                                <div class="text-base text-slate-500 mt-1">Total Profiles</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-success"></i>

                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">
                                </div>
                                <div class="text-base text-slate-500 mt-1">Brethren</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-success"></i>

                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6"></div>
                                <div class="text-base text-slate-500 mt-1">Non-Brethren</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 mt-8">
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="user" class="report-box__icon text-success"></i>

                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">120</div>
                                        <div class="text-base text-slate-500 mt-1">Terminated Cases</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="user" class="report-box__icon text-success"></i>

                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">120</div>
                                        <div class="text-base text-slate-500 mt-1">Closed Cases</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: General Report -->
                    <!-- BEGIN: Users Layout -->
                    @foreach ($users as $user)
                        <div class="intro-y col-span-12 md:col-span-6 mt-5">
                            <div class="box">
                                <div class="flex flex-col lg:flex-row items-center p-5">
                                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                                            src=" {{ asset('dist/images/profile-5.jpg') }}">
                                    </div>
                                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                        <a href="" class="font-medium">{{ $user->getFullName($user->id) }}</a>
                                        @if ($user->getSecurityLevel($user->role_id) == 1)
                                            <div class="text-slate-500 text-xs mt-0.5">
                                                {{ $user->getLocaleName($user->locale_id) . ' - ' . $user->getRoleName($user->role_id) }}
                                            </div>
                                        @elseif ($user->getSecurityLevel($user->role_id) == 2)
                                            <div class="text-slate-500 text-xs mt-0.5">
                                                {{ $user->getDistrictName($user->district_id) . ' - ' . $user->getRoleName($user->role_id) }}
                                            </div>
                                        @elseif ($user->getSecurityLevel($user->role_id) == 3)
                                            <div class="text-slate-500 text-xs mt-0.5">
                                                {{ $user->getDivisionName($user->division_id) . ' - ' . $user->getRoleName($user->role_id) }}
                                            </div>
                                        @elseif ($user->getSecurityLevel($user->role_id) == 4 || 5)
                                            <div class="text-slate-500 text-xs mt-0.5">
                                                {{ $user->getRoleName($user->role_id) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex mt-4 lg:mt-0">

                                        <a href="{{ route('edit_user', [$user_info->id, $user->id]) }}">
                                            <button class="btn btn-secondary py-1 px-2 mr-2">Edit</button>
                                        </a>
                                        <a href="{{ route('view_user', [$user_info->id, $user->id]) }}">
                                            <button class="btn btn-secondary py-1 px-2 mr-2">View</button>
                                        </a>
                                        <a href="{{ route('edit_user', [$user_info->id, $user->id]) }}">
                                            <button class="btn btn-primary py-1 px-2 mr-2">Restore</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- BEGIN: Pagination -->
                    <div class="intro-y col-span-12 p-5 text-slate-500 grid justify-center">
                        <div class="flex justify-center">
                            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} items
                        </div>
                        <div class="flex justify-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                    <!-- END: Pagination -->
                </div>
@endsection
