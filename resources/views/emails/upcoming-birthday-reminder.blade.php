@extends('layouts.email')

@section('title', 'Update je verlanglijstje')
@section('preheader', 'Over een maand ben je alweer jarig! Dit is een goed moment om je verlanglijstje te updaten.')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" style="padding:30px;">
        <tr>
            <td style="padding-bottom:30px;">
                <p style="">Beste {{ $user->name }},</p>
                <p>Over een maand ben je alweer jarig! Dit is een goed moment om je verlanglijstje te updaten.</p>
            </td>
        </tr>
        <tr>
            <td style="padding-bottom:30px;">
                @include('emails.partials.cta', ['url' => route('wish-list', ['name' => $user->name]), 'text' => 'WERK BIJ'])
            </td>
        </tr>
    </table>
@endsection
