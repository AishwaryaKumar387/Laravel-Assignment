@extends('layouts.custom')
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <a class="btn btn-primary" href="{{route('register')}}">
                                {{ "Want to ".__('Register') }}
                            </a>
                            <h3 class="text-center font-weight-light my-4">Login</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
                                    <label for="inputEmail">Email address</label>
                                    @error('email')
                                    <span class="invalid-feedback validation-error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                                    <label for="inputPassword">Password</label>
                                    @error('password')
                                        <span class="invalid-feedback validation-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                    <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <input class="btn lgn_btn btn-danger" type="submit" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('custom-script')
    <script>
            //on change input
            $(document).on("change", "input", function (){
                $(this).parent().find(".validation-error").remove();
                $(document).find('.alert').remove();
            }); 
            $(document).on("blur", "input", function (){
                $(this).parent().find(".validation-error").length;
                $(this).parent().find(".validation-error").remove();
                $(document).find('.alert').remove();
            }); 
        </script>
    @endpush

