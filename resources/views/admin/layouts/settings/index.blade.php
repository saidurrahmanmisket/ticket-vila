@extends('admin.app')

@section('title', 'Settings')
@section('header_title')
    Settings
@endsection;
@section('content')
    <div class="management--area">
        <h3>Management</h3>
        <div class="main--settings--area default--scrollbar">
            <h4>
                Notifications <span>(Rateit will send you notifications)</span>
            </h4>
            <!-- single--setting  -->
            <div class="single--setting">
                <h3>Notify me when user buy a ticket</h3>
                <button
                    class="light-mode-button"
                    aria-label="Toggle Light Mode"
                >
                    <span class="toggler"></span>
                    <span class="ball"></span>
                </button>
            </div>
            <!-- single--setting  -->
            <div class="single--setting">
                <h3>Play sound when payment are placed (desktop only)</h3>
                <button
                    class="light-mode-button"
                    aria-label="Toggle Light Mode"
                >
                    <span class="toggler"></span>
                    <span class="ball"></span>
                </button>
            </div>
            <!-- single--setting  -->
            <div class="single--setting">
                <h3>Notify me when new user visit on site</h3>
                <button
                    class="light-mode-button"
                    aria-label="Toggle Light Mode"
                >
                    <span class="toggler"></span>
                    <span class="ball"></span>
                </button>
            </div>
            <!-- single--setting  -->
            <div class="single--setting">
                <h3>Email me after the raffle if I don’t win</h3>
                <button
                    class="light-mode-button"
                    aria-label="Toggle Light Mode"
                >
                    <span class="toggler"></span>
                    <span class="ball"></span>
                </button>
            </div>
        </div>
    </div>
@endsection


