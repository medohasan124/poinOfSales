<!-- Button trigger modal -->

   <!-- Modal -->
   <div class="modal fade" id="addcatigory" tabindex="-1" role="dialog" aria-labelledby="addcatigoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addcatigoryLabel">@lang('addCatigory')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p class='text text-danger errorpar'></p>
            <form id='myForm'>
                {{ csrf_field() }}
                <div class='row'>
                    <div class='col-4'>
                        <label>@lang('Name')</label>
                        <input type='text' required placeholder='name' value='{{old('name')}}' name='name' id='cat_name' class='form-control'>
                    </div>
                    <div class='col-4'>
                        <label>@lang('Name_en')</label>
                        <input type='text' required placeholder='name_en' value='{{old('name_en')}}' id='cat_name_en' name='name_en' class='form-control'>
                    </div>


                     <div class='col-12 mt-4'>
                        <button  class='btn btn-success form-control sendData'>@lang('Add') <i class='fa fa-tags'></i></button>
                    </div>
                </div>

            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>


        </div>
      </div>
    </div>
  </div>


@push('js')


<script>



$(document).ready(function() {
   $('.sendData').on('click' ,function(event) {
     event.preventDefault(); // Prevent the form from submitting normally
     $('.errorpar').text(''); // to remove error data
     var formData = $('#myForm').serialize();

     // Send the AJAX request
     $.ajax({
       url: '{{route("catigory.store")}}',
       method: 'POST',
       data: formData,
       success: function(response) {
         console.log('good')
         $('.modal').modal('hide');
         var catName = $('#cat_name').val();
         $('#cat_name').val('');
         $('#cat_name_en').val('');
         $('.errorpar').text(''); // to remove error data

         var lastId = $('.selectCatigory option:last').attr('value');
        var lastIdplus  = parseInt(lastId) + 1 ;
         var element =`<option value='${lastIdplus}'>${catName}</option>` ;
         $('.selectCatigory').append(element);


        console.log(element);
       },
       error: function(xhr, status, error) {
         //$('.error').val=''

        respond = xhr.responseJSON.message ;
        $('.errorpar').text(respond);

       }
     });

   });
 });
</script>
@endpush
