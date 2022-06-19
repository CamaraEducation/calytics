@extends('layout.app')
@section('title', 'Manic Schools')
@section('menu', 'mngt')
@section('submenu', 'listSchool')
@section('content')
			
	<div class="content-wrapper">

		<div class="row gutters">
			<div class="col-xl-12">
				<!-- Card start -->
				<div class="card">
					<div class="card-header">
						<div class="card-title text-primary">School List</div>
					</div>

					@php $schools = SchoolController::fetch_all(); $i=1; @endphp

					<div class="card-body">
						<table class="table table-bordered table-striped">
							<thead class="thead-light">
								<tr class="text-center">
									<th>#</th>
									<th>Name</th>
									<th>Country</th>
									<th>Region</th>
									<th>Ownership</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($schools as $school)
								<tr>
									<td>{{$i}}</td>
									<td>{{$school['sc_name']}}</td>
									<td>{{$school['sc_country']}}</td>
									<td>{{$school['sc_region']}}</td>
									<td>{{$school['sc_ownership']}}</td>
									<td class="text-center">
                                        <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="bottom"
											data-bs-original-title="Brief Stat" class='btoggle' data-target="{{$school['id']}}">
											<i class="icon-arrow-down-circle"></i>
										</a> &NonBreakingSpace;
										<a href="/manic/school/{{$school['id']}}" data-bs-toggle="tooltip" data-bs-placement="bottom" 
											data-bs-original-title="Full Overview">
											<i class="icon-log-in"></i>
										</a>
									</td>
								</tr>
                                <tr style="display:none" class="dtoggle" data-value="{{$school['id']}}">
                                    <td colspan='6' id="{{$school['id']}}">
                                        <div class="col-md-12 text-center">
                                            <div class="spinner-border" role="status">
												<span class="visually-hidden">Loading...</span>
											</div>
                                        </div>
                                    </td>   
                                </tr>@php $i++ @endphp						
								@endforeach								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection
@section('scripts')
@js('https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js')
@js('/assets/js/chart.js')

<script type="text/javascript">
    $('.btoggle').click(function(){
        var target = $(this).data('target');
        $('tr[data-value="'+target+'"]').slideToggle("slow", function(){
            //if target icon is arrow down, change to arrow up and viceversa
            if($('tr[data-value="'+target+'"]').css('display') == 'none'){
                $('a[data-target="'+target+'"]').html('<i class="icon-arrow-down-circle"></i>');
                $('#'+target).html('<div class="col-md-12 text-center"> <div class="spinner-border" role="status"> <span class="visually-hidden">Loading...</span> </div> </div>');
            }else{
                $('a[data-target="'+target+'"]').html('<i class="icon-arrow-up-circle"></i>');
                $('tr[data-value]').each(function(){
                    if($(this).data('value') != target){
                        $(this).slideUp("slow");
                        $(this).html('<td colspan="6" id="'+$(this).data('value')+'"><div class="col-md-12 text-center"> <div class="spinner-border" role="status"> <span class="visually-hidden">Loading...</span> </div> </div></td>');
                    }
                });
                getBrief();
            }
        });

        //send an ajax get request to /manic/data/brief/{id}
        function getBrief(){
            $.ajax({
                url: '/manic/data/brief/'+target,
                type: 'GET',
                success: function(data){
                    $('#'+target).html(data);
                }
            });
        }
    });
</script>
@endsection