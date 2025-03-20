<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sertifikat</title>
    <style>
        body {
            font-family: 'Georgia', serif;
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
            position: relative;
        }
        .header {
            text-align: center;
            padding-top: 60px;
            border-bottom: 2px solid #c9b38c;
            margin-bottom: 40px;
            padding-bottom: 20px;
        }
        .title {
            font-size: 42px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #5d4037;
            text-transform: uppercase;
            letter-spacing: 4px;
        }
        .subtitle {
            font-size: 20px;
            font-style: italic;
            margin-bottom: 20px;
            color: #7d6e63;
        }
        .content {
            text-align: center;
            margin-bottom: 50px;
        }
        .recipient {
            font-size: 30px;
            font-weight: bold;
            margin: 30px 0;
            color: #5d4037;
            border-bottom: 1px solid #c9b38c;
            display: inline-block;
            padding-bottom: 10px;
        }
        .description {
            font-size: 18px;
            margin: 20px 0;
            line-height: 1.8;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 100px;
            padding: 0 80px;
        }
        .signature {
            text-align: center;
            border-top: 1px solid #c9b38c;
            padding-top: 15px;
            width: 200px;
        }
        .signature img {
            height: 60px;
            margin-bottom: 10px;
        }
        .signature-name {
            font-weight: bold;
            font-size: 16px;
            color: #5d4037;
        }
        .signature-title {
            font-size: 14px;
            color: #7d6e63;
            font-style: italic;
        }
        .cert-number {
            position: absolute;
            bottom: 30px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 12px;
            color: #9e9e9e;
            font-style: italic;
        }
        .date {
            text-align: center;
            margin: 30px 0;
            font-style: italic;
            color: #7d6e63;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="title">Sertifikat</div>
            <div class="subtitle">Pengakuan atas Keberhasilan Menyelesaikan Pelatihan</div>
        </div>
        
        <div class="content">
            <div class="description">Dengan bangga kami menyatakan bahwa</div>
            <div class="recipient">{{ $peserta->nama }}</div>
            <div class="description">
                Telah berhasil menyelesaikan program pelatihan<br>
                <strong>"{{ $peserta->temaSertifikat->nama_tema }}"</strong><br>
                dengan penuh dedikasi dan kompetensi yang memadai
            </div>
            
            <div class="date">
                {{ $setting->tempat }}, {{ $tanggal }}
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
                <div class="signature-title">Chief Executive Officer</div>
            </div>
        </div>
        
        <div class="cert-number">
            Nomor Sertifikat: {{ $peserta->no_sertifikat }}
        </div>
    </div>
</body>
</html>