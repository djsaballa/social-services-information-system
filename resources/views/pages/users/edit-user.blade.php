@extends('layout.master')

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit User
        </h2>
    </div>
    <!-- BEGIN: Change Password -->
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                Update User Profile
            </h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="p-5">
            <div class="col-span-6 2xl:col-span-3">
                <form method="POST" action="{{ route('edit_user_save') }}" enctype="multipart/form-data">
                    @csrf
                    <input id="user-id" name="userId" value="{{ $user_info->id }}" hidden>
                    <input id="employee-id" name="employeeId" value="{{ $employee_info->id }}" hidden>
                    <div class="grid grid-cols-12 gap-x-5">
                        <div class="col-span-6 2xl:col-span-3">
                            <div class="mt-3">
                                <label for="update-profile-form-1" class="form-label">First Name</label>
                                <input id="first-name" name="firstName" type="text" class="form-control"
                                    placeholder="First Name" value="{{ $employee_info->first_name }}">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-1" class="form-label">Middle
                                    Name</label>
                                <input id="middle-name" name="middleName" type="text" class="form-control"
                                    placeholder="Middle Name" value="{{ $employee_info->middle_name }}">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-1" class="form-label">Last Name</label>
                                <input id="last-name" name="lastName" type="text" class="form-control"
                                    placeholder="Last Name" value="{{ $employee_info->last_name }}">
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-4" class="form-label">Phone
                                    Number</label>
                                <input id="contact-number" name="contactNumber" type="text" class="form-control"
                                    placeholder="09123456789" value="{{ $employee_info->contact_number }}">
                            </div>
                        </div>
                        <div class="col-span-6 2xl:col-span-3">
                            @php
                                use App\Models\District;
                                use App\Models\Locale;
                                
                                $districts = District::all();
                                $districts_json = $districts->toJson();
                                
                                $locales = Locale::all();
                                $locales_json = $locales->toJson();
                            @endphp
                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Division</label>
                                <select id="division-filter-3" name="division" data-search="true"
                                    class="w-full form-control" tabindex="-1" onchange="loadDistricts3( {{ $districts_json }} )">
                                    @if (!empty($employee_info->division_id))
                                        <option value="{{ $employee_info->division_id }}" selected="true">
                                            {{ $employee_info->getDivisionName($employee_info->division_id) }}
                                        </option>
                                    @else
                                        <option value="Select Division" selected="true" disabled> Select
                                            Division</option>
                                    @endif
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->division }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">District</label>
                                    @if (!empty($employee_info->district_id))
                                        @php
                                            $filtered_districts = $districts->where('division_id', $employee_info->division_id)
                                        @endphp
                                        <select id="district-filter-3" name="district" data-search="true" class="w-full form-control" tabindex="-1" onchange="loadLocales3( {{ $locales_json }} )">
                                            <option value="{{ $employee_info->district_id }}" selected="true">{{ $employee_info->getDistrictName($employee_info->district_id) }}</option>
                                        @foreach ($filtered_districts as $filtered_district)
                                            <option value="{{ $filtered_district->id }}">{{ $filtered_district->district }}</option>
                                        @endforeach
                                    @else
                                        <select id="district-filter-3" name="district" data-search="true" class="w-full form-control" tabindex="-1" onchange="loadLocales3( {{ $locales_json }} )" disabled>
                                            <option value="Select District" selected="true" disabled>Select District</option>
                                    @endif
                                </select>
                            </div>

                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Locale</label>
                                    @if (!empty($employee_info->locale_id))
                                    @php
                                        $filtered_locales = $locales->where('district_id', $employee_info->district_id)
                                    @endphp
                                        <select id="locale-filter-3" name="locale" data-search="true" class="w-full form-control" tabindex="-1">
                                            <option value="{{ $employee_info->locale_id }}" selected="true">
                                                {{ $employee_info->getLocaleName($employee_info->locale_id) }}
                                            </option>
                                        @foreach ($filtered_locales as $filtered_locale)
                                            <option value="{{ $filtered_locale->id }}">{{ $filtered_locale->locale }}</option>
                                        @endforeach
                                    @else
                                        <select id="locale-filter-3" name="locale" data-search="true" class="w-full form-control" tabindex="-1" disbaled>
                                            <option value="Select Locale" selected="true" disabled> Select Locale</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="update-profile-form-3-tomselected" class="form-label"
                                    id="update-profile-form-3-ts-label">Role</label>
                                <select id="role" name="role" data-search="true"
                                    class="tom-select w-full tomselected" tabindex="-1" hidden="hidden">
                                    <option value="{{ $employee_info->role_id }}" selected="true">
                                        {{ $employee_info->getRoleName($employee_info->role_id) }}
                                    </option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                            <div
                                class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    @if ( !empty($employee_info->picture) )
                                        <img src="{{ asset('storage/'.$employee_info->picture) }}" id="currentPicture" alt="User Image" style="display:block;">
                                    @else
                                        <img class="rounded-md" alt="User Image" id="currentPicture" style="display:block;"
                                            src="{{ asset('dist/images/profile-1.jpg') }}">
                                    @endif
                                    <img id="preview" src="#" alt="User image" class="rounded-md" style="display:none;">
                                </div>
                                <div class="mx-auto cursor-pointer relative mt-5">
                                    <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                    <input type="file" name="picture" class="w-full h-full top-0 left-0 absolute opacity-0" onchange="previewImage(event)">
                                    <input type="hidden" name="pictureBackup" value="{{ $employee_info->picture ?? null }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <a href="{{ route('list_of_users', $user_info->id ) }}" class="btn btn-secondary w-24 ml-2">Cancel</a>
                        <button class="btn btn-primary w-24 ml-2">Save</button>
                    </div>
                </div>
                </form>
            </div>
        <!-- END: Change Password -->
    </div>
    </div>
    </div>
    <script>
        function previewImage(event) {
            var input = event.target;
            var placeholder = document.getElementById('currentPicture');
            var preview = document.getElementById('preview');
            var reader = new FileReader();

            reader.onload = function() {
                preview.src = reader.result;
                placeholder.style.display = 'none';
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    </script>
    <!-- END: Content -->
@endsection
