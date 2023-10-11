@extends('panel.layout.basic')

@section('content')

    <div style="width: 50%;margin-top: 125px; margin-left: auto; margin-right: auto;">
        <form method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">Seus dados não serão compartilhados</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Senha</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
                <div style="margin-top:10px"></div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection 