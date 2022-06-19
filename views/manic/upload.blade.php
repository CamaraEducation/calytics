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
                        
                        <div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="card">
                                    <div class="row gutters">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="field-wrapper">
                                                <div class="input-group">
                                                    <select name="country" id="country" class="form-control">
                                                        <option value="" hidden>Select Country</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Tanzania">Tanzania</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="zambia">Zambia</option>
                                                    </select>
                                                    <span class="input-group-text">
                                                        <i class="icon-map-pin"></i>
                                                    </span>
                                                </div>
                                                <div class="field-placeholder">Country<span class="text-danger">*</span></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="field-wrapper">
                                                <div class="input-group">
                                                    <select name="region" id="region" class="form-control">
                                                        <option value="" hidden>Select Region/county</option>
                                                    </select>
                                                    <span class="input-group-text">
                                                        <i class="icon-map-pin"></i>
                                                    </span>
                                                </div>
                                                <div class="field-placeholder">Region <span class="text-danger">*</span></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="field-wrapper">
                                                <div class="input-group">
                                                    <input class="form-control" name="school" id="school" type="text" list="schools" placeholder="school name">
                                                    <datalist id="schools">
                                                        
                                                    </datalist>
                                                    <span class="input-group-text">
                                                        <i class="icon-location"></i>
                                                    </span>
                                                </div>
                                                <div class="field-placeholder">School Name</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="visibility: hidden">
                            <div id="dropzone">
                                <form action="#" name="manic_pro" class="dropzone needsclick dz-clickable" id="demo-upload">

                                    <div class="dz-message needsclick">
                                        <button type="button" class="dz-button">Drop files here or click to upload.</button><br>
                                        <span class="note needsclick">Drop or Select the Manic Time Data sheets to Upload</span>
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
@js('/assets/js/school.js')
<script>
    manic_school_search();
    manic_school_select();
    country_change_listener();
</script>
@endsection