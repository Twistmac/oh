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
                            <table id="table-message" class="table table-hover">

                                <tbody>
                                @foreach( $mp_send as $mp)
                                    <tr>
                                        <td> </td>
                                        <td class="mailbox-name">
                                            <a href="#">{{ $mp->email }}</a>
                                        </td>
                                        <td class="mailbox-subject" style="max-width: 100px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"> </td>
                                        <td class="mailbox-attachment"> {{ $mp->messagerie }}</td>

                                        <td class="mailbox-date">{{ $mp->CREATED_AT }} </td>

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
        $('.mail-box').removeClass('active');
        $('.nav-send').addClass('active');
    </script>

@endsection


