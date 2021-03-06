    @extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header">

                        <div class="col2-right-layout">
                            <a href="{{ route('admin.gestion-residences-ajout') }}" class="btn btn-success">
                                <span class="fa fa-plus-circle"></span>
                                Add
                            </a>
                        </div>

                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Referent Name</th>
                                <th>E-mail</th>
                                <th>Password</th>
                                <th>Creation date</th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($residences as $item)
                                <tr>
                                    <td>{{ $item->numero }}</td>
                                    <td>{{ $item->nom }}</td>
                                    <td>{{ $item->nom_ref.' '.$item->prenom_ref }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td><input id="password-field-{{ $item->numero }}" type="password" class="form-control form-control-{{ $item->numero }}" value="{{ base64_decode($item->salt) }}" style="width: 110px">
                                        <span style="margin-left: -25px;margin-top: -25px;position: relative;z-index: 2;" toggle="#password-field-{{ $item->numero }}" class="fa fa-fw fa-eye field-icon toggle-password"></span></td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit-residence', ['id' => $item->id_residence]) }}">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;-&nbsp;
                                        <form onsubmit="return confirm('Confirm delete ?')" class="form-inline" action="{{ route('admin.delete-residence', ['id' => $item->id_residence, 'syndic_id' => $item->syndic_id]) }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <!--<button type="submit" class="btn btn-danger btn-xs btn-flat">
                                                Supprimer
                                            </button>-->
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
        </div>
    </div>

    <script type="text/javascript">

        //toogle password
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
			
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endsection
