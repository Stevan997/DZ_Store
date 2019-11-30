<!DOCTYPE html>
@include('head')
<body>

@include('layouts.header')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-4">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('Username')
                                    <span class="invalid-feedback font-weight-bold" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('E-Mail')
                                    <span class="invalid-feedback font-weight-bold" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="Ime" class="col-md-4 col-form-label text-md-right">{{ __('Ime') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Ime" type="text" class="form-control @error('Ime') is-invalid @enderror" name="Ime" required>

                                    @error('Ime')
                                        <span class="invalid-feedback font-weight-bold" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="Prezime" class="col-md-4 col-form-label text-md-right">{{ __('Prezime') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Prezime" type="text" class="form-control @error('Prezime') is-invalid @enderror" name="Prezime" required>
                                    @error('Prezime')
                                        <span class="invalid-feedback font-weight-bold" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="Adresa" class="col-md-4 col-form-label text-md-right">{{ __('Adresa') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Adresa" type="text" class="form-control @error('Adresa') is-invalid @enderror" name="Adresa" required>
                                    @error('Adresa')
                                        <span class="invalid-feedback font-weight-bold" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="Grad" class="col-md-4 col-form-label text-md-right">{{ __('Grad') }}</label>

                            <div class="col-md-6">
                                <input id="Grad" type="text" class="form-control @error('Grad') is-invalid @enderror" name="Grad" required>
                                @error('Grad')
                                        <span class="invalid-feedback font-weight-bold" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                                <label for="Pos_br" class="col-md-4 col-form-label text-md-right">{{ __('Postanski Broj') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Pos_br" type="number" class="form-control @error('Pos_br') is-invalid @enderror" name="Pos_br" required>
                                    @error('Pos_br')
                                        <span class="invalid-feedback font-weight-bold" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="Br_tel" class="col-md-4 col-form-label text-md-right">{{ __('Broj Telefona') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Br_tel" type="number" class="form-control @error('Br_tel') is-invalid @enderror" name="Br_tel" required>
                                    @error('Br_tel')
                                        <span class="invalid-feedback font-weight-bold" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="Dat_rod" class="col-md-4 col-form-label text-md-right">{{ __('Datum Rodjenja') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Dat_rod" type="text" class="form-control @error('Dat_rod') is-invalid @enderror" name="Dat_rod" required>
                                    @error('Dat_rod')
                                        <span class="invalid-feedback font-weight-bold" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback font-weight-bold" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Potvrdi Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary mb-3">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>