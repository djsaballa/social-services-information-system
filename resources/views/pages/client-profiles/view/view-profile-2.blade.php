@extends('layout.master')

@section('content')
    <!-- END: Top Bar -->
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                View Client Profile
            </h2>
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-6">
                <div class="mt-1">
                    <a href="{{ route('view_client_profile_1', [$user_info->id, $client_profile_info->id]) }}#personal-info" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <i class="w-4 h-4 mr-2" data-lucide="user"></i> Personal Information </a>
                    <a href="{{ route('view_client_profile_1', [$user_info->id, $client_profile_info->id]) }}#family-comp" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="users"></i> Family Composition </a>
                    <a href="{{ route('view_client_profile_1', [$user_info->id, $client_profile_info->id]) }}#medical-condition" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="thermometer"></i> Medical Condition </a>
                    <a href="#contact-persons" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="phone"></i> Contact Persons </a>
                    <a href="#background-info" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="file-text"></i> Background Information </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->
            @include('components.doctor-remarks')
            @include('components.remarks')
        </div>
     
        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: Wizard Layout -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    <p>{{ Session::get('error') }}</p>
                </div>
            @endif
            @if (Session::has('status'))
                <div class="alert alert-success text-center text-white">
                    <p>{{ Session::get('status') }}</p>
                </div>
            @endif
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto" id="contact-persons">
                        Contact Persons
                    </h2>
                    <form action="{{route('view_pdf',[$user_info->id, $client_profile_info->id]) }}" method="post" target="__black">
                        @csrf
                        <button class="btn btn-primary shadow-md mr-2"> <i class="w-4 h-4 mr-2" data-lucide="file"></i> Export
                            to PDF</button>
                    </form>
                </div>
                <div class="p-5">
                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr class="bg-primary">
                                        <th scope="col">Name</th>
                                        <th scope="col">Tel. Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $client_profile_info->contact_person1_name }}</th>
                                        <td>{{ $client_profile_info->contact_person1_contact_number }}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">{{ $client_profile_info->contact_person2_name }}</th>
                                        <td>{{ $client_profile_info->contact_person2_contact_number }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto" id="personal-info">
                                Background Information
                            </h2>
                        </div>
                        <div class="m-3">
                            <label for="update-profile-form-5" class="form-label">BACKGROUND INFO (Patient's condition
                                Family situation, Financial status, Emotional well-being, Physical health)</label>
                            <textarea id="update-profile-form-5" class="form-control" value="Input text here" disabled>{{ $client_profile_info->background_info }}</textarea>
                        </div>
                        <label for="update-profile-form-5" class="form-label font-medium m-3 mt-2">File Uploaded: </label>
                        @if ( !empty($client_profile_info->background_info_attachment) )
                            <a href="{{ asset('storage/'.$client_profile_info->background_info_attachment) }}" target="_blank" >
                                <button class="btn btn-primary">
                                        View Attachment
                                </button>
                            </a>
                        @else
                            No Uploaded Attachment
                        @endif
                        <div class="m-3 mt-10">
                            <label for="update-profile-form-5" class="form-label">ACTION TAKEN/ SERVICES
                                RENDERED</label>
                            <textarea id="update-profile-form-5" class="form-control" placeholder="Input text here" disabled>{{ $client_profile_info->action_taken }}</textarea>
                        </div>
                        <label for="update-profile-form-5" class="form-label font-medium m-3 mt-2">File Uploaded:</label>
                        @if ( !empty($client_profile_info->action_taken_attachment) )
                            <a href="{{ asset('storage/'.$client_profile_info->action_taken_attachment) }}" target="_blank" >
                                <button class="btn btn-primary">
                                        View Attachment
                                </button>
                            </a>
                        @else
                            No Uploaded Attachment
                        @endif
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end p-5">
                            <a class="btn btn-secondary w-24 ml-2" href="{{ route('view_client_profile_1', [$user_info->id, $client_profile_info->id]) }}"> Back </a>
                            <a class="btn btn-primary w-100 ml-2" href="{{ route('list_of_client_profiles', $user_info->id) }}"> Return To List </a>
                        </div>
                    </div>
                </div>
                <!-- END: Content -->
            @endsection