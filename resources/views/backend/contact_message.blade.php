@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Messages</h4>
                </div>
                <div class="p-4">
                    <div class="table-responsive table--no-card m-b-40">
                        <table id="all_message_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($messages as $index => $message)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$message['name']}}</td>
                                    <td>{{$message['email']}}</td>
                                    <td>{{$message['subject']}}</td>
                                    <td>{{$message['message']}}</td>
                                    <td>
                                        <a href="{{ route('admin.delete.message', $message->id)}}"><i class="zmdi zmdi-delete" title="Delete" style="font-size:17px;color:red"></i></a>
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
</div>


@stack('scripts')
@endsection
@section('scripts')

<script>
    $(document).ready( function () {
        $('#all_message_list').DataTable();
    });
</script>

@endsection
