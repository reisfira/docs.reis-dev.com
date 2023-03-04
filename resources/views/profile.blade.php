@extends('layouts.master', ['hide_white_header' => true])
@section('title', 'Profile')
@section('subheader', 'Profile')

@section('content')
    <div class="row">


        <div class="col-lg-6">
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
                    {{-- image appear on mobile screen center --}}
                    <div class="text-center d-block d-sm-block d-md-none">
                        <img src="{{ asset('images/profile.jpg') }}" class="img-thumbnail rounded" alt="Yuzrie Profile" width="200">
                    </div>

                    {{-- image appear on pc screen on the right --}}
                    <div class="d-none d-md-block">
                        <img src="{{ asset('images/profile.jpg') }}" class="img-thumbnail rounded float-right" alt="Yuzrie Profile" width="200">
                    </div>

                    @include('components.form.general.text-w-label', [
                        'name' => 'setting[company_code]',
                        'label' => 'Name',
                        'value' => 'Mohamad Yuzrie Bin Khalid',
                        'form_class' => 'form-control-plaintext',
                        'bold_label' => true,
                    ])

                    @include('components.form.general.text-w-label', [
                        'name' => 'setting[company_name]',
                        'label' => 'Contact',
                        'value' => '+60 13-8008950 | mohamadyuzrie@gmail.com',
                        'form_class' => 'form-control-plaintext',
                        'bold_label' => true,
                    ])

                    @include('components.form.general.text-w-label', [
                        'name' => 'setting[company_no]',
                        'label' => 'DOB',
                        'value' => '7th August 1995',
                        'form_class' => 'form-control-plaintext',
                        'bold_label' => true,
                    ])

                    @include('components.form.general.text-w-label', [
                        'name' => 'setting[company_address]',
                        'label' => 'Age',
                        'value' => '28',
                        'form_class' => 'form-control-plaintext',
                        'bold_label' => true,
                    ])

                    @include('components.form.general.text-w-label', [
                        'name' => 'setting[company_address]',
                        'label' => 'Hobby',
                        'value' => 'Books | Games | Board Games',
                        'form_class' => 'form-control-plaintext',
                        'bold_label' => true,
                    ])
                </div>
            </div>

            <div class="card card-purple">
                <div class="card-header">
                    <h5>TECHNICAL SKILLS</h5>
                </div>
                <div class="card-body">
                    <p>
                        <strong>WEB DEVELOPMENT</strong>
                    </p>
                    <div class="row">
                        {{-- laravel --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg" />
                            <p class="mt-3 mb-0">Laravel 5 - 8</p>
                        </div>

                        {{-- bootstrap --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" />
                            <p class="mt-3 mb-0">Bootstrap 3 - 4</p>
                        </div>

                        {{-- jquery --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jquery/jquery-plain.svg" />
                            <p class="mt-3 mb-0">JQuery</p>
                        </div>

                        {{-- sass --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sass/sass-original.svg" />
                            <p class="mt-3 mb-0">Sass</p>
                        </div>

                        {{-- php --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-plain.svg" />
                            <p class="mt-3 mb-0">PHP</p>
                        </div>

                        {{-- mysql --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" />
                            <p class="mt-3 mb-0">MySQL</p>
                        </div>
                    </div>

                    <div class="mt-5"></div>
                    <p>
                        <strong>MOBILE APP DEVELOPMENT</strong>
                    </p>
                    <div class="row">
                        {{-- ionic --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/ionic/ionic-original.svg" />
                            <p class="mt-3 mb-0">Ionic</p>
                        </div>

                        {{-- angular --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/angularjs/angularjs-original.svg" />
                            <p class="mt-3 mb-0">Ionic Angular</p>
                        </div>

                        {{-- typescript --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg" />
                            <p class="mt-3 mb-0">Typescript</p>
                        </div>

                        {{-- pouch db --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/couchdb/couchdb-original.svg" />
                            <p class="mt-3 mb-0">Pouch DB</p>
                        </div>

                        {{-- sqlite --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sqlite/sqlite-original.svg" />
                            <p class="mt-3 mb-0">SQLite</p>
                        </div>

                    </div>

                    <div class="mt-5"></div>
                    <p>
                        <strong>LINUX / SERVER</strong>
                    </p>
                    <div class="row">
                        {{-- digital ocean --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/digitalocean/digitalocean-original.svg" />
                            <p class="mt-3 mb-0">Digital Ocean</p>
                        </div>

                        {{-- ubuntu --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/ubuntu/ubuntu-plain.svg" />
                            <p class="mt-3 mb-0">Ubuntu</p>
                        </div>

                        {{-- bash --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bash/bash-original.svg" />
                            <p class="mt-3 mb-0">Bash</p>
                        </div>

                        {{-- nginx --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nginx/nginx-original.svg" />
                            <p class="mt-3 mb-0">NGINX</p>
                        </div>
                    </div>

                    <div class="mt-5"></div>
                    <p>
                        <strong>PACKAGES MANAGEMENT</strong>
                    </p>
                    <div class="row">
                        {{-- composer --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/composer/composer-original.svg" />
                            <p class="mt-3 mb-0">Composer</p>
                        </div>

                        {{-- npm --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/npm/npm-original-wordmark.svg" />
                            <p class="mt-3 mb-0">NPM</p>
                        </div>

                        {{-- jira --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jira/jira-original.svg" />
                            <p class="mt-3 mb-0">Jira</p>
                        </div>

                        {{-- git --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" />
                            <p class="mt-3 mb-0">Git</p>
                        </div>
                    </div>

                    <div class="mt-5"></div>
                    <p>
                        <strong>PROJECT MANAGEMENT</strong>
                    </p>
                    <div class="row">
                        {{-- bitbucket --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bitbucket/bitbucket-original.svg" />
                            <p class="mt-3 mb-0">Bitbucket</p>
                        </div>

                        {{-- github --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" />
                            <p class="mt-3 mb-0">Github</p>
                        </div>

                        {{-- vscode --}}
                        <div class="col-3 col-lg-2 text-center">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg" />
                            <p class="mt-3 mb-0">VS Code</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    Logos are attributed from
                    <a href="https://devicon.dev/" target="_blank">
                        <i class="devicon-devicon-plain"></i> https://devicon.dev/
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
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
                                    <a class="btn btn-info btn-sm text-white px-3" href="{{ asset('files/undergrad-certificate.pdf') }}" target="blank">Certificate (Copy)</a>
                                    {{-- <a class="btn btn-secondary btn-sm px-3" data-toggle="popover" data-content="No softcopy version yet. I need to remind myself to scan it">Certificate</a> --}}

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

            <div class="card card-info">
                <div class="card-header">
                    <h5>TRAITS & ABILITIES</h5>
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

            <div class="card card-info">
                <div class="card-header">
                    <h5>STRENGTH & WEAKNESSES</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <strong>TECHNICAL SKILLS</strong>
                            <p>
                                I am confident in my ability to designing the structures, development and deployment.
                                I am also confident in my ability to learn new tech-stack.

                                <br>
                                I am used to self-learning (I do want to have a senior/mentor as guidance)
                            </p>

                            <strong>PASSIONATE</strong>
                            <p>
                                Coding is my passion. I take pride in being good at my job.
                            </p>
                        </div>
                        <div class="col-6 border-left">
                            <strong>COMMUNICATION (INTROVERT)</strong>
                            <p>
                                Some may have a hard time believing, but I am quite an introvert. There's a chance of social anxiety taking over when placed in an unfamiliar place while being unready.
                                Therefore, I'd really like to not be in the position to talk to customers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- devicon logo sets --}}
@push('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
@endpush