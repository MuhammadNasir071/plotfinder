@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form id="update_user_form" data-id="{{ $user->id }}">
                <div class="card">
                    <div class="card-header"><h4>Edit Agent</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="full_name" class="control-label mb-1">Full Name<font color="red">*</font></label>
                                    <input type="text" id="full_name" disabled name="full_name"  class="form-control" value="{{isset($user->full_name) ? $user->full_name : ''}}">
                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Status<font color="red">*</font></label>
                                    <select name="status" class="form-control" id="status" >
                                        <option value="active" {{isset($user->status) && ($user->status == 'active') ? 'selected' : ''}}>Active</option>
                                        <option value="pending" {{isset($user->status) && ($user->status == 'pending') ? 'selected' : ''}}>Pending</option>
                                        <option value="deactive" {{isset($user->status) && ($user->status == 'deactive') ? 'selected' : ''}}>Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email<font color="red">*</font></label>
                                    <input type="email" id="email" name="email" disabled class="form-control" value="{{isset($user->email) ? $user->email : ''}}">
                                </div>
                            </div>
                            <div class="col col-5">
                                <div class="form-group">
                                    <label for="contact" class="control-label mb-1">Contact<font color="red">*</font></label>
                                    <input type="text" id="contact" name="contact" disabled class="form-control" value="{{isset($user->contact) ? $user->contact : ''}}">
                                </div>
                            </div>
                        </div><br>
                    <div class="form-group">
                        <button type="submit" id="update_user_btn" class="btn btn-outline-info">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
 </div>
 @stack('scripts')
 @endsection
 @section('scripts')
 <script src="{{asset('backend/custom/users/create.js')}}"></script>
@endsection
