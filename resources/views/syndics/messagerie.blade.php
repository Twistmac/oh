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

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">

                <div class="btn-group">

                </div>


              </div>
              <div class="table-responsive mailbox-messages">
                <table id="table-message" class="table table-hover datatable">
                    <thead>
                    <tr>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                        <th></th>
                        <th>date</th>
                    </tr>
                    </thead>
                  <tbody>
                  	@foreach($mp as $message)
                  <tr class="vue{{ $message['read'] }}" data-key="{{ $message['key'] }}">
                      <td> </td>
                      <input type="hidden" id="id_message" name="messageId" value="{{ $message['messageId'] }}">
                      <input type="hidden" id="key_message" name="key_message" value="{{ $message['key'] }}">
                      <td class="mailbox-name"><a href="#">
                          <?php
                            $user = $membre->getById( $message['senderId'] );
                                foreach ($user as $us){
                                    echo $us->username;
                                }
                              ?>
                        </a>
                      </td>
                      <td class="mailbox-subject" style="max-width: 100px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $message['message'] }} </td>
                      <td class="mailbox-attachment"> </td>
                      <?php
                        //$date=date_create($message->date_send );
                        ?>
                      <td class="mailbox-date"> {{ $message['timestamp'] }}</td>

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

      $('tr[data-key=""]').hide();
      $('#table-message thead').hide()
      $('.vue0').css('font-weight', 'bold');
      $('.vue0').css('background', '#3333331a');

      var table = $('#table-message').DataTable({
          paging : false,
          searching : false,
          info : false,
          order: [[4, 'desc']]
      });

      $(document).ready(function(){

        $('.table-hover').css( 'cursor', 'pointer');

        $('tr[data-key=""]').hide();


        //refresh automatic message
        setInterval(function () {
            $.ajax({
                type:'GET',
                url:'{{ route('syndic.refreshMessage') }}',
                success:function(data){
                    table.destroy();
                    $('#table-message tbody').html(data);
                    $('tr[data-key=""]').hide();
                    $('#table-message thead').hide();
                    table = $('#table-message').DataTable({
                        paging : false,
                        searching : false,
                        info : false,
                        order: [[4, 'desc']]
                    });
                    $('.vue0').css('font-weight', 'bold');
                    $('.vue0').css('background', '#3333331a ');
                }
            });
        },5000);

        //submit click message
        //'tbody tr .mailbox-name, tbody tr .mailbox-subject, tbody tr .mailbox-attachment, tbody tr .mailbox-date'
        $(document).on('click','tbody tr .mailbox-name',function () {
            var key = $(this).parent().find('#key_message').val();
            var id_message = $(this).parent().find('#id_message').val();
            $('#id_message').val($(this).parent().find('#id_message').val());
            //$.get('{{ url('syndic/readMp/') }}'+'/'+$('#id_message').val());
            window.location.href = "{{ url('syndic/read-message') }}?messageId="+id_message+"&key_message="+key;
            //$(this).parent().find('#read-message-form').submit();
        });


    })
  </script>

 @endsection