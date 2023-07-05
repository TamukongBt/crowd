<form class="row g-3 mt-5" action="{{ route('request.store') }}" method="POST" id="donateform"
    class="p-4 p-md-5 border rounded-3 bg-body-tertiary" enctype="multipart/form-data">

    @method('POST')
    @csrf
    <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
    @error('error')
        {{ $error }}
    @enderror
    @if ($errors->any())
        <div class="alert  text-light alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Campaign Title</label>
        <input type="text" name="name" class="form-control" id="name">
        @error('name')
            <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="link" class="form-label">Link</label>
        <input type="text" name="link" class="form-control" id="link" placeholder="">
        @error('link')
            <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Goal(FCFA)</label>
        <input type="number" name="goal" class="form-control" id="goal">
        @error('amount')
            <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea type="text" name="description" class="form-control" id="description"></textarea>
        @error('description')
            <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-12 ">
        <label for="" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" id="image" placeholder="Drop an image here"
            aria-describedby="fileHelpId">
        @error('image')
            <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" required>
            <label class="form-check-label small" for="gridCheck">
                By Submiting you agree to our terms and conditions on proceeds of each campaign
            </label>
        </div>
    </div>
    <div class="col-12">
        <button id="donate" type="submit" class="btn btn-success w-100 h3"> Make Request
        </button>
    </div>

</form>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#anon').click(function() {
                if ($(this).is(':checked')) {
                    $('#inputEmail4').val('anon@mail.com');
                    $('#name').val('Anonymous');
                    $('#tel').val('60000000');
                } else {
                    $('#inputEmail4').attr('disabled', false);
                    $('#name').attr('disabled', false);
                    $('#tel').attr('disabled', false);
                    $('#inputEmail4').val('');
                    $('#name').val('');
                    $('#tel').val('');
                }
            });
        });

        // $('#donateform').submit(function(e) {
        //     alert('im hit call help')
        //     e.preventDefault();
        //     var form = $(this);
        //     var url = form.attr('action');
        //     var method = form.attr('method');
        //     console.log(url);
        //     var data = form.serialize();
        //     axios({
        //             method: method,
        //             url: url,
        //             data: data
        //         })
        //         .then(function(response) {
        //             console.log(response);
        //             if (response.data.status == 'success') {
        //                 Swal.fire({
        //                     icon: 'success',
        //                     title: 'Success',
        //                     text: response.data.message,
        //                     timer: 3000
        //                 });
        //                 $('#donate').trigger('reset');
        //             } else {
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Oops...',
        //                     text: response.data.message,
        //                     timer: 3000
        //                 });
        //             }
        //         })
        //         .catch(function(error) {
        //             console.log(error);
        //         });
        // });
    </script>
@endpush
