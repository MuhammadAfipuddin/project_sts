@extends('master')
@section('title', 'Profile')
@section('content')
    <div class="container-fluid" style="margin: 0; padding: 0;">
        <div class="row d-flex justify-content-between align-itemms-center shadow-lg">
            <div class="col-md-12 d-flex align-items-center justify-content-between">
                <p class="h4 pt-4 pb-4 pl-4 text-primary font-weight-bold text-start">Profile</p>
            </div>
        </div>

        <form action="{{ route('profile.update', Session::get('id_user')) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="row p-4" style="z-index: -1">
                    <img class="img-fluid" src="/images/profile_bg.png" alt="">
            </div>

            <div class="row" style="z-index: 1; margin-top: -280px">
                <div class="col-md-5 col-sm-12">
                    <div class="card shadow pb-5 ml-5 mb-5 rounded">
                        <div class="row mt-5">
                            <div class="col-md-12 d-flex justify-content-center position-relative">
                                <input type="file" name="upload" id="upload" class="d-none">
                                <label for="upload" class="position-relative">
                                    <img src="{{ Session::get('profil') }}" alt="{{ Session::get('profil') }}"
                                        class="img-fluid rounded-circle" style="max-width: 200px;">
                                    <div class="bg-info pr-2 pl-2 pt-2 pb-2 text-center position-absolute start-50 translate-middle"
                                        style="border-radius: 25%;">
                                        <i class="h2 bi bi-camera-fill text-white"></i>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="row pt-5">
                            <div class="d-flex justify-content-center">
                                <p class="h4 font-weight-bold text-dark text-capitalize">{{ Session::get('username') }}</p>
                            </div>
                        </div>

                        <hr class="border border-3 border-dark mx-5">

                        <div class="row">
                            <div>
                                <div class="form-group ml-5 mt-2">
                                    <p class="ml-2">{{ Session::get('nama') }}</p>
                                </div>
                                <hr class="border border-3 border-dark mx-5">
                                <div class="form-group ml-5 mt-2">
                                    <p class="ml-2">{{ Session::get('email') }}</p>
                                </div>
                                <hr class="border border-3 border-dark mx-5">
                                <div class="form-group ml-5 mt-2">
                                    <p class="ml-2">{{ Session::get('no_hp') }}</p>
                                </div>
                                <hr class="border border-3 border-dark mx-5">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="card shadow mr-5 rounded">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ Session::get('username') }}" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ Session::get('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="nomor">No. HP</label>
                                <input type="number" class="form-control" name="no_hp" id="nomor"
                                    value="{{ Session::get('no_hp') }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary tombol" name="upload"
                                    id="upload">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script></script>
@endpush
