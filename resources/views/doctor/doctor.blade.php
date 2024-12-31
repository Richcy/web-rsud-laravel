@extends('layouts.app')

@section('title', 'RSUD Cimacan | Dokter')

@section('content')

@include('layouts.doctorContent')

@endsection

@section('js')

<script type="text/javascript">
    $(document).ready(function() {
        $('.spesialis').select2();
    });
</script>

@endsection