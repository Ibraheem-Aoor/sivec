@extends('layouts.admin.master')
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <style>
        .avatar-picture {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .avatar-picture .image-input {
            position: relative;
            display: inline-block;
            border-radius: 50%;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .avatar-picture .image-input .image-input-wrapper {
            border: 3px solid #fff;
            background-image: url("");
            width: 200px;
            height: 200px;
            /* border-radius: 50%; */
            background-repeat: no-repeat;
            background-size: contain !important;
        }

        .avatar-picture .image-input .btn {
            height: 24px;
            width: 24px;
            border-radius: 50%;
            cursor: pointer;
            position: absolute;
            left: 3px;
            bottom: -9px;
            background-color: #FFFFFF;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding: 0;
            -webkit-filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.16));
            filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.16));
        }

        .avatar-picture .image-input .btn img {
            position: relative;
            top: -2px;
        }

        .avatar-picture .image-input .btn:hover {
            background-color: var(--main-color);
        }

        .avatar-picture .image-input .btn:hover img {
            -webkit-filter: invert(1) brightness(10);
            filter: invert(1) brightness(10);
        }

        .avatar-picture .image-input .btn input {
            width: 0 !important;
            height: 0 !important;
            overflow: hidden;
            opacity: 0;
            display: none;
        }

        th,
        td {
            font-size: 14px !important;
        }
    </style>
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.page_header', ['page_title_1' => __('custom.dashboard.settings') , 'page_title_2' => __('custom.dashboard.general')])
        <!-- Main content -->
        <section class="content" enc>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="card-title">{{ __('custom.dashboard.general_settings') }}</h3>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <form action="{{ route('admin.settings.general.update') }}" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.main_address') }}</label>
                                    <input type="text" name="main_address" class="form-control"
                                        value="{{ @$general_settings['main_address'] }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.phone_number') }}</label>
                                    <input type="text" name="phone_number" class="form-control"
                                        value="{{ @$general_settings['phone_number'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.phone_2') }}</label>
                                    <input type="text" name="phone_number_2" class="form-control"
                                    value="{{ @$general_settings['phone_number_2'] }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.whatsaap_number') }}</label>
                                    <input type="text" name="whatsaap_number" class="form-control"
                                        value="{{ @$general_settings['whatsaap_number'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">{{ __('custom.company_email') }}</label>
                                    <input type="text" name="company_email" class="form-control"
                                        value="{{ @$general_settings['company_email'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">{{ __('custom.short_description') }}</label>
                                    <input type="text" name="short_description" class="form-control"
                                        value="{{ @$general_settings['short_description'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.facebook') }}</label>
                                    <input type="text" name="facebook" class="form-control"
                                        value="{{ @$general_settings['facebook'] }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.instagram') }}</label>
                                    <input type="text" name="instagram" class="form-control"
                                        value="{{ @$general_settings['instagram'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.twitter') }}</label>
                                    <input type="text" name="twitter" class="form-control"
                                        value="{{ @$general_settings['twitter'] }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.linked_in') }}</label>
                                    <input type="text" name="linked_in" class="form-control"
                                        value="{{ @$general_settings['linked_in'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.snapchat') }}</label>
                                    <input type="text" name="snapchat" class="form-control"
                                        value="{{ @$general_settings['snapchat'] }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.youtube') }}</label>
                                    <input type="text" name="youtube" class="form-control"
                                        value="{{ @$general_settings['youtube'] }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.tiktok') }}</label>
                                    <input type="text" name="tiktok" class="form-control"
                                        value="{{ @$general_settings['tiktok'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-success">{{ __('custom.submit') }}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.card-body -->
    </div>
    </section>
    <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
