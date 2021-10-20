<div class="modal fade" id="Edit_modal{{$category->id}}" role="dialog" data-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal">
                    Edit Category
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{url('admin_update_Category/'.$category->id)}}" method="post" id="Edit_form">
                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                <div class="modal-body">
                    <div class="form-group">
                        <label>Category Type:</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" value="{{$category->name}}">
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
