@extends('layouts.layout-syndic')

@section('content')

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="#" class="btn btn-primary btn-block margin-bottom">Nouveau message</a>

          @include('layouts.layout-message-syndic')
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Boite de reception</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table id="table-message" class="table table-hover table-striped">
                  <tbody>
                  	@foreach($mp as $message)
                  <tr class="vue{{ $message->vue }}">
                    <form id="read-message-form" method="post" action="{{ route('syndic.read-message') }}">
                        @csrf
                      <td><input type="checkbox"></td>
                      <input type="hidden" id="id_message" name="id_message" value="{{ $message->id_message }}">
                      <td class="mailbox-name"><a href="#">{{ $message->username }}</a></td>
                      <td class="mailbox-subject" style="max-width: 100px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $message->messagerie }}</td>
                      <td class="mailbox-attachment"></td>
                      <?php
                        $date=date_create($message->date_send );
                        ?>
                      <td class="mailbox-date">{{ date_format($date,"d M Y  H:i") }}</td>
                    </form>

                  </tr>
                	@endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  <script>
    $(document).ready(function(){
        $('.vue0').css('font-weight', 'bold');
        $('.table-hover').css( 'cursor', 'pointer');

        //refresh automatic message
        /*setInterval(function () {
            $.ajax({
                type:'GET',
                url:'{{ route('syndic.refreshMessage') }}',
                success:function(data){
                    $('#table-message tbody').html(data);
                    $('.vue0').css('font-weight', 'bold');
                    $('#table-message').serialize();
                }
            });
        },5000)*/

        //submit click message
        //'tbody tr .mailbox-name, tbody tr .mailbox-subject, tbody tr .mailbox-attachment, tbody tr .mailbox-date'
        $(document).on('click','tbody tr .mailbox-name',function () {
            //alert($(this).parent().find('#id_message').val());
            $('#id_message').val($(this).parent().find('#id_message').val());
            $.get('{{ url('syndic/readMp/') }}'+'/'+$('#id_message').val());
            $('#read-message-form').submit();
        })


    })
  </script>

 @endsection