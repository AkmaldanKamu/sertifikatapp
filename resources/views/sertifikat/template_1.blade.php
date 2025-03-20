<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sertifikat</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            color: #333;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            background-image: url({{ $templatePath }});
            background-size: cover;
            background-position: center;
            height: 100%;
            width: 100%;
        }
        .container {
            width: 100%;
            height: 100%;
            padding: 50px;
            box-sizing: border-box;
        }
        .header {
            text-align: center;
            padding-top: 80px;
        }
        .title {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #1a365d;
        }
        .subtitle {
            font-size: 22px;
            margin-bottom: 30px;
            color: #2a4365;
        }
        .content {
            text-align: center;
            margin-bottom: 50px;
        }
        .recipient {
            font-size: 28px;
            font-weight: bold;
            margin: 30px 0;
            color: #1a365d;
        }
        .description {
            font-size: 18px;
            margin: 20px 0;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 80px;
            padding: 0 100px;
        }
        .signature {
            text-align: center;
        }
        .signature img {
            height: 60px;
            margin-bottom: 10px;
        }
        .signature-name {
            font-weight: bold;
            font-size: 16px;
        }
        .signature-title {
            font-size: 14px;
            color: #4a5568;
        }
        .cert-number {
            text-align: center;
            font-size: 12px;
            margin-top: 30px;
            color: #718096;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="title">SERTIFIKAT</div>
            <div class="subtitle">PELATIHAN PROFESIONAL</div>
        </div>
        
        <div class="content">
            <div class="description">Diberikan kepada:</div>
            <div class="recipient">{{ $peserta->nama }}</div>
            <div class="description">
                Telah mengikuti dan menyelesaikan dengan baik<br>
                <strong>{{ $peserta->temaSertifikat->nama_tema }}</strong><br>
                yang diselenggarakan pada tanggal {{ $tanggal }}<br>
                di {{ $setting->tempat }}
            </div>
        </div>
        
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
                <div class="signature-title">CEO</div>
            </div>
        </div>
        
        <div class="cert-number">
            Nomor Sertifikat: {{ $peserta->no_sertifikat }}
        </div>
    </div>
</body>
</html>