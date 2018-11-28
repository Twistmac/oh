        <option value="">Choose the building ... .</option>
@foreach($immeuble as $immeubles)
            <option value="{{ $immeubles->id_immeuble }}">{{ $immeubles->nom_immeuble }}</option>
    @endforeach
