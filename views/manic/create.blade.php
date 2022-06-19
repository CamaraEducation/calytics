@extends('layout.app')
@section('title', 'Upload DataSheets')
@section('menu', 'track')
@section('submenu', 'upload')
@section('styles')
    @css('/assets/vendor/dropzone/dropzone.min')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Upload Manic Time Data Sheets</div>
                    </div>
                    <div class="card-body">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div id="dropzone">
                                <form action="/manic/upload/apps/{{$id}}" name="manic_pro" class="dropzone needsclick dz-clickable" id="manic_apps">

                                    <div class="dz-message needsclick">
                                        <button type="button" class="dz-button">Drop files here or click to upload.</button><br>
                                        <span class="note needsclick">Upload Data for <b class="text-danger">{{SchoolController::name($id)}}</b></span>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @js('/assets/vendor/dropzone/dropzone.min.js')
@endsection