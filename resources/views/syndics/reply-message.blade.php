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
                            <h3 class="box-title"></h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <div class="mailbox-read-message" style="margin-bottom: 30px">

                            </div>
                            <!-- /.mailbox-read-message -->
                        </div>

                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Supprimer</button>
                            </div>
                            <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Repondre</button>
                        </div>
                        <!-- /.box-footer -->
                    </div>
            <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


@endsection