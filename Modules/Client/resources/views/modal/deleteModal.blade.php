<!-- Button trigger modal -->

   <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('Delete')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @lang('sure_delete')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
         <form id="formDelete" action="{{ route('client.destroy', $row->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button id='{{$row->id}}' class='btn btn-danger deleteUserBtn'>@lang('Delete') <i class='fa fa-trash'></i></button>
        </form>

        </div>
      </div>
    </div>
  </div>
