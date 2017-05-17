@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-6">
		<h2>Feeds</h2>
		<ul class="list-group"></ul>
	</div>
</div>
@endsection

@section('scripts')
<script>

function addToList(data, append = true) {
	var row = '';
	row += '<li class="list-group-item" id="row-' + data.id + '" style="display:none">';
	row += '  <h4 class="list-group-item-heading">' + data.feed_title + '</h4>';
	row += '  <p class="list-group-item-text">Posted by ' + data.nickname + '</p>';
	row += '  <p class="list-group-item-text text-primary">' + data.created_at_formatted + '</p>';
	row += '</li>';
		
		
	if (append) {
		$('.list-group').append(row);
	}	
	else {
		$('.list-group').prepend(row);
	}

	$('#row-' + data.id).slideToggle('slow');
}

$(document).ready(function() {
	axios.get('/api/feed')
	.then(function(response){
        console.log(response.data);

        if (response.data) {
        	var data = response.data;

        	$('#report-count').html(data.length + ' item(s) found')
        	data.forEach(function(item, index) {
        		
        		// add delay between item
        		setTimeout(function() {
        			addToList(item)

        		}, 500 * index);
        	})
        }
    })
	.catch(function (error) {
        // debug
        console.log(error);

        if (error.response) {
            // bad request form
            console.log(error.response.status);
            console.log(error.response.data);
        }
    });
})

</script>
@endsection
