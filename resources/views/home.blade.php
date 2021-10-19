@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

</div>
<form action="{{ url('/store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
  <button type="submit"> Sync Shipments </button>
</form>
<table border = "1">
<tr>
<td>ShipmentId</td>
<td>BizId</td>
<td>BizSalesOrder</td>
<td>Status</td>


</tr>
@foreach ($shipment as $shipments)

<tr>

<td>{{ $shipments->ShipmentId }}</td>
<td>{{ $shipments->BizId }}</td>
<td>{{ $shipments->BizSalesOrder }}</td>
<td>{{ $shipments->Status }}</td>


</tr>
@endforeach
</table>
@endsection

