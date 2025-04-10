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
        @include('admin.partials.page_header', ['page_title_1' => __('custom.dashboard.pages') , 'page_title_2' => __('custom.dashboard.branches')])

        <!-- Main content -->
        <section class="content" enc>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="card-title">{{ __('custom.dashboard.branches_page_settings') }}</h3>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <form action="{{ route('admin.page.branches.update') }}" method="POST">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <div>
                                    <button type="button" class="add_address btn-xl btn-outline-primary"
                                        onclick="addNewAddress($(this));"><i class="fa fa-plus"></i>
                                        {{ __('custom.new_address') }}</button>
                                </div>
                            </div>
                        </div>
                        @foreach ($addresses as $address)
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">{{ __('custom.address_title_ar') }}</label>
                                        <input required type="text" name="ar[address_titles][]" value="{{$address['title_ar']}}" class="form-control"> &nbsp;
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">{{ __('custom.address_title_ar') }}</label>
                                        <input required type="text" name="en[address_titles][]" value="{{$address['title_en']}}" class="form-control"> &nbsp;
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">{{ __('custom.address_value') }}</label>
                                    <div class="form-group d-flex">
                                        <input required type="text" name="address_values[]" value="{{$address['value']}}" class="form-control"> &nbsp;
                                        <button type="button" class="add_address btn-xs btn-primary"
                                            onclick="addNewAddress($(this));"><i class="fa fa-plus"></i></button>&nbsp;
                                        <button class="btn-xs btn-danger" onclick="deleteAddress($(this));"><i
                                                class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn-xl btn-success">{{ __('custom.submit') }}</button>
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

    @include('admin.client.client-create-update-modal')
@endsection




@push('js')
    <script>
        function addNewAddress(btn) {
            var html = `<div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">{{ __('custom.address_title_ar') }}</label>
                                <input required type="text" name="ar[address_titles][]" class="form-control"> &nbsp;
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">{{ __('custom.address_title_en') }}</label>
                                <input required type="text" name="en[address_titles][]" class="form-control"> &nbsp;
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="">{{ __('custom.address_value') }}</label>
                            <div class="form-group d-flex">
                                <input required type="text" name="address_values[]" class="form-control"> &nbsp;
                                <button type="button" class="add_address btn-xs btn-primary"
                                onclick="addNewAddress($(this));"><i class="fa fa-plus"></i></button>&nbsp;
                                <button class="btn-xs btn-danger" onclick="deleteAddress($(this));"><i
                                        class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>`;
            btn.parent().parent().parent().after(html);
        };

        function deleteAddress(btn) {
            btn.parent().parent().parent().remove();
        };
    </script>
@endpush
