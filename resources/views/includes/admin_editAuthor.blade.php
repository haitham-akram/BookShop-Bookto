 <div class="modal hide fade" id="Edit_modal{{$author->id}}" role="dialog" data-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal">
                        Edit Author
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{url('update_author/'.$author->id)}}" method="post" id="Edit_form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" >
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Author Name:</label>
                            <input type="text" id="author_name" name="author_name" class="form-control" value="{{$author->name}}">
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

