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
                <?php $user = $membre->getById( $chatSyndic['senderId'] )?>
                @foreach($user as $as)
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                        <div class="pull-right">
                            <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Supprimer</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3> {{ $as->username }}</h3>
                            <h5> Email: {{ $as->email }}

                                <span class="mailbox-read-time pull-right"></span></h5>
                        </div>

                        <div class="mailbox-read-message">
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-text">
                                    {{ $chatSyndic['message'] }}
                                    <div class="direct-chat-danger clearfix">
                                        <span class="direct-chat-timestamp pull-left">{{ $chatSyndic['timestamp'] }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>

                    <div class="box-footer">
                        <form action="{{ route('syndic.reply', ['messageId'=> $chatSyndic['messageId'] ] )}}" method="post">
                            @csrf
                            <div class="input-group">
                                <input name="message" placeholder="Type Message ..." class="form-control" type="text">
                                <input name="senderId" type="hidden" value="{{ $chatSyndic['senderId'] }}">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-success btn-flat">Reply</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-footer -->
                </div>
                    @endforeach
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
        })
    </script>

@endsection