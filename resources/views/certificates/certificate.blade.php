<div class="border-pattern">
    <div class="content">
        <div class="inner-content">
            <h1>Certificate</h1>
            <h2>of completion of the course</h2>
            <h3>This Certificate Is Proudly Presented To</h3>
            <p>{{ $student }}</p>
            <h3>Has Completed</h3>
            <p>{{ $course }}</p>
            <h3>On</h3>
            <p> {{ date('l jS \of F Y h:i', strtotime($finished_at)) }}</p>
            <div class="qrcode">

            </div>
        </div>
    </div>
</div>

<style>
    @page{
        size:A4 landscape;
        margin:10mm;
    }

    body{
        margin:0;
        padding:0;
        height:188mm;
    }

    .border-pattern{
        position:absolute;
        left:4mm;
        top:-6mm;
        height:200mm;
        width:267mm;
        border:1mm solid #638ad7;
        background-color: #d6d6e4;
    }

    .content{
        position:absolute;
        left:10mm;
        top:10mm;
        height:178mm;
        width:245mm;
        border:1mm solid #638ad7;
        background:white;
    }

    .inner-content{
        border:1mm dotted #638ad7;
        margin:4mm;
        padding:10mm;
        height:148mm;
        text-align:center;
    }

    h1{
        text-transform:uppercase;
        font-size:36pt;
        margin-bottom:0;
    }

    h2{
        font-size:20pt;
        margin-top:0;
        padding-bottom:1mm;
        display:inline-block;
        border-bottom:1mm solid #638ad7;
    }

    h2::after{
        content:"";
        display:block;
        padding-bottom:2mm;
        border-bottom:1mm solid #638ad7;
    }

    h3{
        font-size:20pt;
        margin-bottom:0;
        margin-top:5mm;
    }

    p{
        font-size:16pt;
        border-bottom: 1px solid #638ad7;
        display: inline-block;
        margin: 5px auto;
        width: 50%;
    }

    .qrcode{
        width:40mm;
        height:40mm;
        position:absolute;
        right:10mm;
        bottom:10mm;
        /*background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z' /%3E%3C/svg%3E");*/
    }
</style>
