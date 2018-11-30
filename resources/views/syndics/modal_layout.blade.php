@foreach($residents as $resident)
    <div class="form-group">
        <label class="control-label col-md-4" for="email">Building:</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $resident->nom_immeuble }}" name="nom_immeuble" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">N° apartement:</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $resident->num_appartement }}" name="nbr_appart" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">Type:</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $resident->type }}" name="nbr_appart" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">Lastname:</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $resident->nom }}" name="nbr_appart" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">Firstname:</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $resident->prenom }}" name="nbr_appart" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">Birth:</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $resident->birthday }}" name="nbr_appart" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">Sex:</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $resident->sexe }}" name="nbr_appart" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">Username:</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $resident->username }}" name="nbr_appart" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">Phone:</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $resident->phone }}" name="nbr_appart" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">email:</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $resident->email }}" name="nbr_appart" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">Password:</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ base64_decode($resident->salt) }}" name="nbr_appart" disabled>
        </div>
    </div>

@endforeach