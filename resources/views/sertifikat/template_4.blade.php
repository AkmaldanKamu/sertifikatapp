<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    HESTING

    <div class="signatures">
        <div class="signature">
            @if($ttdPengajarPath)
                <img src="{{ $ttdPengajarPath }}" alt="Tanda Tangan Pengajar">
            @endif
            <div class="signature-name">{{ $setting->nama_pengajar }}</div>
            <div class="signature-title">{{ $setting->instansi_pengajar }}</div>
        </div>
        <div class="signature">
            @if($ttdCeoPath)
                <img src="{{ $ttdCeoPath }}" alt="Tanda Tangan CEO">
            @endif
            <div class="signature-name">{{ $setting->ceo_name }}</div>
            <div class="signature-title">Chief Executive Officer</div>
        </div>
    </div>
</body>
</html>