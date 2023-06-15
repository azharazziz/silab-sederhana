@section('style')
<style>
    @page {
    size: 11in 8.5in;
    margin: 27mm 16mm 27mm 16mm;
    }
</style>
@endsection

<div>
    <table>
        {{-- <thead>
            <tr>
                <td>
                    <div class="header-space">&nbsp;</div>
                </td>
            </tr>
        </thead> --}}
        <tbody>
            <tr>
                <td>
                    <div class="content">
                        {{-- ///content --}}
                        <table style="width:100%">
                            <tr>
                                <th><b>TAGIHAN PEMBAYARAN<b></th>
                            </tr>
                        </table>
                        <br>
                        <br>
                        {{-- identity --}}
                        <table style="width:100%; table-layout: fixed;">
                            <tr>
                                <td><b>No.Lab/RM</b></td>
                                <td>: <b>{{ $order->id }}/{{ $order->patient->id }}</b></td>
                                <td>Tanggal Transaksi</td>
                                <td>: {{ $order->registration_date }}</td>
                            </tr>
                            <tr>
                                <td><b>Nama Pasien</b></td>
                                <td>: <b>{{ $order->patient->name }}</b></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: {{ $order->patient->datebirth }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                {{-- <td>: {{ $order->patient->address}}, {{ $order->patient->village()->first()->name }}, {{ $order->patient->district()->first()->name }}, {{ $order->patient->regency()->first()->name }}, {{ $order->patient->province()->first()->name }}</td> --}}
                                <td>:</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Ruangan</td>
                                <td>: {{ $order->room->room_name }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Diagonisa Klinis</td>
                                <td></td>
                                <td colspan="2"></td>
                            </tr>
                        </table>

                        <br>
                        <br>
                        {{-- result --}}
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <th style="border-top:  1px solid; border-bottom: 1px solid;">JENIS PEMERIKSAAN</th>
                                <th style="border-top:  1px solid; border-bottom: 1px solid;">BIAYA</th>
                            </thead>
                            @foreach ($order->orderParameter as $item)
                                <tr>
                                    <td colspan="2">
                                        <b>{{ $item->parameter->category->category_name }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 1cm">{{ $item->parameter->parameter_name }}</td>
                                    <td style="text-align: right; padding-right:1cm;">Rp.{{ number_format($item->price) }}</td>
                                </tr>
                            @endforeach
                            <tr style="border-top: 2px solid">
                                <td style="padding-left: 1cm">TOTAL TAGIHAN</td>
                                <td style="text-align: right; padding-right:1cm;">Rp.{{ number_format($order->orderParameter->sum('price')) }}</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <div class="footer-space">&nbsp;</div>
                </td>
            </tr>
        </tfoot>
    </table>
    <div class="header"></div>
    <div class="footer">
        <table style="width:100%;table-layout: fixed; border-top: 1px solid;">
            <tr>
                <td>Penanggung Jawab</td>
                <td></td>
                <td style="text-align: center">Hormat Kami</td>
            </tr>
            <tr>
                <td>{{ $order->clinician->doctor_name }}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: center">{{ $order->analyst->name }}
                    <br>
                    Dicetak pada {{ now() }}
                </td>
            </tr>
        </table>
    </div>
</div>
