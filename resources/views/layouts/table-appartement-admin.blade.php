@foreach($appartement as $appartements)
    <tr>
        <td>{{ $appartements->id_appartement }}</td>
        <td></td>
        <td>{{ $appartements->username }}</td>
        <td>
		
		
		<!-- generation avec un oeil -->
		<input id="password-field-{{ $appartements->id_appartement }}" type="password" class="form-control form-control-{{ $appartements->id_appartement }}" value="{{ base64_decode($appartements->salt) }}" style="width: 110px">
                                        <span style="float: right;margin-left: -25px;margin-top: -25px;position: relative;z-index: 2;" toggle="#password-field-{{ $appartements->id_appartement }}" class="fa fa-fw fa-eye field-icon toggle-password"></span></td>
		<!-- fin de la generation avec un oeil -->
		
		
		
		</td>
        <td></td>
        <td>
            <form data-id="{{ $appartements->id }}" class="form-inline" method="get">
                @csrf
                <button type="submit" class="btn btn-flat btn-xs" data-toggle="tooltip" data-placement="top" title="">
                    <span class="{{ $appartements->etat }}"></span>
                </button>
            </form></td>
    </tr>
@endforeach


