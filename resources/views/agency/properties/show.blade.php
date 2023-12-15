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
                    <h3 class=" text-center pt-3">Property details</h3>
                </div>
                <div class="card-body">
                    {{-- properties view --}}
                    <div id="properties" class="">
                        <h4>Basic Info</h4>
                        <div class="row mt-2">
                            <div class="col col-4">
                                <img width="200px" height="200px" id="imagePreview" src="{{ !is_null($property['image']) ? url('Uploads/property/'.$property['image']) : asset('backend/images/placeholder_image.png') }}">
                            </div>
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Title: </div>
                                <div class="font-weight-bold p-2">Status:</div>
                                <div class="font-weight-bold p-2">Category: </div>
                                <div class="font-weight-bold p-2">Listed In:</div>
                                <div class="font-weight-bold p-2">Price (PKR):</div>
                            </div>
                            <div class="col col-6">
                                <div class="p-2">{{isset($property->title) ? $property->title : ''}}</div>
                                <div class="p-2">{{isset($property->status) ? $property->status : ''}}</div>
                                <div class="p-2">{{isset($property['category']['name']) ? $property['category']['name'] : ''}}</div>
                                <div class="p-2">{{isset($property->listed_in) ? $property->listed_in : ''}}</div>
                                <div class="p-2">{{isset($property->price) ? $property->price : ''}}</div>
                            </div>
                        </div>
                        <br><br>
                        <h4>Address/Location</h4>
                        <div class="row mt-2">
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Country: </div>
                                <div class="font-weight-bold p-2">City:</div>
                            </div>
                            <div class="col col-4">
                                <div class="p-2">{{isset($property->country) ? $property->country : ''}}</div>
                                <div class="p-2">{{isset($property->city) ? $property->city : ''}}</div>

                            </div>
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">State: </div>
                                @if (isset($property->apartment) && !is_null($property->apartment))
                                    <div class="font-weight-bold p-2">Apartment:</div>
                                @endif
                            </div>
                            <div class="col col-4">
                                <div class="p-2">{{isset($property->state) ? $property->state : ''}}</div>
                                <div class="p-2">{{isset($property->apartment) ? $property->apartment : ''}}</div>
                            </div>
                        </div>
                        <br><br>
                        <h4>Listing Details</h4>
                        <div class="row mt-2">
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Size in m2: </div>
                            </div>
                            <div class="col col-4">
                                <div class="p-2">{{isset($property->size_square_meter) ? $property->size_square_meter : ''}}</div>
                            </div>
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Lot Size in m2:</div>
                            </div>
                            <div class="col col-4">
                                <div class="p-2">{{isset($property->lot_size) ? $property->lot_size : ''}}</div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            @if (isset($property->rooms) && !is_null($property->rooms))
                                <div class="col col-2">
                                    <div class="font-weight-bold p-2">Rooms: </div>
                                </div>
                                <div class="col col-4">
                                    <div class="p-2">{{isset($property->rooms) ? $property->rooms : ''}}</div>
                                </div>
                            @endif
                            @if (isset($property->kitchen) && !is_null($property->kitchen))
                                <div class="col col-2">
                                    <div class="font-weight-bold p-2">Kitchen:</div>
                                </div>
                                <div class="col col-4">
                                    <div class="p-2">{{isset($property->kitchen) ? $property->kitchen : ''}}</div>
                                </div>
                            @endif
                        </div>
                        <div class="row mt-2">
                            @if (isset($property->bedrooms) && !is_null($property->bedrooms))
                                <div class="col col-2">
                                    <div class="font-weight-bold p-2">Bedrooms:</div>
                                </div>
                                <div class="col col-4">
                                    <div class="p-2">{{isset($property->bedrooms) ? $property->bedrooms : ''}}</div>
                                </div>
                            @endif
                            @if (isset($property->bathrooms) && !is_null($property->bathrooms))
                                <div class="col col-2">
                                    <div class="font-weight-bold p-2">Bathrooms:</div>
                                </div>
                                <div class="col col-4">
                                    <div class="p-2">{{isset($property->bathrooms) ? $property->bathrooms : ''}}</div>
                                </div>
                            @endif
                        </div>
                        <div class="row mt-2">
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Year Built:</div>
                            </div>
                            <div class="col col-4">
                                <div class="p-2">{{isset($property->build_date) ? $property->build_date : ''}}</div>
                            </div>
                            @if (isset($property->basement) && !is_null($property->basement))
                                <div class="col col-2">
                                    <div class="font-weight-bold p-2">Basement:</div>
                                </div>
                                <div class="col col-4">
                                    <div class="p-2">{{isset($property->basement) ? $property->basement : ''}}</div>
                                </div>
                            @endif
                        </div>
                        <div class="row mt-2">
                            @if (isset($property->garages) && !is_null($property->garages))
                                <div class="col col-2">
                                    <div class="font-weight-bold p-2">Garages:</div>
                                </div>
                                <div class="col col-4">
                                    <div class="p-2">{{isset($property->garages) ? $property->garages : ''}}</div>
                                </div>
                            @endif
                            @if (isset($property->garage_size) && !is_null($property->garage_size))
                                <div class="col col-2">
                                    <div class="font-weight-bold p-2">Garage Size:</div>
                                </div>
                                <div class="col col-4">
                                    <div class="p-2">{{isset($property->garage_size) ? $property->garage_size : ''}}</div>
                                </div>
                            @endif
                        </div>
                        <div class="row mt-2">
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Available date:</div>
                            </div>
                            <div class="col col-4">
                                <div class="p-2">{{isset($property->available_date) ? $property->available_date : ''}}</div>
                            </div>
                            @if (isset($property->roofing) && !is_null($property->roofing))
                                <div class="col col-2">
                                    <div class="font-weight-bold p-2">Roofing :</div>
                                </div>
                                <div class="col col-4">
                                    <div class="p-2">{{isset($property->roofing) ? $property->roofing : ''}}</div>
                                </div>
                            @endif
                        </div>
                        <div class="row mt-2">
                            @if (isset($property->external_construction) && !is_null($property->external_construction))
                                <div class="col col-2">
                                    <div class="font-weight-bold p-2">External construction:</div>
                                </div>
                                <div class="col col-4">
                                    <div class="p-2">{{isset($property->external_construction) ? $property->external_construction : ''}}</div>
                                </div>
                            @endif
                        </div>
                        <br><br>
                        <h4>Amenities and Features</h4>
                        <div class="row mt-2">
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Balcony?: </div>
                                <div class="font-weight-bold p-2">Garden?:</div>
                                <div class="font-weight-bold p-2">Doorman?:</div>
                            </div>
                            <div class="col col-4">
                                <div class="mt-3"><input type="checkbox" readonly value="1" {{isset($property->balcony) && $property->balcony == 1 ? 'checked' : ''}}></div>
                                <div class="mt-3"><input type="checkbox" readonly value="1" {{isset($property->garden) && $property->garden == 1 ? 'checked' : ''}}></div>
                                <div class="mt-3"><input type="checkbox" readonly value="1" {{isset($property->doorman) && $property->doorman == 1 ? 'checked' : ''}}></div>
                            </div>
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Elevator?: </div>
                                <div class="font-weight-bold p-2">Front Yard?:</div>
                                <div class="font-weight-bold p-2">Chair Accessible?:</div>
                            </div>
                            <div class="col col-4">
                                <div class="mt-2"><input type="checkbox" readonly value="1" {{isset($property->elevator) && $property->elevator == 1 ? 'checked' : ''}}></div>
                                <div class="mt-2"><input type="checkbox" readonly value="1" {{isset($property->front_yard) && $property->front_yard == 1 ? 'checked' : ''}}></div>
                                <div class="mt-2"><input type="checkbox" readonly value="1" {{isset($property->chair_accessible) && $property->chair_accessible == 1 ? 'checked' : ''}}></div>
                            </div>
                        </div>

                        <br><br>
                        <h4>Property Description</h4>
                        <div class="row mx-5 mt-2">
                            {!! $property['description'] !!}
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
