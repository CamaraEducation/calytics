function manic_school_search(){
	$('#school').on('keyup', function(){
		var school = $('#school').val();
		var country = $('#country').val();
		var region = $('#region').val();
		
		//post school value to url and get the school id
		$.ajax({
			url: '/school/search/1',
			type: 'POST',
			data: {
				school: school, region: region, country: country
			},
			success: function(data){
				//if school id is returned
				if(data){
					//replce datalist options with the data
					$('#schools').html(data);                        
				}
			}
		});
	});
}

function manic_school_select(){
	$('#school').bind('change', function(){
		var school = $('#school').val();
		var country = $('#country').val();
		var region = $('#region').val();
		
		//post school value to url and get the school id
		if(school != ''){
			$.ajax({
				url: '/school/search/2',
				type: 'POST',
				data: {
					school: school, region: region, country: country
				},
				success: function(data){
					//if school id is returned
					if(data){
						//set manic_pro form action to upload/app/school/{school_id} and visibility to visible
						//$('[name=manic_pro]').attr('action', '/manic/upload/app/'+data);
						//$('#dropzone').css('visibility', 'visible');
						var text = confirm("Are you sure you want to upload data to "+ school +"?");
						if(text == true){
							window.location.href = '/manic/data/add/'+data;
						}else{
							window.location.href = '/manic/data/add';
						}
					}
				}
			});
		}
	});
}


function country_change_listener(){
	$('#country').change(function(){
	//fetch json file from path /assets/data/location.json
		$.getJSON("/assets/data/locations.json", function(data){
			//get the value of the selected option
			var country = $('#country').val();
			//loop through the json file
			$.each(data, function(key, value){
				//if the value of the selected option is equal to the key of the json file
				if(country == key){
					//set the value of the select dropdown with id region to the value of the json file
					$('#region').empty()
					$('#region').append('<option value="" hidden>Select Region/County</option>');
					$.each(value, function(key, value){
						$('#region').append('<option value="'+value+'">'+value+'</option>');
					});
				}
			});
		});
	});
}

// if input[name=ownership] is selected, uncheck the selected
function ownership_select(){
	$('input[name=ownership]').on('click', function() {
		if ($(this).is(':checked')) {
			$('input[name=ownership]:checked').not(this).prop('checked', false);
		}
	});
}

function add_new_school(){
	$('#submit').click(function(){
		var country = $('#country').val();
		var region = $('#region').val();
		var level = $('input[name="level[]"]:checked').map(function(){
			return $(this).val();
		}).get();
		var type = $('input[name="ownership"]:checked').val();
		var school = $('#school').val();
		if(country == ''){
			alert('Please select country');
			return false;
		}
		if(region == ''){
			alert('Please select region');
			return false;
		}
		if(level.length == 0){
			alert('Please select school level');
			return false;
		}
		if(type == ''){
			alert('Please select school type');
			return false;
		}
		if(school == ''){
			alert('Please enter school name');
			return false;
		}
		
		$.ajax({
			url: '/school/add/new',
			type: 'POST',
			data: {
				country: country,
				region: region,
				level: level,
				type: type,
				school: school
			},
			success: function(data){
				if(data == 'success'){
					var text = confirm('School Added Successfully, Do you want to add another school?');
					if(text == true){
						$('#country').val('');
						$('#region').val('');
						$('input[name="level[]"]').prop('checked', false);
						$('input[name="ownership"]').prop('checked', false);
						$('#school').val('');
					}else{
						window.location.href = '/school/list';
					}
				}else{
					alert(data);
				}
			},
			error: function(data){
				alert(data.responseText);
			}
		});
	});
}
