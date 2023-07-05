@props(['campaign'=>$campaign])
<form class="row g-3" action="{{route('donation.start')}}" method="POST" id="donateform">
    @method('POST')
    @csrf
    <input type="hidden" name="campaign_id" value="{{$campaign->id}}">

    <div class="row">
        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Full Names</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="inputEmail4" >
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Telephone Number</label>
            <input type="tel" name="telephone" class="form-control" id="tel" >
        </div>
    </div>
    <div class="col-12">
        <label for="inputAddress" class="form-label">Amount(FCFA)</label>
        <input type="number" name="amount" class="form-control" id="inputAddress" placeholder="">
    </div>
    <div class="col-12">
        <label for="pay" class="form-label">Payment Method</label>
        <select class="form-select form-select-lg" name="provider" id="pay">
            <option selected>Select one</option>
            <option value="momo">Mobile Money</option>
            <option value="physical">Cash In Hand</option>
        </select>
    </div>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="anon">
            <label class="form-check-label" for="anon">
                Make Anonymous Payment
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" required>
            <label class="form-check-label" for="gridCheck">
                By Submiting you agree to our terms and conditions on donation
            </label>
        </div>
    </div>
    <div class="col-12">
        <button id="donate" type="submit" class="btn btn-success w-100 h3"> <i class="fas fa-donate"></i> Donate
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
