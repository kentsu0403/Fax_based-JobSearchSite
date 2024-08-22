@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>応募した案件一覧</h1>

        @if($applications->isEmpty())
            <p>まだ応募していません。</p>
        @else
            <ul>
                @foreach($applications as $application)
                    <li>
                        <strong>案件名:</strong> {{ $application->project->project_name }}<br>
                        <strong>応募日:</strong> {{ $application->application_date->format('Y-m-d') }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
