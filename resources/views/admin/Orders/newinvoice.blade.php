<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: center;
    }
    .invoice-box table tr td:nth-child(3) {
        text-align: center;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #333;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
        color: #fff;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(3) {
        border-top: 2px solid #eee;
        font-weight: normal;
        text-align: center;
    }
    .invoice-box table tr.totalf td:nth-child(3) {
        border-top: 2px solid #333;
        border-bottom: 2px solid #333;
        font-weight: bold;
        text-align: center;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    .top-header{
text-align: justify !important;
    }
    .this{
        text-align: center;font-weight: bold;
        border-top: 2px solid #eee;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>

                            <td class="title" style="width: 58%">
                                <img src="https://pfaccounts.com/wp-content/uploads/2019/10/pfa-2.png" style="width:100%; max-width:150px;">
                            </td>
                            <td></td>
                            <td class="top-header">
                                <strong>Premium Freelancing Accounts</strong>
                                <br>
                                Beedstrasse 54 <br>
                                40468 Dusseldorf <br>
                                 Germany<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                               <strong>INVOICE</strong><br><br>
                                {{ $data['orders_data'][0]->customers_name }}<br>
                                {{ trans('labels.Email') }}:{{ $data['orders_data'][0]->email }}
                            </td>
                            <td></td>

                            <td class="top-header">
                                {{ trans('Order Number') }}: &nbsp;&nbsp; {{'PF'.$data['orders_data'][0]->orders_id }}<br>
                               Order Date:&nbsp;&nbsp; {{ date('m/d/Y', strtotime($data['orders_data'][0]->date_purchased)) }}<br>
                               Payment Method:&nbsp;&nbsp;{{ str_replace('_',' ', $data['orders_data'][0]->payment_method) }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>




            <tr class="heading">
                <td>
                    Item
                </td>
                <td>
                    Quantity
                </td>

                <td>
                    Price
                </td>
            </tr>

            <tr class="item">
                <td>
                    {{  $data['prod_des']->products_name }}
                </td>
                <td>
                    {{  $data['prod_des']->products_quantity }}
                </td>
                <td>
                    @if($data['orders_data'][0]->currency == 'USD')
                    $
                @endif
                @if($data['orders_data'][0]->currency == 'EUR')
                    €
                @endif
                @if($data['orders_data'][0]->currency == 'GBP')
                    £
                @endif
                    {{ $data['prod_des']->final_price }}
                </td>
            </tr>



            <tr class="total">
                <td></td>
                <td class="this"> SubTotal:</td>
                <td>
                  @if($data['orders_data'][0]->currency == 'USD')
                   $
               @endif
               @if($data['orders_data'][0]->currency == 'EUR')
                   €
               @endif
               @if($data['orders_data'][0]->currency == 'GBP')
                   £
               @endif
               {{ $data['orders_data'][0]->order_price }}
                            </td>
            </tr>
            <tr class="total">
                <td></td>
                <td class="this">Tax:</td>
                <td>
                    @if($data['orders_data'][0]->currency == 'USD')
                   $
               @endif
               @if($data['orders_data'][0]->currency == 'EUR')
                   €
               @endif
               @if($data['orders_data'][0]->currency == 'GBP')
                   £
               @endif
               {{ $data['orders_data'][0]->total_tax }}
                </td>
            </tr>
            <tr class="totalf">
                <td></td>
                <td class="this" style="
                border-top: 2px solid #333;
        border-bottom: 2px solid #333;"> Total: </td>
                <td>
                     @if($data['orders_data'][0]->currency == 'USD')
                        $
                    @endif
                    @if($data['orders_data'][0]->currency == 'EUR')
                        €
                    @endif
                    @if($data['orders_data'][0]->currency == 'GBP')
                        £
                    @endif
                    {{ $data['orders_data'][0]->order_price }}

                </td>
            </tr>
        </table>
    </div>
</body>
</html>
