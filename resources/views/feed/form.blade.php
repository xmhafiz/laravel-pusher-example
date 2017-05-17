@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- put contents in panel -->
        <h2 class="text-primary"><span class="glyphicon glyphicon-bullhorn"></span> Post Here!</h2>
        <span class="text-danger"><ul id="error-messages"></ul></span>
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{ route('feed.store') }}">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-8">
                            <input type="text" name="feed_title" class="form-control" placeholder="What happenend?" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nickname</label>
                        <div class="col-sm-4">
                            <input type="text" name="nickname" class="form-control" placeholder="i.e John, Smith, etc." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <button id="submit-button" type="submit" class="btn btn-primary">Submit Now</button>
                        </div>
                    </div>
                    <div class="alert alert-success" style="display:none">
                        <strong>Done!</strong> Your message has been successfully added.
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>

// processing submission
$(document).ready(function() {
    $('form').on('submit', function(e) {
        e.preventDefault()

        // clear state
        $('#error-messages').empty();
        $('#submit-button').button('loading');

        // get submit url
        var url = $(this).attr('action');

        // setup form data
        var formData = new FormData(this);
        console.log('saving..');

        // send post
        axios.post(url, formData)
        .then(function(response){
            // when success
            $('.alert-success').show();

            // reset form
            // $('form')[0].reset();

            // remove loading
            $('#submit-button').button('reset');
            // debug
            console.log('saved successful');
        })
        .catch(function (error) {
            // debug
            console.log(error);

            // remove loading
            $('#submit-button').button('reset');

            if (error.response) {
                // bad request form
                if (error.response.status == 422) {
                    var errors = error.response.data;

                    $(errors).each(function(i, row) {
                        $('#error-messages').append('<li>' + row + '</li>');
                    });
                }
            }
        });
    })

    // hide success and error message on editing 
    $(document).on("click","input[type='text']", function(){             
        $('#error-messages').empty();
        $('.alert-success').hide();
    });
})


</script>

@endsection
