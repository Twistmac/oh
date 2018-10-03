        <option value="">Choisissez l'immeuble ... .</option>
@foreach($immeuble as $immeubles)
            <option value="{{ $immeubles->id }}">N° {{ $immeubles->id }} &nbsp;&nbsp;&nbsp; {{ $immeubles->nom_immeuble }}</option>
    @endforeach
