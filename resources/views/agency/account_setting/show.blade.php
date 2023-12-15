@extends('agency.layouts.master-agency')
@section('body-content-agency')

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
                    <h3 class=" text-center pt-3">Your Profile</h3>
                </div>
                <div class="card-body">
                    {{-- agency profile view --}}
                    <div id="profile" class="">
                        <div class="row mt-2 pb-5">
                            <div class="col col-4">
                                <center>
                                    <img width="150px" height="150px" id="imagePreview" src="{{ !is_null($agency['profile_picture']) ? url('Uploads/user/'.$agency['profile_picture']) : asset('images/img_avatar3.png') }}" style="border-radius:50%">
                                </center>
                            </div>
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Full Name: </div>
                                <div class="font-weight-bold p-2">Email:</div>
                                @if (isset($agency->contact) && !is_null($agency->contact))
                                    <div class="font-weight-bold p-2">Contact: </div>
                                @endif
                                <div class="font-weight-bold p-2">Status:</div>
                            </div>
                            <div class="col col-6">
                                <div class="p-2">{{isset($agency->full_name) ? $agency->full_name : ''}}</div>
                                <div class="p-2">{{isset($agency->email) ? $agency->email : ''}}</div>
                                @if (isset($agency->contact) && !is_null($agency->contact))
                                    <div class="p-2">{{isset($agency->contact) ? $agency->contact : ''}}</div>
                                @endif
                                @if(isset($agency->status) && $agency->status == 'active' )
                                    <div class="badge badge-success ml-2 p-2">Active</div>
                                @elseif(isset($agency->status) && $agency->status == 'pending' )
                                    <div class="badge badge-warning ml-2 p-2">Pending</div>
                                @else
                                    <div class="badge badge-danger ml-2 p-2">Deactive</div>
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
