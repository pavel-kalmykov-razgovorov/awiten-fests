<h1>Nuevo Artista</h1>
@if(count($errors) > 0)
    <h3>Hay errores:</h3>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{action('ArtistController@Create')}}" method="post">
    {{method_field('post')}}
    {{csrf_field()}}
    <ul>
        <li> Nombre: <input type="text" name="name" title="Nombre" value="{{old('name')}}"></li>
        <li> Soundcloud: <input type="text" name="soundcloud" title="SoundCloud" value="{{old('soundcloud')}}"></li>
        <li> Sitio Web: <input type="text" name="website" title="Sitio Web" value="{{old('website')}}"></li>
        <li> País: <input type="text" name="country" title="País" value="{{old('country')}}"></li>
        <li>
            Festivales:
            <input type="button" onclick="addEntry()" value="Nuevo festival"/>
            <ul id="festivals-list">
                @foreach (array_unique(session('temp-festivals') ?? []) as $temp_festival)
                    <li>
                        <select name="festivals-select[]" title="festival-options">
                            @foreach ($festivals as $festival)
                                @if($temp_festival == $festival->id)
                                    <option value="{{$festival->id}}" selected>{{$festival->name}}</option>
                                @else
                                    <option value="{{$festival->id}}">{{$festival->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="button" onclick="removeEntry(this)" value="x">
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
    <input type="button" onclick="window.location='{{action('ArtistController@All')}}';" value="Cancelar">
    <input type="submit" value="Crear">
</form>
<template id="festival-entry">
    <li>
        <select name="festivals-select[]" title="festivals-options">
            @forelse ($festivals as $festival)
                <option value="{{$festival->id}}">{{$festival->name}}</option>
            @empty
                <option disabled>No hay festivales registrados</option>
            @endforelse
        </select>
        <input type="button" onclick="removeEntry(this)" value="x">
    </li>
</template>
<script>
    function addEntry() {
        document.querySelector('#festivals-list').appendChild(
            document.importNode(document.querySelector('#festival-entry').content, true)
        );
    }

    function removeEntry(elem) {
        elem.parentNode.parentNode.removeChild(elem.parentNode);
    }
</script>