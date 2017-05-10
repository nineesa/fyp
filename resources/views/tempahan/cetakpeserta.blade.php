<!DOCTYPE html>
<html lang="en">
<style>
    * {
        font-family: sans-serif;
        font-size: 12px;
    }
    .logo h1 {
        font-family: sans-serif;
        font-size: 36px;
        margin: 0px;
        color: #2980b9;
        text-shadow: 1px 1px #CCCCCC;
    }
    .logo {
        text-align: center;
    }
    .logo span {
        font-size: 30px;
        font-style: italic;
        color: #848484;
    }
    .logo p{
        margin: 0px;
        color: #B1AEAE;
        padding: 0px;
        font-family: sans-serif;
        font-size: 12px;
        letter-spacing: 1px;
    }
    .row {
        overflow: hidden;
        clear: both;
    }
    .col-md-6 {
        width: 50%;
        float: left;
    }
    .address-company {
        text-align: right;
    }
    .address-company h4 {
        margin: 0px;
        padding: 0px;
    }
</style>
<body>
<table border="0" width="100%">
    <tr>
        <td class="logo">
            <h1>Senarai Peserta<span></span></h1>
            <p></p>
        </td>
        <!-- <td class="address-company" style="text-align: right">
            <h4>Pusat Kitar Semula UKM </h4>
            <p style="margin-top: 0px;">
                Bandar Baru Bangi <br/>
                Malaysia<br/>
                <br/>
                T +33 555 444 333<br/><br/>
            </p>
        </td> -->
    </tr>
    <tr>
        <td colspan="2" style="background: #F1F1F1;padding: 14px;">
            <p style="margin: 0px; font-size: 14px;">
                Nama Program :  <br>
            </p>
        </td>
    </tr>
    <tr>
        <td><br></td>
        <td><br></td>
    </tr>
    <tr>
        <td>
            <b>Penganjur:</b><br>
            {{ Auth::user() ->name }}<br>

        </td>
        </td>
    </tr>
</table>
<br><br>
<table class="table table-bordered" border="1" style="border-collapse: collapse; width: 100%; border-color: #adadad;">
                        <thead>
                            <tr>
                                 <th>Bil</th>
                                <th width="60%">Nama</th>
                                <th width="30%">Kehadiran</th>

                            </tr>
                        </thead>
                        <tbody pull-{right}>

                          @foreach ($tempahans as $tempahan)
                          <tr>
                      <td > {{ $loop->iteration}}</td>
                      <td>{{  $tempahan->user->name }}</td>
                      <td>{{$tempahan->kehadiran}}</td>


                          @endforeach
                                                </tbody>
 </table>
<br/><br/>
<table class="table table-bordered" border="1" style="border-collapse: collapse; width: 100%; border-color: #adadad;">
    <tbody>
    <!-- <tr>
        <td width="60%" style="text-align: right; font-size: 18px; padding: 10px;">Jumlah Barang :</td>
        <td width="40%" style="text-align: right; font-size: 18px; font-weight: bold; padding: 10px;">24</td>
    </tr> -->
    </tbody>
</table>
</body>
</html>
