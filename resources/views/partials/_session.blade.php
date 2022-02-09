@if (session('success'))

    {{--<script>
        $.notify({
            // options
            message: "{{session('success')}}"
           // icon: 'fa fa-check-circle'
        },{
            // settings
            type: 'success',
            placement: {
                from: "top",
                align: "center"
            },
            allow_dismiss: false
        });


    </script>--}}

    <div class="alert alert-success alert-dismissible" >
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('success') }}
    </div>


@endif

{{--@if (session('success_modal'))

    <script>
        $.notify({
            // options
            message: "{{session('success_modal')}}"
            // icon: 'fa fa-check-circle'
        },{
            // settings
            type: 'success',
            placement: {
                from: "top",
                align: "center"
            },
            allow_dismiss: false
        });


    </script>

@endif--}}


@if (session('error'))

    {{--<script>
        $.notify({
            // options
            message: "{{session('error')}}"
            // icon: 'fa fa-check-circle'
        },{
            // settings
            type: 'danger',
            placement: {
                from: "top",
                align: "center"
            },
            allow_dismiss: false
        });


    </script>--}}

    <div class="alert alert-danger alert-dismissible" >
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('error')}}
    </div>

@endif