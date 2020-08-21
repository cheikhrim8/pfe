@if (session($key ?? 'status'))
    <div class="alert alert-success position-absolute justify-content-center"
         id="alert-success" role="alert">
        {{ session($key ?? 'status') }}
    </div>
@endif

<style>
    #alert-success{
        right: 30%;
        left: 30%;
        top: 5%
    }

    @media all and (max-width: 992px) {
        #alert-success{
            right: 10%;
            left: 10%;
            top: 5%;
        }
    }
</style>
