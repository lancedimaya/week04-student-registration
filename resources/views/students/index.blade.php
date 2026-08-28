@extends('layouts.app')

@section('title', 'Registered Students')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Registered Students</h1>
            <p class="text-slate-500 mt-1">List of all students registered in the system</p>
        </div>
        <a href="{{ route('students.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg bg-brand-700 text-white font-semibold hover:bg-brand-800 transition shadow-sm text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Register New Student
        </a>
    </div>

    @if ($students->isEmpty())
        <div class="bg-white rounded-xl shadow-md p-12 text-center">
            <div class="w-16 h-16 mx-auto rounded-full bg-brand-100 flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <h2 class="text-xl font-semibold text-slate-800">No students registered yet</h2>
            <p class="text-slate-500 mt-2 mb-6">Register the first student to get started.</p>
            <a href="{{ route('students.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg bg-brand-700 text-white font-semibold hover:bg-brand-800 transition shadow-sm">
                Register Student
            </a>
        </div>
    @else
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Student</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Student ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Program</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Year Level</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($students as $student)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full overflow-hidden bg-brand-100 flex items-center justify-center shrink-0">
                                            @if ($student->profile_picture)
                                                <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="{{ $student->full_name }}" class="w-full h-full object-cover">
                                            @else
                                                <span class="text-brand-700 font-bold">{{ strtoupper(substr($student->first_name, 0, 1)) }}</span>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-slate-900">{{ $student->full_name }}</div>
                                            <div class="text-xs text-slate-500">{{ $student->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">{{ $student->student_id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">{{ $student->program }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">{{ $student->year_level }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <a href="{{ route('students.show', $student->id) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-sm font-medium text-brand-700 hover:bg-brand-50 transition">
                                        View Details
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection