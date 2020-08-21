<div class="alert alert-{{$type}} position-absolute text-center"
     id="alert-success" role="alert">
    {{ $message }}
</div>

<style>
    #alert-success {
        right: 30%;
        left: 30%;
        top: 0;
    }

    @media all and (max-width: 992px) {
        #alert-success {
            right: 10%;
            left: 10%;
            top: 5%;

        }
    }
</style>

@push('js')

    <script>
        $("#alert-success").fadeTo(2000, 500).slideUp(2000, function () {
            $("#alert-success").slideUp(2000);
        });
    </script>

@endpush

