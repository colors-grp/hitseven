
<div class="row marketing">
    <div style="width: 900px;">
        <div class="Cards">
            <div class="cards-head">
                <h1>
                    Activities
                </h1>
                <img src="<?= base_url(); ?>webassets/img/cards_address_background.png" alt="Cards">
            </div>
            <div class="scor_tab_2"  style="margin:20px;width: 876px;" >
                <table width="100%" class="table table-bordered" cellpadding="10" cellspacing="0" >
                    <tr style="height: 60px;">
                        <td width="22%" style="font-size:17px;" >Type </td>
                        <td width="25%" style="font-size:17px;"> Activity </td>
                        <td width="25%" style="font-size:17px;"> Date </td>
                    </tr>
                    
                    <? foreach ($logs->result() as $log){ ?>
                    <tr>
                        <td width="20%" style="font-size:13px;" > <?=$log->id?> </td>
                        <td style="font-size:13px;">  <?=$log->activity?></td>
                        <td width="20%" style="font-size:13px;">  <?=$log->time?></td>
                    </tr>
                   <? }?>

                </table>
            </div>
        </div>
    </div>
    <style>
        .row .Cards .cards-head{
        width: 920px;
        background-color: #fff;
    }   
    .row .Cards .cards-head h1{
        left: inherit;
        padding-left: 20px;
    }
    </style>