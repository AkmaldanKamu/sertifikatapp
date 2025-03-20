<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sertifikat</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #2c3e50;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background: url({{ $templatePath }}) no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            width: 80%;
            max-width: 900px;
            background: rgba(255, 255, 255, 0.85);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .title {
            font-size: 48px;
            font-weight: bold;
            color: #34495e;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        .subtitle {
            font-size: 20px;
            color: #7f8c8d;
            font-style: italic;
            margin-bottom: 30px;
        }
        .recipient {
            font-size: 32px;
            font-weight: bold;
            color: #2980b9;
            margin: 20px 0;
            border-bottom: 2px solid #2980b9;
            display: inline-block;
            padding-bottom: 5px;
        }
        .description {
            font-size: 18px;
            margin: 20px 0;
        }
        .date {
            font-size: 16px;
            color: #7f8c8d;
            margin-top: 20px;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }
        .signature {
            text-align: center;
            width: 45%;
        }
        .signature img {
            height: 50px;
            margin-bottom: 10px;
        }
        .signature-name {
            font-size: 16px;
            font-weight: bold;
            color: #2c3e50;
        }
        .signature-title {
            font-size: 14px;
            color: #7f8c8d;
            font-style: italic;
        }
        .cert-number {
            font-size: 14px;
            color: #7f8c8d;
            margin-top: 30px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Sertifikat</div>
        <div class="subtitle">Penghargaan atas Keberhasilan</div>
        <div class="description">Diberikan kepada</div>
        <div class="recipient">{{ $peserta->nama }}</div>
        <div class="description">
            Atas keberhasilannya menyelesaikan program pelatihan<br>
            <strong>"{{ $peserta->temaSertifikat->nama_tema }}"</strong>
        </div>
        <div class="date">{{ $setting->tempat }}, {{ $tanggal }}</div>
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
        <div class="cert-number">Nomor Sertifikat: {{ $peserta->no_sertifikat }}</div>
    </div>
</body>
</html>
