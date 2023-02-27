@extends('layouts.master', ['hide_white_header' => true])
@section('title', 'Home')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card card-info">
            <div class="card-header">STUDY</div>
            <div class="card-body">
                {{-- use timeline from CMON here --}}
            </div>
        </div>

        <div class="card card-success">
            <div class="card-header">EXPERIENCE</div>
            <div class="card-body">
                {{-- use timeline from CMON here --}}
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">PROFILE</div>
            <div class="card-body">
                <img src="{{ asset('images/profile.jpg') }}" class="img-thumbnail rounded float-right d-block" alt="Yuzrie Profile" width="200">

                @include('components.form.general.text-w-label', [
                    'name' => 'setting[company_code]',
                    'label' => 'Name',
                    'value' => 'Mohamad Yuzrie Bin Khalid'
                ])

                @include('components.form.general.text-w-label', [
                    'name' => 'setting[company_name]',
                    'label' => 'Phone No',
                    'value' => '+60 13-8008950'
                ])

                @include('components.form.general.date-w-label', [
                    'name' => 'setting[company_no]',
                    'label' => 'Date of Birth',
                    'value' => '07/08/1995',
                ])

                @include('components.form.general.textarea-w-label', [
                    'name' => 'setting[company_address]',
                    'label' => 'Age',
                    'value' => '28'
                ])
            </div>
        </div>
    </div>
</div>
@endsection