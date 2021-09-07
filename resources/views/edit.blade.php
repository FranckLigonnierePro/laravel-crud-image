<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
              @endif
<form action='{{ route("personnage.update", $perso->id) }}' method="POST" enctype="multipart/form-data">
@csrf
@method('PATCH')

    <div class="mb-3">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom" value="{{ $perso->nom }}">
    </div>

    <div class="mb-3">
    <label class="form-label">Image</label>
    <input class="form-control" type="file" name="image" value="{{ $perso->image }}">
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>