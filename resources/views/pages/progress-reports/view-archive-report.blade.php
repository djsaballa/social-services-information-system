@extends('layout.master')

@section('content')
    <!-- START: CONTENT -->
    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
                <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                    Progress Report
                </h2>
                <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
                    <!-- BEGIN: Wizard Layout -->
                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto" id="personal-info">
                                Personal Information
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="flex flex-col-reverse xl:flex-row flex-col">
                                <div class="flex-1 mt-6 xl:mt-0">
                                    <div class="grid grid-cols-12 gap-x-5">
                                        <div class="col-span-6 2xl:col-span-3">
                                            <div class="mt-3 ">
                                                <label for="update-profile-form-1" class="form-label">
                                                    Name:<span class="ml-3">{{ $client_profile_info->first_name }}<span
                                                            class="ml-1">{{ $client_profile_info->middle_name }}<span
                                                                class="ml-1">{{ $client_profile_info->last_name }}</span></span></span></label>
                                            </div>
                                            <div class="mt-3 ">
                                                <label for="update-profile-form-3-tomselected" class="form-label"
                                                    id="update-profile-form-3-ts-label">Gender:<span
                                                        class="ml-3">{{ $client_profile_info->gender }}</span></label>
                                            </div>
                                            <div class="mt-3 ">
                                                <label for="update-profile-form-4" class="form-label">Age:<span
                                                        class="ml-3">{{ $client_profile_info->age }}</span></label>
                                            </div>
                                            <div class="mt-3">
                                                <label for="update-profile-form-4" class="form-label">Contact
                                                    Number: {{ $client_profile_info->contact_number }}</label>
                                            </div>
                                        </div>

                                        <div class="col-span-6 2xl:col-span-3">

                                            <div class="mt-3 ">
                                                <label for="update-profile-form-3-tomselected" class="form-label"
                                                    id="update-profile-form-3-ts-label">Division:<span
                                                        class="ml-3">{{ $client_profile_info->locale->getDivisionName($client_profile_info->locale_id) }}</span></label>
                                            </div>
                                            <div class="mt-3 ">
                                                <label for="update-profile-form-3-tomselected" class="form-label"
                                                    id="update-profile-form-3-ts-label">District:<span
                                                        class="ml-3">{{ $client_profile_info->locale->getDistrictName($client_profile_info->locale_id) }}</span></label>
                                            </div>

                                            <div class="mt-3">
                                                <label for="update-profile-form-3-tomselected" class="form-label"
                                                    id="update-profile-form-3-ts-label">Locale:<span
                                                        class="ml-3">{{ $client_profile_info->locale->getLocaleName($client_profile_info->locale_id) }}</span></label>
                                            </div>
                                            <div class="mt-3">
                                                <label for="startDate">Baptism Date:<span
                                                        class="ml-3">{{ $client_profile_info->baptism_date }}</span></label>
                                            </div>
                                            <div class="mt-3">
                                                <label for="startDate">Birth Date:<span
                                                        class="ml-3">{{ $client_profile_info->birth_date }}</span></label>
                                            </div>
                                        </div>
                                        <div class="col-span-6 2xl:col-span-3"></div>
                                        <div class="w-52 mx-auto xl:mr-0 xl:ml-6 mt-5">
                                            <div
                                                class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                @if ( !empty($client_profile_info->picture) )
                                                    <img src="{{ asset('storage/'.$client_profile_info->picture) }}" class="rounded-md" alt="Client Image">
                                                @else
                                                    <img alt="Client Image" class="rounded-md" src=" {{ asset('dist/images/profile-1.jpg')}}">
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PERSONAL INFO -->
                            </div>
                            <!-- START FAMILY COMPOSITION -->
                            <div class="intro-y box lg:mt-5">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr class="bg-primary">
                                            <th scope="col">Date & Time</th>
                                            <th scope="col">Means Of Contact</th>
                                            <th scope="col">Case Notes</th>
                                            <th scope="col">Remarks</th>
                                            <th scope="col">Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">12/12/2020</th>
                                            <td>09123456789</td>
                                            <td>lorem ipsum</td>
                                            <td> lorem ipsum</td>
                                            <td>attachment</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END FAMILY COMPOSITION -->
                        </div>
                    </div>
                </div>
                <!-- END: Content -->
            @endsection