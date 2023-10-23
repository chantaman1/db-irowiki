@extends('layout.app')

@section('content')
<div class="bgMdTitle mdTitle">Site News</div>
@if (count($data) > 0)
    @foreach($data as $news)
        <div class="mdSeperator">&nbsp;</div>
        <div class="bgSmTitle smTitle">{{ $news->topic }}</div>
        <table class="bgLtTable">
            <tr>
                <td class="bgLtRow3 padded" style="font-size:8pt;">Posted at {{ date_format($news->date, 'm/d/Y') }}</td>
            </tr>
            <tr>
                <td class="bgLtRow1 padded news">
                    {!! BBCode::parse($news->message) !!}
                </td>
            </tr>
        </table>
    @endforeach
@else
    <div class="mdSeperator">&nbsp;</div>
    <div class="bgSmTitle smTitle">No current news</div>
    <table class="bgLtTable">
        <tr>
            <td class="bgLtRow1 padded">
                Come check again later.
            </td>
        </tr>
    </table>
@endif
@include('layout.footer')
@endsection