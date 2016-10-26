
@if( !$errors->isEmpty() )
    <div>
        <p><strong>Error a corregir:</strong></p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif