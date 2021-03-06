{{--
    * ausbilder.org - the free course management and planning software.
    * Copyright (C) 2020 Holger Schmermbeck & others (see the AUTHORS file)
    *
    * This program is free software: you can redistribute it and/or modify
    * it under the terms of the GNU Affero General Public License as published
    * by the Free Software Foundation, either version 3 of the License, or
    * (at your option) any later version.
    *
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU Affero General Public License for more details.
    *
    * You should have received a copy of the GNU Affero General Public License
    * along with this program.  If not, see <https://www.gnu.org/licenses/>.
--}}

@extends('layouts.frontend')

@section('title', 'ausbilder.org')
@section('site_title', 'ausbilder.org')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">ausbilder.org</a></li>
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title m-0"><strong>{{ __('the free course management and planning software') }}</strong></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ __("please enter the following data") }}</p>
                    </div>
                </div>

                @include('layouts.error')

                <form method="post" action="{{ route('event.validate') }}">
                    @csrf
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <fieldset>
                                <!-- Name input-->
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label for="first_name" class="col-form-label form-group-horizontal">
                                            Vorname
                                        </label>
                                        <div class="input-group input-group-prepend">
                                                        <span class="input-group-text border-right-0 rounded-left">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                            <input type="text" class="form-control form_lay_input1" id="first_name" name="first_name" placeholder="Vorname" value="{{ old('firstname') ?? ucfirst(session('firstname')) }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label for="last_name" class="col-form-label form-group-horizontal">
                                            Nachname
                                        </label>
                                        <div class="input-group input-group-prepend">
                                            <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Nachname" value="{{ old('lastname') ?? ucfirst(session('lastname')) }}" required>
                                            <span class="input-group-text border-left-0 rounded-right">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label for="date_of_birth" class="col-form-label form-group-horizontal">
                                            Geburtsdatum
                                        </label>
                                        <div class="input-group input-group-prepend">
                                                        <span class="input-group-text border-right-0 rounded-left">
                                                            <i class="fas fa-birthday-cake"></i>
                                                        </span>
                                            <input type="text" class="form-control" placeholder="tt.mm.jjjj"
                                                   data-date-format="dd.mm.yyyy" id="dp2" name="date_of_birth" value="{{ old('date_of_birth') ?? \Carbon\Carbon::parse(session('date_of_birth'))->format('d.m.Y') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="left_align custom-controls-stacked">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="approval" {{ old('approval') ? ' checked' : '' }} value="1" required>
                                                <span class="custom-control-label custom_checkbox_success"></span>
                                                <span class="custom-control-description text-success">Ich bin einverstanden, dass die erhobenen Daten für die Lehrgangsdokumentation erfasst werden und zur Erstellung der Teilnahmebescheinigung dienen.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-11">
                                        <button class="btn btn-success button-rounded" type="submit">Weiter</button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div><!-- /.card -->
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
