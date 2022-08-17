@extends('backend.layout.admin');

@section('title')
    <title>Dashboard</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection


@section('content')
    @include('backend.partials.headercontent', [ 
        'name' => 'Product Category',
        'button' => 'Add New'
    ])
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>List Category</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="table-product">
            <thead>
              <tr>
                <th class="text-center">
                  <div class="custom-checkbox custom-control">
                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                  </div>
                </th>
                <th>Task Name</th>
                <th>Progress</th>
                <th>Members</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="custom-checkbox custom-control">
                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                  </div>
                </td>
                <td>Create a mobile app</td>
                <td class="align-middle">
                  <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                    <div class="progress-bar bg-success" data-width="100%"></div>
                  </div>
                </td>
                <td>
                  img
                </td>
                <td>2018-01-20</td>
                <td><div class="badge badge-success">Completed</div></td>
                <td><a href="#" class="btn btn-secondary">Detail</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <!-- JS Libraies -->
  <script src="{{ asset('backend/assets/modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('backend/assets/js/page/modules-datatables.js') }}"></script>
@endsection