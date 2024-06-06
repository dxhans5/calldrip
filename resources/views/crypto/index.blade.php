<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Virus's Lyric Database</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<form action="{{ route('crypto.push') }}">
    <input type="hidden" name="payload" value="{{json_encode($ticker)}}" />
    <div class="container text-center">
        <div class="row mb-4">
            <div class="col g-4">
                Virus's Crypto Index
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="mb-3">
                    <strong>Ticker</strong>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach($ticker['Markets'] as $market)
                <div class="col">
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-header">
                                {{ $market['Name'] }}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Label:</strong> {{ $market['Label'] }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Price:</strong> {{ $market['Price'] }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Volume (24 hrs):</strong> {{ $market['Volume_24h'] }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Timestamp:</strong> {{ date('m/d/Y H:i:s', $market['Timestamp']) }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <hr/>

        <div class="row justify-content-center">
            <div class="col-3">
                <button type="submit" class="btn btn-primary">Push to API</button>
            </div>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

