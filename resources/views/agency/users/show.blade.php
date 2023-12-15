@extends('backend.layouts.master-admin')
@section('body-content')

<style>
    .font-weight-bold{
        /* color: red; */
    }
</style>
 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h3 class=" text-center pt-3">Agent details</h3>
                </div>
                <div class="card-body">
                    {{-- properties view --}}
                    <div id="properties" class="">
                        <div class="row mt-2 pb-5">
                            <div class="col col-4">
                                <center>
                                    <img width="150px" height="150px" id="imagePreview" src="{{ !is_null($user['profile_picture']) ? url('Uploads/user/'.$user['profile_picture']) : asset('images/img_avatar3.png') }}" style="border-radius:50%">
                                </center>
                            </div>
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Full Name: </div>
                                <div class="font-weight-bold p-2">Email:</div>
                                @if (isset($user->contact) && !is_null($user->contact))
                                    <div class="font-weight-bold p-2">Contact: </div>
                                @endif
                                <div class="font-weight-bold p-2">Status:</div>
                            </div>
                            <div class="col col-6">
                                <div class="p-2">{{isset($user->full_name) ? $user->full_name : ''}}</div>
                                <div class="p-2">{{isset($user->email) ? $user->email : ''}}</div>
                                @if (isset($user->contact) && !is_null($user->contact))
                                    <div class="p-2">{{isset($user->contact) ? $user->contact : ''}}</div>
                                @endif
                                @if(isset($user->status) && $user->status == 'active' )
                                    <div class="badge badge-success">Active</div>
                                @elseif(isset($user->status) && $user->status == 'pending' )
                                    <div class="badge badge-warning">Pending</div>
                                @else
                                    <div class="badge badge-danger">Deactive</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stack('scripts')
@endsection
@section('scripts')
@endsection
