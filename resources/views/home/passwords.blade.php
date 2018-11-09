@extends('layouts.app')

@section('content')
<script>
    window.user_id = {{ Auth::user()->id }}
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Passwords
                </div>

                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Password
                    </button>
                    <div class="container">
                        <div class="row">
                            <div class="col">Name</div>
                            <div class="col">Password</div>
                            <div class="col">Url</div>
                            <div class="col">Username</div>
                            <div class="col">Comment</div>
                        </div>
                        @foreach ($passwords as $password)
                            <div class="row">
                                <div class="col">{{$password -> password}}</div>
                                <div class="col">{{$password -> name}}</div>
                                <div class="col">{{$password -> url ? $password->url : '---'}}</div>
                                <div class="col">{{$password -> username ? $password->username : '---'}}</div>
                                <div class="col">{{$password -> comment ? $password->comment : '---'}}</div>
                            </div>
                            @component('modals.modify-password', [
                                'id' => $password->id,
                                'name' => $password->name,
                                'url' => $password->url,
                                'username' => $password->username,
                                'comment' => $password->comment,
                                'password' => $password->password,
                            ])
                                Modyfication, {{$password->name}}
                            @endcomponent
                        @endforeach
                        {{--  <div id="root-test">loading ...</div>  --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/password/add" id="add-elem" method="post">
      <div class="modal-body">
            @csrf
            <input type="text" name="name" id="name" placeholder="Name">
            <input type="password" name="password" placeholder="Password">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="tessst" class="btn btn-primary">Save changes</button>
      </div>

    </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
    <script src="/js/main-h.js"></script>
@endpush
