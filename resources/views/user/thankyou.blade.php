@extends('layouts.master-without-nav')

@section('content')
    
    <style>
        .wizard .steps>ul {
            opacity: 0;
        }

        .steps .clearfix {
            opacity: 0;
        }
    </style>
    <section class="section pt-4" id="about">
        <div class="container card text-center">
            <h1 class="display-3 text-success">Thank You !</h1>
            <hr>
           
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="{{ route('user.register.create') }}" role="button">Continue to
                    Register</a>
            </p>
        </div>
    </section>
    <!-- about section end -->
@endsection
@section('script')
    <!-- validation init -->
    <script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>

    <script src="{{ URL::asset('assets/js/pages/form-repeater.int.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>
    <!-- form wizard init -->
    <script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        var form = $("#contact");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            rules: {
                mobile_no: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                ref_number: {
                    required: false,
                    number: true
                }
            }
        });
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function(event, currentIndex, newIndex) {
                // console.log('newIndex', currentIndex)
                if (currentIndex == 0 && !$('#entry_type').val()) {
                    $('.actions').hide();
                }
                if (currentIndex < newIndex) {

                    form.validate().settings.ignore = ":disabled,:hidden";
                    // return form.valid();
                    var validation = form.valid()
                    if (validation) {
                        return true;
                    } else {
                        $('.actions').show();
                        return false;
                    }
                }
                return true;
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                var validation = form.valid()
                if (validation) {
                    ajaRequest(form);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'User Registred Successsfully'
                    });
                    return true;

                } else {
                    $('.actions').show();
                    return false
                }
            },
            onFinished: function(event, currentIndex) {
                window.location = form.attr("redirect");
            }
        });

        function ajaRequest(form) {
            let form_data = $('#contact')[0];
            form_data = new FormData(form_data);
            $.ajax({
                type: 'POST',
                url: '{{ route('user.register.store') }}',
                data: form_data,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    if (res.success) {
                        // console.log(res)
                        $('#updateRecord').val(res.data);
                    }
                    // console.log("res",res);
                },
                error: function() {
                    console.log("Signup was unsuccessful");
                }
            });
        }
        $("[name=entry_as]").click(function() {
            $('.toHide').hide();
            $('.actions').show();
            // console.log($("#entry_as_" + $(this).attr('id')));
            $('#entry_type').val($(this).attr('id'));
            if ($(this).attr('id') == 'group') {
                $("input[name='group_a[0][member_name]']").attr('readonly', true);
                $("input[name='group_a[0][mobile_no]']").attr('readonly', true);
                $("input[name='group_a[0][member_name]']").val($('#full_name').val());
                $("input[name='group_a[0][mobile_no]']").val($('#mobile_no').val());
            } else if ($(this).attr('id') == 'couple') {
                $("#mem1_name").attr('readonly', true);
                $("#mem1_mobile_no").attr('readonly', true);
                $("#mem1_name").val($('#full_name').val());
                $("#mem1_mobile_no").val($('#mobile_no').val());
            } else if ($(this).attr('id') == 'girl') {
                $("#girl_member_name").attr('readonly', true);
                $("#girl_mobile_no").attr('readonly', true);
                $("#girl_member_name").val($('#full_name').val());
                $("#girl_mobile_no").val($('#mobile_no').val());
            }
            $("#entry_as_" + $(this).attr('id')).show('slow');
        });
    </script>
    @if (Session::has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('success') }}"
            })
        </script>
    @endif
@endsection
