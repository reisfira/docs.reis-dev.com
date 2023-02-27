@extends('layouts.master', ['hide_white_header' => true])
@section('title', 'Profile')
@section('subheader', 'Profile')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card card-info">
                <div class="card-header">
                    <h5>EDUCATION</h5>
                </div>
                <div class="card-body">
                    {{-- use timeline from CMON here --}}
                    <div class="timeline">
                        <div class="time-label">
                            <span class="bg-info px-3">
                                <small>2014 - 2017</small>
                            </span>
                        </div>
                        <div>
                            <i class="fas fa-school bg-blue"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">
                                    <strong>BACHELOR OF COMPUTER SCIENCE</strong>
                                </h3>
                                <div class="timeline-body">
                                    <p class="mb-1">SWINBURNE UNIVERSITY OF TECHNOLOGY (SARAWAK CAMPUS)</p>
                                    <small>CGPA: 3.13</small>
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-sm px-3" href="{{ asset('files/transcript.pdf') }}" target="blank">Transcript</a>
                                    <a class="btn btn-info btn-sm text-white px-3" href="{{ asset('files/award-letter.pdf') }}" target="blank">Award Letter</a>
                                    <a class="btn btn-secondary btn-sm px-3" data-toggle="popover" data-content="No softcopy version yet. I need to remind myself to scan it">Certificate</a>

                                </div>
                            </div>
                        </div>


                        <div class="time-label">
                            <span class="bg-secondary px-3">
                                <small>2018 - 2019</small>
                            </span>
                        </div>
                        <div>
                            <i class="fas fa-school bg-secondary"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">
                                    <strong>MASTER OF SCIENCE</strong>
                                </h3>
                                <div class="timeline-body">
                                    <p class="mb-1">SWINBURNE UNIVERSITY OF TECHNOLOGY (SARAWAK CAMPUS)</p>
                                    <small>Not finished</small>
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-info btn-sm px-3" href="https://www.researchgate.net/publication/326103689_Exploratory_Study_for_Data_Visualization_in_Internet_of_Things" target="_blank">
                                        Exploratory Study
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- end --}}
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-info">
                <div class="card-header text-white">
                    <h5>WORK EXPERIENCE</h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="time-label">
                            <span class="bg-info px-3">
                                <small>JUNE 2019 - CURRENT (2023)</small>
                            </span>
                        </div>
                        <div>
                            <i class="fas fa-industry bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"> 4 years </span>
                                <h3 class="timeline-header">
                                    <strong>KUSIMI E-SOLUTION SDN BHD</strong>
                                </h3>
                                <div class="timeline-body">
                                    <strong>SOFTWARE ENGINEER</strong>
                                    <ul>
                                        <li>
                                            Built factory production, accounting, stock management systems along with some apps that integrate with them.
                                        </li>
                                        <li>
                                            Technologies used: Laravel 5 – 8 (PHP), Bootstrap (Sass), Jquery, Ionic, AngularJS, NodeJS
                                        </li>
                                        <li>
                                            Servers: Physical Servers (Windows Server), VPS (Ubuntu), Shared Hosting
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="time-label">
                            <span class="bg-info px-3">
                                <small>2017 - 2019</small>
                            </span>
                        </div>

                        <div>
                            <i class="fas fa-school bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"> 2 years </span>
                                <h3 class="timeline-header">
                                    <strong>SWINBURNE UNIVERSITY OF TECHNOLOGY SARAWAK CAMPUS</strong>
                                </h3>
                                <div class="timeline-body">
                                    <strong>SOFTWARE ENGINEER</strong>
                                    <ul>
                                        <li>
                                            Built in-house online system such as research monitoring system and attendance monitoring system.
                                        </li>
                                        <li>
                                            Technologies used: Laravel 5 (PHP), Bootstrap (Sass), Jquery
                                        </li>
                                        <li>
                                            Servers: VPS (DigitalOcean/AWS) Ubuntu
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h5>
                        PROFILE
                        <a href="{{ asset('files/curriculum-vitae.pdf') }}" target="blank" class="btn btn-info btn-sm text-white px-3 float-right">
                            Download Resume | CV
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <img src="{{ asset('images/profile.jpg') }}" class="img-thumbnail rounded float-right d-block"
                        alt="Yuzrie Profile" width="200">

                    @include('components.form.general.text-w-label', [
                        'name' => 'setting[company_code]',
                        'label' => 'Name',
                        'value' => 'Mohamad Yuzrie Bin Khalid',
                    ])

                    @include('components.form.general.text-w-label', [
                        'name' => 'setting[company_name]',
                        'label' => 'Phone No',
                        'value' => '+60 13-8008950',
                    ])

                    @include('components.form.general.date-w-label', [
                        'name' => 'setting[company_no]',
                        'label' => 'Date of Birth',
                        'value' => '07/08/1995',
                    ])

                    @include('components.form.general.text-w-label', [
                        'name' => 'setting[company_address]',
                        'label' => 'Age',
                        'value' => '28',
                    ])

                    @include('components.form.general.text-w-label', [
                        'name' => 'setting[company_address]',
                        'label' => 'Hobby',
                        'value' => 'Books | Games | Board Games',
                    ])
                </div>
            </div>

            <div class="card card-info">
                <div class="card-header">
                    <h5>SKILLS & ABILITIES</h5>
                </div>
                <div class="card-body">
                    <strong>TECHNICAL PROBLEM-SOLVING SKILLS</strong>
                    <ul>
                        <li>Ability to develop a database structures and queries with low complexity</li>
                        <li>Analyze problem and determine a solution, fix, and/or workarounds in a given scenario</li>
                    </ul>

                    <strong>ADAPTABILITY & SELF LEARNING</strong>
                    <ul>
                        <li>Able to switch between programming languages; e.g.: PHP to Javascript to Jquery to Typescript</li>
                        <li>Able to understand and deploy systems on different types of servers</li>
                        <li>Able to keep up with new programming knowledge through self-learning</li>
                    </ul>

                    <strong>COMMUNICATION</strong>
                    <li>Delivered the presentation and training of new/existing systems to customers</li>
                    <li>Taught programming languages, concepts, and some domain knowledges to junior developers</li>

                </div>
            </div>
        </div>
    </div>
@endsection
