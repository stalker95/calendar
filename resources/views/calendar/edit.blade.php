 @extends('layouts.calendar')
 @section('styles')
 <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/bower_components/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/bower_components/admin-lte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/bower_components/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/bower_components/admin-lte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/bower_components/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="/bower_components/admin-lte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/bower_components/admin-lte/dist/css/adminlte.min.css">
 @endsection
 @section('content')

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit event</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('calendar.update', $event->id) }}" method="POST" >
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title:</label>
                    <input type="text" name="title" class="form-control" value="{{ $event->title }}" id="exampleInputEmail1" placeholder="Enter title">
                  </div>
                  <div class="form-group">
                  <label>Date and time of push up event:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="push_event" value="{{ $event->push_event }}" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                  <label>Start data:</label>
                    <div class="input-group date" id="reservationdate_two" data-target-input="nearest">
                        <input name="start_data" type="text" value="{{ $event->start_data }}" class="form-control datetimepicker-input" data-target="#reservationdate_two"/>
                        <div class="input-group-append" data-target="#reservationdate_two" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                  <label>End data:</label>
                    <div class="input-group date" id="reservationdate_three" data-target-input="nearest">
                        <input name="end_data" type="text" value="{{ $event->end_data }}" class="form-control datetimepicker-input" data-target="#reservationdate_three"/>
                        <div class="input-group-append" data-target="#reservationdate_three" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Description:</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Enter description">{{ $event->description }}</textarea>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
            <!-- /.card -->
@endsection

@section('scripts')
<!-- Bootstrap 4 -->
<script src="/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="/bower_components/admin-lte/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="/bower_components/admin-lte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js">  </script>
<script src="/bower_components/admin-lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">  </script>
<!-- bootstrap color picker -->
<script src="/bower_components/admin-lte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/bower_components/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="/bower_components/admin-lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="/bower_components/admin-lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/bower_components/admin-lte/dist/js/demo.js"></script>

<script>
  //Date range picker
    $('#reservationdate').datetimepicker({format: 'YYYY-MM-DD hh:mm A'});
    $('#reservationdate_two').datetimepicker({format: 'YYYY-MM-DD hh:mm'});
    $('#reservationdate_three').datetimepicker({format: 'YYYY-MM-DD hh:mm'});
</script>

@endsection
