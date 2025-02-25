@extends('index')


<main>
    <nav class="navbar sticky-top bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('login.index') }}">DNS System</a>
        </div>
    </nav>

    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Sistema DNS</h1>
                <p class="col-lg-10 fs-4">Mesquita</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form method="POST" action="{{ route('auth')}}" class="p-4 p-md-5 border rounded-3 bg-dark">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                        <label for="floatingInput">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                        <label for="floatingPassword">Senha</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

                    @if(session('status'))
                    <div class="alert alert-info mt-3 text-center">{{ session('status')}}</div>
                    @endif
                </form>
            </div>
        </div>

        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">© 2025 Equipe de Desenvolvimento de Mesquita</p>


        </footer>
    </div>
</main>
