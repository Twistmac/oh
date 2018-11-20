@extends('layouts.layout-syndic')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">

                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered datatable" id="table-immeuble">
                            <thead>
                            <tr>
                                <th>

                                </th>
                                <th>
                                    Number
                                </th>
                                <th>
                                    Nom
                                </th>
                                <th>
                                    Apartment
                                </th>

                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; ?>
                            @foreach($immeuble as $item)
                                <?php $i++ ?>
                                <tr>
                                    <input type="hidden" class="id_immeuble" value="{{ $item->id_immeuble }}">
                                    <td >
                                        {{ $i  }}
                                    </td>
                                    <td >
                                        {{ $item->numero }}
                                    </td>
                                    <td>
                                        {{ $item->nom_immeuble }}
                                    </td>
                                    <td>
                                        {{ $item->nbr_appart }}
                                    </td>

                                    <td>
                                        <a href="#" id="pencil" data-toggle="modal" data-target="#modal-edition{{ $item->id }}">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a >
                                        <!-- /.modal-EDTION -->
                                        <div class="modal modal-info fade" id="modal-edition{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Immeuble Numéro {{ $item->id }}</h4>
                                                    </div>
                                                    <form class="form-horizontal" id="form-edit-immeuble" action="{{ route('syndic.edit-immeuble', ['id_immeuble'=> $item->id]) }}">
                                                        @csrf
                                                    <div class="modal-body">
                                                            <p>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-6" for="email">Nom de l'immeuble:</label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" value="{{ $item->nom_immeuble }}" name="nom_immeuble" required>
                                                                </div>
                                                            </div>
                                                            </p>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-6" for="pwd">Nombre d'appartement:</label>
                                                                <div class="col-md-6">
                                                                    <input type="number" class="form-control" value="{{ $item->nbr_appart }}" name="nbr_appart" required>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>

                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </td>
                                    <!-- Modal edition-->


                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Apart :
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>

                                </th>
                                <th>
                                    N°
                                </th>
                                <th>
                                    Pseudo Resident
                                </th>
                            </tr>
                            </thead>
                            <tbody id="tbody-appart">
                            </tbody>
                            <img src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" id="loading">

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <script>
        //change color background table if hover
        $("#table-immeuble tr").not(':first').hover(
            function () {
                $(this).css("background","#B8B8B8");
                $(this).css( 'cursor', 'pointer' );
            },
            function () {
                $(this).css("background","");
            }
        );
        //change active cell on click row
        $("#table-immeuble tbody tr").click(function(){
            $(this).addClass("tr-active");
            $("#table-immeuble tbody tr").not(this).removeClass("tr-active");
            //ajax appartement
            var id_immeuble = $(this).find('.id_immeuble').val();
            $.ajax({
                url: "{{url('syndic/tbody-appart/')}}/"+id_immeuble,
                method: "GET",
                success:function (data) {
                   $('#tbody-appart').html(data);
                },
                beforeSend: function () {
                    $("#loading").show();
                },
                complete: function () {
                    $("#loading").hide();
                }
            })

        });





    </script>

    <style>
        .tr-active{
            background: #B8B8B8!important;
            color: white;
        }
        #loading { display: none; }
    </style>
@endsection


