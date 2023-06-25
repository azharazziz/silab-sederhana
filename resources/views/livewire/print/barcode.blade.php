@section('style')
<style>
    @page {
    size: 5cm 3cm;
    }
</style>
@endsection
<div>
    @php
        $categoryId = null;
    @endphp
    @foreach ($categories as $category)
        @foreach ($category->parameter as $parameters)
            @foreach ($order->orderParameter as $orderParameter)
                @if ($orderParameter->parameter_id == $parameters->id)
                    @if ($orderParameter->parameter->category_id != $categoryId)
                        <table style="border: 1px solid black;
                        /* margin-bottom: 10px; */
                        table-layout: fixed;
                        border-collapse: collapse;
                        width: 25mm;
                        max-width: 25mm;
                        page-break-after: always;">
                            <tr>
                                <td style="width: 25mm; white-space: nowrap; overflow: hidden; text-overflow: clip; "><b><small>{{ strtoupper($category->category_name) }}</small><b></td>
                                <td style="width: 25mm; text-align:right;"><small>{{ $order->id }}</small></td>
                            </tr>
                            <tr>
                                <td style="white-space: nowrap; overflow: hidden; text-overflow: clip;">
                                    <small>
                                        {{ $order->patient->name }}/{{ $order->patient->datebirth }}
                                    </small>
                                </td>
                                <td style="text-align:right;">
                                    <small>
                                        <b>({{ $order->patient->id }})</b>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;">
                                    <img src="data:image/png; base64, {!! DNS1D::getBarcodePNG($order->id, 'C128') !!}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 12px">
                                    <small>
                                        {{ $order->room->room_name }}
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 12px">
                    @endif
                    <small>{{ $orderParameter->parameter->parameter_name }}
                        @if ($orderParameter->parameter->category_id != $categoryId)
                        ,
                        @endif
                    </small>
                    @php
                        $categoryId = $category->id;
                    @endphp
                    @if ($orderParameter->parameter->category_id != $categoryId)
                        </td>
                        </tr>
                    @endif
                @endif
            @endforeach
        @endforeach
        </table>
    @endforeach
</div>
