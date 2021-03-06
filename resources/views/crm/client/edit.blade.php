@extends('layouts.base')

@section('caption', 'Edit client')

@section('title', 'Edit client')

@section('lyric', '')

@section('content')
    @if(session()->has('message_success'))
        <div class="alert alert-success">
            <strong>Well done!</strong> {{ session()->get('message_success') }}
        </div>
    @elseif(session()->has('message_danger'))
        <div class="alert alert-danger">
            <strong>Danger!</strong> {{ session()->get('message_danger') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Form::model($clientDetails, ['route' => ['processUpdateClient', $clientDetails->id], 'method' => 'PUT']) }}
                            <div class="form-group input-row">
                                {{ Form::label('full_name', 'Full name') }}
                                {{ Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('phone', 'Phone') }}
                                {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('budget', 'Budget') }}
                                {{ Form::text('budget', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('location', 'Location') }}
                                {{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group input-row">
                                {{ Form::label('email', 'Emial address') }}
                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('priority', 'Priority') }}
                                {{ Form::select('priority', [1, 2, 3], null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('section', 'Section') }}
                                {{ Form::select('section', ['transport' => 'transport', 'logistic' => 'logistic', 'finances' => 'finances'], null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('zip', 'Zip') }}
                                {{ Form::text('zip', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('city', 'City') }}
                                {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>
                            <div class="form-group input-row">
                                {{ Form::label('country', 'Country') }}
                                {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => App\Traits\Language::getMessage('messages.InputText')]) }}
                            </div>

                        </div>
                        <div class="col-lg-12 validate_form">
                            {{ Form::submit('Edit client', ['class' => 'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
