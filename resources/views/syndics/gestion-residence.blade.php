@extends('layouts.layout-syndic')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Liste des immeubles enregistrées :
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered datatable" id="table-immeuble">
                            <thead>
                            <tr>
                                <th>
                                    Numéro
                                </th>
                                <th>
                                    Nom
                                </th>
                                <th>
                                    Nombre d'appartement
                                </th>

                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($immeuble as $item)
                                <tr>
                                    <input type="hidden" class="id_immeuble" value="{{ $item->id }}">
                                    <td >
                                        {{ $item->id }}
                                    </td>
                                    <td>
                                        {{ $item->nom_immeuble }}
                                    </td>
                                    <td>
                                        {{ $item->nbr_appart }}
                                    </td>

                                    <td>
                                        <a href="#">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;-&nbsp;
                                        <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-flat btn-danger btn-xs">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </form>
                                    </td>
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
                            Appartement :
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
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
                }
            })

        });


    </script>

    <style>
        .tr-active{
            background: #B8B8B8!important;
            color: white;
        }
    </style>
@endsection


