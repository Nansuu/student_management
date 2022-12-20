@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header text-white" style="background-color:#A39624;">{{ __('ログイン') }}</div>

                <div class="card-body bg-light">
                    <form class="loginForm" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-secondary" id="clearbtn">
                                    {{ __('キャンセル') }}
                                </button>
                                <button type="submit" class="btn text-white" style="background-color:#A39624;">
                                    {{ __('ログイン') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on("click", "#clearbtn", function(e) {
                e.preventDefault();
                $(".loginForm")[0].reset();
                $("#message").html("");
                $("span").html("");
                $("#email").val("");
                $("#password").val("");
                $(".invalid-feedback").hide();
                $(".form-group").find('.is-invalid').removeClass("is-invalid");
            });
            $('form input').focus(function() {
                $(this).siblings(".invalid-feedback").hide();
                $(this).parent(".col-md-6").find('.is-invalid').removeClass("is-invalid");
            });

    });
</script>
@endsection
