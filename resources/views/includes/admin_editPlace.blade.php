<div class="modal fade" id="Edit_modal{{$place->id}}" role="dialog" data-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal">
                    Edit Publishing Place
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{url('update_place/'.$place->id)}}" method="post" id="Edit_form">
                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                <div class="modal-body">
                    <div class="form-group">
                        <label>Place name:</label>
                        <input type="text" id="Place_name" name="Place_name" class="form-control" value="{{$place->name}}">
                        <label>Shop name:</label>
                        <input type="text" id="Shop_name" name="Shop_name" class="form-control" value="{{$place->shop_name}}">
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
