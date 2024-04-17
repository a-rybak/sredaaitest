<div class="border-pattern">
    <div class="content">
        <div class="inner-content">
            <div>
                <h1>Certificate</h1>
                <h2>of completion of the course</h2>
                <h3>This Certificate Is Proudly Presented To</h3>
                <p>{{ $student }}</p>
                <h3>Has Completed</h3>
                <p>{{ $course }}</p>
                <h3>On</h3>
                <p> {{ date('l jS \of F Y h:i', strtotime($finished_at)) }}</p>
            </div>
            <div class="qrcode">
                <img src="data:image/png;base64, {!! base64_encode(\SimpleSoftwareIO\QrCode\Facades\QrCode::size(130)->color(99, 138, 215)->generate($link)) !!} ">
            </div>
        </div>
    </div>
</div>

<style>
    @page {
        size: A4 landscape;
        margin: 10mm;
    }

    body {
        margin: 0;
        padding: 0;
        height: 188mm;
    }

    .border-pattern {
        position: absolute;
        left: 4mm;
        top: -6mm;
        height: 200mm;
        width: 267mm;
        border: 1mm solid #638ad7;
        background-color: #d6d6e4;
    }

    .content {
        position: absolute;
        left: 10mm;
        top: 10mm;
        height: 178mm;
        width: 245mm;
        border: 1mm solid #638ad7;
        background: white;
    }

    .inner-content {
        border: 1mm dotted #638ad7;
        margin: 4mm;
        padding: 10mm;
        height: 148mm;
        text-align: center;
    }

    h1 {
        text-transform: uppercase;
        font-size: 36pt;
        margin-bottom: 0;
    }

    h2 {
        font-size: 20pt;
        margin-top: 0;
        padding-bottom: 1mm;
        display: inline-block;
        border-bottom: 1mm solid #638ad7;
    }

    h2::after {
        content: "";
        display: block;
        padding-bottom: 2mm;
        border-bottom: 1mm solid #638ad7;
    }

    h3 {
        font-size: 20pt;
        margin-bottom: 0;
        margin-top: 5mm;
    }

    p {
        font-size: 16pt;
        border-bottom: 1px solid #638ad7;
        display: inline-block;
        margin: 5px auto;
        width: 50%;
    }

    .qrcode {
        color: red;
        /*width: 40mm;*/
        /*height: 40mm;*/
        /*position: relative;*/
        margin: 15px auto;
    }
</style>
