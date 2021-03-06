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

@extends('layouts.backend')

@section('title', __('edit company'))
@section('site_title', __('edit company'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">ausbilder.org</a></li>
    <li class="breadcrumb-item">{{ __('Company') }}</li>
    <li class="breadcrumb-item active">{{ __('edit') }}</li>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('edit company') }}</h3>
                        </div>
                    @include('layouts.error')
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('company.put', ['company' => \Vinkla\Hashids\Facades\Hashids::encode(session('company_id'))]) }}"
                              method="post"
                              onsubmit="submit.disabled = true; submit.innerText='{{ __('saving') }}…'; return true;"
                              role="form">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputCompanyName">{{ __('Company name') }}</label>
                                    <input class="form-control" id="inputCompanyName" name="name"
                                           placeholder="{{ __('Company name') }}"
                                           required type="text" value="{{ old('name') ?? $company->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputCompanyNameSuffix">{{ __('Company name suffix') }}</label>
                                    <input class="form-control" id="inputCompanyNameSuffix" name="name_suffix"
                                           placeholder="{{ __('Company name suffix') }}" type="text"
                                           value="{{ old('name_suffix') ?? $company->name_suffix }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputStreet">{{ __('street') }}</label>
                                    <input class="form-control" id="inputStreet" name="street" placeholder="{{ __('street') }}"
                                           required type="text" value="{{ old('street') ?? $company->street }}">
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="inputZipcode">{{ __('zipcode') }}</label>
                                        <input class="form-control" id="inputZipcode" name="zipcode"
                                               placeholder="{{ __('zipcode') }}"
                                               required type="text"
                                               value="{{ old('zipcode') ?? $company->zipcode }}">
                                    </div>
                                    <div class="form-group col-9">
                                        <label for="inputLocation">{{ __('location') }}</label>
                                        <input class="form-control" id="inputLocation" name="location" placeholder="{{ __('location') }}"
                                               required type="text"
                                               value="{{ old('location') ?? $company->location }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="inputEMail">{{ __('contact e-mail') }}</label>
                                        <input class="form-control" id="inputEMail" name="email" placeholder="{{ __('contact e-mail') }}"
                                               type="email"
                                               value="{{ old('email') ?? $company->email }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="inputTerms">{{ __('terms of business (optional)') }}</label>
                                        <input class="form-control" id="inputTerms" name="terms" placeholder="{{ __('terms of business (optional)') }}"
                                               type="url"
                                               value="{{ old('terms') ?? $company->terms }}">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="inputCpolicy">{{ __('cancellation policy (optional)') }}</label>
                                        <input class="form-control" id="inputCpolicy" name="cpolicy"
                                               placeholder="{{ __('cancellation policy (optional)') }}"
                                               type="url"
                                               value="{{ old('cpolicy') ?? $company->cpolicy }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="inputDoctor">{{ __('responsible doctor') }}</label>
                                        <input class="form-control" id="inputDoctor" name="doctor"
                                               placeholder="{{ __('responsible doctor') }}"
                                               type="text"
                                               value="{{ old('doctor') ?? $company->doctor }}">
                                    </div>
                                    <div class="form-group col-6">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="inputReference">{{ __('QSEH reference (optional)') }}</label>
                                        <input class="form-control" id="inputReference" name="reference"
                                               placeholder="{{ __('QSEH reference (optional)') }}"
                                               type="text"
                                               value="{{ old('reference') ?? $company->reference }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputQsehPassword">{{ __('qseh password (optional)') }}</label>
                                        <input class="form-control" id="inputQsehPassword" name="qseh_password"
                                               placeholder="{{ __('qseh password (optional)') }}"
                                               type="password"
                                               value="{{ ($company->qseh_password ? 'password-saved' : '') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button class="btn btn-primary" name="submit" type="submit">{{ __('edit') }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection