@extends('layout.app')
@section('menu', 'mngt')
@section('submenu', 'addSchool')
@section('content')
			
	<div class="content-wrapper">

		<div class="row gutters">
			<div class="col-xl-12">
				<!-- Card start -->
				<div class="card">
					<div class="card-header">
						<div class="card-title">Add a School</div>
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

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="field-wrapper">
                                                <div class="checkbox-container">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="level[]" type="checkbox" id="primary" value="Primary">
                                                        <label class="form-check-label" for="primary">Primary</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="level[]" type="checkbox" id="secondary" value="Secondary">
                                                        <label class="form-check-label" for="secondary">Secondary</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="level[]" type="checkbox" id="college" value="College">
                                                        <label class="form-check-label" for="college">College</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="level[]" type="checkbox" id="hub" value="College">
                                                        <label class="form-check-label" for="hub">Training Hub</label>
                                                    </div>
                                                    <div class="field-placeholder">School Levels</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="field-wrapper">
                                                <div class="checkbox-container">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="ownership" type="checkbox" id="public" value="public">
                                                        <label class="form-check-label" for="ownership">Public</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="ownership" type="checkbox" id="private" value="private">
                                                        <label class="form-check-label" for="ownership">Private</label>
                                                    </div>
                                                    <div class="field-placeholder">School Ownership</div>
                                                </div>
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

                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-primary col-md-3" type="button" id="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection
@section('scripts')
@js('/assets/js/school.js')
<script>
    country_change_listener();
    ownership_select();
    add_new_school();
</script>
@endsection