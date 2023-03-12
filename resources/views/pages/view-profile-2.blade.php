@extends('layout.master')

@section('content')
    <!-- END: Top Bar -->
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                Edit Profile
            </h2>
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-6">
                <div class="mt-1">
                    <a href="" class="flex items-center px-3 py-2 rounded-md bg-primary text-white font-medium">
                        <i class="w-4 h-4 mr-2" data-lucide="user"></i> Personal Information </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="users"></i> Family Composition </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="thermometer"></i> Medical Condition </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="phone"></i> Contact Information </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-lucide="file-text"></i> Background Information </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->
        </div>

        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: Wizard Layout -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Personal Information
                    </h2>
                    <button class="btn btn-primary shadow-md mr-2"> <i class="w-4 h-4 mr-2" data-lucide="file"></i> Export
                        to PDF</button>
                </div>
                <div class="p-5">
                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr class="bg-primary">
                                        <th scope="col">Name</th>
                                        <th scope="col">Relatioship</th>
                                        <th scope="col">Tel. Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">John Smith</th>
                                        <td>Father</td>
                                        <td>09123456789</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">John Smith</th>
                                        <td>Father</td>
                                        <td>09123456789</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">John Smith</th>
                                        <td>Father</td>
                                        <td>09123456789</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- END PERSONAL INFO -->
                    </div>
                    <!-- START FAMILY COMPOSITION -->
                    <div class="mt-5">
                        <div class="font-medium text-base">Background Information</div>
                        <div class="mt-3">
                            <label for="update-profile-form-5" class="form-label">BACKGROUND INFO (KALAGAYAN NG
                                PASYENTE,
                                PAMILYA, FINANSYAL, EMOSYONAL, PHYSICAL)</label>
                            <textarea id="update-profile-form-5" class="form-control" placeholder="Input text here"></textarea>
                        </div>
                        <label for="update-profile-form-5" class="form-label mt-10">File Upload</label>
                        <form data-single="true" action="/file-upload" class="dropzone">
                            <div class="fallback"> <input name="file" type="file" /> </div>
                            <div class="dz-message" data-dz-message>
                                <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span
                                        class="font-medium">not</span> actually uploaded. </div>
                            </div>
                        </form>
                        <div class="mt-3">
                            <label for="update-profile-form-5" class="form-label">ACTION TAKEN/ SERVICES
                                RENDERED</label>
                            <textarea id="update-profile-form-5" class="form-control" placeholder="Input text here"></textarea>
                        </div>
                        <label for="update-profile-form-5" class="form-label mt-10">File Upload</label>
                        <form data-single="true" action="/file-upload" class="dropzone">
                            <div class="fallback"> <input name="file" type="file" /> </div>
                            <div class="dz-message" data-dz-message>
                                <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span
                                        class="font-medium">not</span> actually uploaded. </div>
                            </div>
                        </form>
                        <!-- END FAMILY COMPOSITION -->
                        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                            <button class="btn btn-secondary w-24 ml-2">Back</button>
                            <button class="btn btn-primary w-100 ml-2">Return to List Profiles</button>
                        </div>
                    </div>
                </div>
                <!-- END: Content -->
            @endsection