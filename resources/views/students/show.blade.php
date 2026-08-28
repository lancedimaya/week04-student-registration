@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Student Details</h1>
            <p class="text-slate-500 mt-1">Registered student profile information</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('students.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-brand-700 text-white font-semibold hover:bg-brand-800 transition shadow-sm text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                New Registration
            </a>
            <a href="{{ route('students.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-slate-300 text-slate-700 font-medium hover:bg-slate-100 transition shadow-sm text-sm">
                All Students
            </a>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Profile Header -->
        <div class="bg-brand-800 px-6 py-8 flex flex-col sm:flex-row items-center gap-6">
            <div class="w-32 h-32 rounded-full overflow-hidden ring-4 ring-white/30 bg-brand-700 flex items-center justify-center shrink-0">
                @if ($student->profile_picture)
                    <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="{{ $student->full_name }}" class="w-full h-full object-cover">
                @else
                    <span class="text-white text-4xl font-bold">{{ strtoupper(substr($student->first_name, 0, 1)) }}</span>
                @endif
            </div>
            <div class="text-center sm:text-left">
                <h2 class="text-2xl font-bold text-white">{{ $student->full_name }}</h2>
                <p class="text-brand-200 mt-1">{{ $student->program }} — {{ $student->year_level }}</p>
                <p class="text-brand-200 text-sm mt-1">{{ $student->student_id }}</p>
            </div>
        </div>

        <!-- Details Grid -->
        <div class="p-6">
            <h3 class="text-lg font-semibold text-slate-900 mb-4">Personal Information</h3>
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-5">
                <div>
                    <dt class="text-sm font-medium text-slate-500">Student ID</dt>
                    <dd class="mt-1 text-slate-800 font-medium">{{ $student->student_id }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-slate-500">Email Address</dt>
                    <dd class="mt-1 text-slate-800 font-medium">{{ $student->email }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-slate-500">Mobile Number</dt>
                    <dd class="mt-1 text-slate-800 font-medium">{{ $student->mobile_number }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-slate-500">Date of Birth</dt>
                    <dd class="mt-1 text-slate-800 font-medium">{{ \Carbon\Carbon::parse($student->date_of_birth)->format('F j, Y') }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-slate-500">Gender</dt>
                    <dd class="mt-1 text-slate-800 font-medium">{{ $student->gender }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-slate-500">Program</dt>
                    <dd class="mt-1 text-slate-800 font-medium">{{ $student->program }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-slate-500">Year Level</dt>
                    <dd class="mt-1 text-slate-800 font-medium">{{ $student->year_level }}</dd>
                </div>
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-slate-500">Address</dt>
                    <dd class="mt-1 text-slate-800 font-medium">{{ $student->address }}</dd>
                </div>
            </dl>

            <div class="mt-8 pt-6 border-t border-slate-200 flex flex-col sm:flex-row gap-3 sm:justify-between">
                <div class="text-sm text-slate-400">
                    Registered on {{ \Carbon\Carbon::parse($student->created_at)->format('F j, Y g:i A') }}
                </div>
                <a href="{{ route('students.create') }}" class="inline-flex justify-center items-center gap-2 px-5 py-2 rounded-lg bg-brand-700 text-white font-semibold hover:bg-brand-800 transition shadow-sm text-sm">
                    Register Another Student
                </a>
            </div>
        </div>
    </div>
</div>
@endsection