@extends('layouts.master')
@section('title', 'Setting')
@section('subheader', 'Setting')
{{-- @section('breadcrumbs', Breadcrumbs::render('invoice')) --}}

@section('content')
{!! Form::open(['url' => route('setting.company-setup.save'), 'multiple' => 'multiple', 'files' => true]) !!}
<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-body">
                <h5>COMPANY INFORMATION</h5>
                @include('components.form.general.text-w-label', [
                    'name' => 'setting[company_code]',
                    'label' => 'Company Code',
                    'value' => $setting['company_code'] ?? ''
                ])

                @include('components.form.general.text-w-label', [
                    'name' => 'setting[company_name]',
                    'label' => 'Company Name',
                    'value' => $setting['company_name'] ?? ''
                ])

                @include('components.form.general.text-w-label', [
                    'name' => 'setting[company_no]',
                    'label' => 'Company No.',
                    'value' => $setting['company_no'] ?? ''
                ])

                @include('components.form.general.textarea-w-label', [
                    'name' => 'setting[company_address]',
                    'label' => 'Company Address',
                    'value' => $setting['company_address'] ?? ''
                ])

                @include('components.form.general.text-w-label', [
                    'name' => 'setting[company_tel_no]',
                    'label' => 'Company Tel No.',
                    'value' => $setting['company_tel_no'] ?? ''
                ])

                @include('components.form.general.text-w-label', [
                    'name' => 'setting[company_fax_no]',
                    'label' => 'Company Fax No.',
                    'value' => $setting['company_fax_no'] ?? ''
                ])

                @include('components.form.general.text-w-label', [
                    'name' => 'setting[company_email]',
                    'label' => 'Company Email',
                    'value' => $setting['company_email'] ?? ''
                ])

                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-4">
                        {!! Form::submit('Save', [ 'class' => 'btn btn-primary px-5']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-5">
        {{-- @include('components.form.general.text-w-label', [
            'name' => 'setting[company_logo]',
            'label' => 'Company Code',
            'value' => $setting['company_logo'] ?? ''
        ]) --}}
    </div>
</div>
{!! Form::close() !!}
@endsection
