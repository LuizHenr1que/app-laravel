@extends('admin.layouts.app')

@section('title', "Detalhes da dúvida {$support->subject}")

@section('header')
<h1 class="text-lg text-black-500">Dúvida {{ $support->subject }}</h1>
@endsection

@section('content')
    <ul>
        <li>Assunto: {{ $support->subject }}</li>
        <li>Status: {{ $support->status }}</li>
        <li>Descrição: {{ $support->body }}</li>
    </ul>

    <form action="{{ route('supports.destroy', $support->id) }}" method="post">
        @CSRF()
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Deletar</button>
    </form>
@endsection

