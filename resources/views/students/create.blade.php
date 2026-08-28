@extends('layouts.app')

@section('title', 'Student Registration Form')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Registration Form</h1>
        <p class="text-slate-500 mt-1">Please fill in the student information below. All fields marked <span class="text-red-500 font-semibold">*</span> are required.</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-lg shadow-sm" role="alert">
            <div class="px-4 py-3 border-b border-red-200 flex items-center gap-2 font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                Please fix the following errors:
            </div>
            <ul class="list-disc list-inside px-4 py-3 space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-md overflow-hidden">
        @csrf

        <!-- Student Identity -->
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-brand-100 text-brand-700 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </span>
                Student Identity
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="student_id" class="block text-sm font-medium text-slate-700 mb-1">Student ID <span class="text-red-500">*</span></label>
                    <input type="text" name="student_id" id="student_id" value="{{ old('student_id') }}" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 @error('student_id') border-red-500 @enderror"
                        placeholder="e.g. 2024-00123">
                    @error('student_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 @error('email') border-red-500 @enderror"
                        placeholder="e.g. student@cit.edu.ph">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="mobile_number" class="block text-sm font-medium text-slate-700 mb-1">Mobile Number <span class="text-red-500">*</span></label>
                    <input type="text" name="mobile_number" id="mobile_number" value="{{ old('mobile_number') }}" required inputmode="numeric"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 @error('mobile_number') border-red-500 @enderror"
                        placeholder="e.g. 09171234567">
                    @error('mobile_number')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="date_of_birth" class="block text-sm font-medium text-slate-700 mb-1">Date of Birth <span class="text-red-500">*</span></label>
                    <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 @error('date_of_birth') border-red-500 @enderror">
                    @error('date_of_birth')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Personal Details -->
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-brand-100 text-brand-700 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </span>
                Personal Details
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div>
                    <label for="first_name" class="block text-sm font-medium text-slate-700 mb-1">First Name <span class="text-red-500">*</span></label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 @error('first_name') border-red-500 @enderror"
                        placeholder="e.g. Juan">
                    @error('first_name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="middle_name" class="block text-sm font-medium text-slate-700 mb-1">Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name') }}"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 @error('middle_name') border-red-500 @enderror"
                        placeholder="e.g. Santos">
                    @error('middle_name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="last_name" class="block text-sm font-medium text-slate-700 mb-1">Last Name <span class="text-red-500">*</span></label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 @error('last_name') border-red-500 @enderror"
                        placeholder="e.g. Dela Cruz">
                    @error('last_name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="gender" class="block text-sm font-medium text-slate-700 mb-1">Gender <span class="text-red-500">*</span></label>
                    <select name="gender" id="gender" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 @error('gender') border-red-500 @enderror">
                        <option value="">Select gender</option>
                        <option value="Male" @selected(old('gender') === 'Male')>Male</option>
                        <option value="Female" @selected(old('gender') === 'Female')>Female</option>
                        <option value="Other" @selected(old('gender') === 'Other')>Other</option>
                    </select>
                    @error('gender')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Academic Information -->
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-brand-100 text-brand-700 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422A12.083 12.083 0 0121 12v4a12.083 12.083 0 01-2.84 1.422L12 18l-6.16-3.422A12.083 12.083 0 013 12v-4a12.083 12.083 0 012.84-1.422L12 14z" />
                    </svg>
                </span>
                Academic Information
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="md:col-span-1">
                    <label for="program" class="block text-sm font-medium text-slate-700 mb-1">Program <span class="text-red-500">*</span></label>
                    <select name="program" id="program" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 @error('program') border-red-500 @enderror">
                        <option value="">Select program</option>
                        <option value="BS Computer Science" @selected(old('program') === 'BS Computer Science')>BS Computer Science</option>
                        <option value="BS Information Technology" @selected(old('program') === 'BS Information Technology')>BS Information Technology</option>
                        <option value="BS Information Systems" @selected(old('program') === 'BS Information Systems')>BS Information Systems</option>
                        <option value="BS Data Science" @selected(old('program') === 'BS Data Science')>BS Data Science</option>
                        <option value="BS Computer Engineering" @selected(old('program') === 'BS Computer Engineering')>BS Computer Engineering</option>
                        <option value="Other" @selected(old('program') === 'Other')>Other</option>
                    </select>
                    @error('program')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="year_level" class="block text-sm font-medium text-slate-700 mb-1">Year Level <span class="text-red-500">*</span></label>
                    <select name="year_level" id="year_level" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 @error('year_level') border-red-500 @enderror">
                        <option value="">Select year level</option>
                        <option value="1st Year" @selected(old('year_level') === '1st Year')>1st Year</option>
                        <option value="2nd Year" @selected(old('year_level') === '2nd Year')>2nd Year</option>
                        <option value="3rd Year" @selected(old('year_level') === '3rd Year')>3rd Year</option>
                        <option value="4th Year" @selected(old('year_level') === '4th Year')>4th Year</option>
                        <option value="5th Year" @selected(old('year_level') === '5th Year')>5th Year</option>
                    </select>
                    @error('year_level')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Address & Profile Picture -->
        <div class="p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-brand-100 text-brand-700 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </span>
                Address & Profile
            </h2>

            <div class="grid grid-cols-1 gap-5">
                <div>
                    <label for="address" class="block text-sm font-medium text-slate-700 mb-1">Address <span class="text-red-500">*</span></label>
                    <textarea name="address" id="address" rows="3" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 @error('address') border-red-500 @enderror"
                        placeholder="Enter complete address">{{ old('address') }}</textarea>
                    @error('address')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="profile_picture" class="block text-sm font-medium text-slate-700 mb-1">Profile Picture <span class="text-red-500">*</span></label>
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/jpeg,image/png" required
                        class="w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand-100 file:text-brand-800 file:font-semibold hover:file:bg-brand-200 transition cursor-pointer @error('profile_picture') border-red-500 @enderror">
                    <p class="text-xs text-slate-400 mt-1">Accepted formats: JPG, JPEG, PNG. Max size: 2MB.</p>
                    @error('profile_picture')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex flex-col sm:flex-row gap-3 sm:justify-end">
            <a href="{{ route('students.index') }}" class="inline-flex justify-center items-center px-4 py-2 rounded-lg border border-slate-300 text-slate-700 font-medium hover:bg-slate-100 transition">
                Cancel
            </a>
            <button type="submit" class="inline-flex justify-center items-center gap-2 px-6 py-2 rounded-lg bg-brand-700 text-white font-semibold hover:bg-brand-800 transition shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Register Student
            </button>
        </div>
    </form>
</div>
@endsection