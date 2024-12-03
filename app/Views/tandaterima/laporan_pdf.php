<div class="signature-grid">
    <div class="signature-col">
        <p>PPTK,</p>
        <br><br><br>
        <p><u>Siti Purwanti, S.E., M.Acc.</u></p>
        <span class="nip">NIP. 19810518 200501 2 015</span>
    </div>
    <div class="signature-col inspektur">
        <p>INSPEKTUR DAERAH</p>
        <p>KABUPATEN BATANG</p>
        <br><br><br>
        <p><u>Dr. Bambang Supriyanto, SH.M.Hum.CGCAE</u></p>
        <span class="nip">NIP. 19641214 198603 1 009</span>
    </div>
    <div class="signature-col">
        <p>BENDAHARA PENGELUARAN,</p>
        <br><br><br>
        <p><u>Isyana Noviana Fasa, A.Md.</u></p>
        <span class="nip">NIP. 19851128 202012 2 002</span>
    </div>
</div>

<style>
    /* Gunakan flexbox untuk perataan kolom yang lebih kuat */
    .signature-grid {
        display: flex;
        justify-content: space-between;
        text-align: center;
        width: 100%;
    }

    .signature-col {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Rapatkan Nama dan NIP */
    .signature-col p,
    .signature-col span {
        margin: 0;
        line-height: 1.2;
    }

    .signature-col span.nip {
        font-size: 12px;
        /* Ukuran font NIP lebih kecil */
    }

    /* Menambahkan jarak pada kolom Inspektur Daerah */
    .inspektur {
        margin-top: 50px;
        /* Memastikan kolom inspektur turun */
    }

    @media print {
        @page {
            size: landscape;
            margin: 10mm;
        }

        body {
            margin: 0;
        }

        table {
            font-size: 10px;
            table-layout: fixed;
            width: 100%;
        }

        th,
        td {
            padding: 5px;
            word-wrap: break-word;
        }
    }
</style>