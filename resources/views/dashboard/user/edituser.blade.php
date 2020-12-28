@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Edit user details</h5>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('user.update',$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" name="name" >
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" value="{{ $user->password }}" class="form-control" placeholder="Password" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label> Phone</label>
                                <input type="text" name="telephone" value="{{ $user->telephone }}"  class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Sexe</label>
                                <input type="text" name="sexe"  value="{{ $user->sexe }}" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Birth date</label>
                                <input type="date" name="dateDeNaissance"  value="{{ $user->dateDeNaissance }}" class="form-control"  >
                            </div>
                        </div>
                    </div>
                    <!--  <div class="row">
                          <div class="col-md-4 pr-1">
                              <div class="form-group">
                                  <label>City</label>
                                  <input type="text" class="form-control" placeholder="City" value="Melbourne">
                              </div>
                          </div>
                          <div class="col-md-4 px-1">
                              <div class="form-group">
                                  <label>Country</label>
                                  <input type="text" class="form-control" placeholder="Country" value="Australia">
                              </div>
                          </div>
                          <div class="col-md-4 pl-1">
                              <div class="form-group">
                                  <label>Postal Code</label>
                                  <input type="number" class="form-control" placeholder="ZIP Code">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>About Me</label>
                                  <textarea class="form-control textarea">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>
                              </div>
                          </div>
                      </div>-->
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

