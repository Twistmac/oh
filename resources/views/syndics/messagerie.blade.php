@extends('layouts.layout-syndic')

@section('content')

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-5">
          <input type="search" class="form-control">

            <div class="box box-solid">
                <div class="box">

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
                                @foreach($mp_syndic as $message)
                                    <tr class="vue{{ $message['read'] }}" data-key="{{ $message['chatId'] }}" data-title="{{$message['senderId']}}">
                                        <td> </td>
                                        <td class="mailbox-name"><a href="#">
                                                <?php $resident = $membre->getById( $message['senderId'] );?>
                                                {{ $resident->username }}
                                            </a>
                                        </td>
                                        <td class="mailbox-subject" style="max-width: 100px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $message['lastMessage'] }} </td>
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

            </div>

        </div>
        <!-- /.col -->
        <div class="col-md-7">
          <div id="box-conversation" class="box box-warning">



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


      // DOCUMENT Ready
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

          /////// ----- --chat div ----- ///////////////
          <?php $user = \Illuminate\Support\Facades\Auth::user(); ?>
          $('div[data-id="{{ $user->id }}"]').addClass('right');
          //////-------------------------§§///////////////////////sss

        $(document).on('click','tbody tr',function () {
            var key = $(this).data('key');
            var senderId = $(this).data('title');
            $('#box-conversation').html('<div  id="loading" style="margin-top: 12px;">\n' +
                '                  <img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/afb8cb36197347.5713616457ee5.gif" style="width: 100%;">\n' +
                '              </div>');
            $.ajax({
                type:'GET',
                url:'{{ url('syndic/get-conversation/') }}'+'/'+key+'?senderId='+senderId,
                success:function(data){
                    $('#box-conversation').html(data);
                    $('div[data-id="{{ $user->id }}"]').addClass('right');
                    $('div[data-key="{{ $user->id }}"]').css('background','#0e69b17d').css('color','white');
                    $('span[data-time="{{ $user->id }}"]').css('color','white').addClass('pull-right');
                }
            });
        });


    })
  </script>

 @endsection