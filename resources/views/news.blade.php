@extends('layout.app')

@section('content')
<div class="bgMdTitle mdTitle">Site News</div>
@foreach($data as $news)
    <div class="mdSeperator">&nbsp;</div>
    <div class="bgSmTitle smTitle">{{ $news->topic }}</div>
    <table class="bgLtTable">
        <tr>
            <td class="bgLtRow3 padded" style="font-size:8pt;">Posted at {{ $news->date }}</td>
        </tr>
        <tr>
            <td class="bgLtRow1 padded">
                {!! $news->message !!}
            </td>
        </tr>
    </table>
@endforeach
@include('layout.footer')
@endsection