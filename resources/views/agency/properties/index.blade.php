@extends('agency.layouts.master-agency')
@section('body-content-agency')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">Your Properties</h4>
                </div>
                <div class="p-4">
                    <table id="all_properties_list" class="table table-borderless table-striped table-earning" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Owner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $index => $property)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$property['title']}}</td>
                                <td>{{$property['category']['name']}}</td>
                                <td>{{$property['price']}}</td>
                                <td>{{$property['status']}}</td>
                                <td>{{isset($property['user_id']) && ($property['user_id'] == 1) ? 'Admin' : 'Agency'}}</td>
                                <td>
                                    <a href="{{route('agency.property.show', $property->id)}}" data-id="{{$property->id}}" class="view-property item pr-2" data-toggle="tooltip" data-placement="buttom" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                    <a href="{{route('agency.property.edit', $property->id)}}" data-id="{{$property->id}}" class="edit-property item pr-2" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                    <a href="javascript:void(0)" data-id="{{$property->id}}" class="delete-property" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@stack('scripts')
@endsection
@section('scripts')

<script>
    $(document).ready( function () {
        $('#all_properties_list').DataTable();
    });
</script>
<script src="{{asset('backend/custom/properties/create.js')}}"></script>
<script src="{{asset('backend/custom/properties/delete.js')}}"></script>
@endsection
