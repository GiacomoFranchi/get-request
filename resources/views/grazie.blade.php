@extends('layouts.app')
@section('content')

<style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .message {
            margin-top: 3rem;
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            <h1>Grazie!</h1>
            <p>L'operazione è stata completata con successo.</p>
        </div>
    </div>
</body>
@endsection