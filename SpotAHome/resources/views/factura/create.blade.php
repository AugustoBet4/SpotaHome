<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong><h2>SpotAHome</h2></strong><br>
                        Empresa X<br>
                        CASA MATRIZ 25 de Mayo<br>
                        2031, La Paz Bolivia<br>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <tbody>
                                        <tr>
                                            <td class="text-right"><strong>NIT: </strong></td>
                                            <td class="text-right">1002623025</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>Nº FACTURA: </strong></td>
                                            <td class="text-right">3033</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>Nº AUTORIZACION: </strong></td>
                                            <td class="text-right">59040011010</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="invoice-title">
        <h1><center>Factura</center></h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            <tr>
                                <td><strong>Fecha: </strong></td>
                                <td class="text-center">{{ date('d-m-Y H:i:s') }}</td>
                                <td><strong>NIT/CI: </strong></td>
                                <td>1020457026</td>
                            </tr>
                            <tr>
                                <td><strong>Señor(es): </strong></td>
                                <td>Wanda Pinto Ortiz</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Resumen de la orden</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td><strong>Direccion</strong></td>
                                <td class="text-center"><strong>Ciudad</strong></td>
                                <td class="text-center"><strong>Descripcion</strong></td>
                                <td class="text-right"><strong>Total</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            <tr>
                                <td>{{ $item->direccion }}</td>
                                <td class="text-center">{{ $item->ciudad }}</td>
                                <td class="text-center">{{ $item->descripcion }}</td>
                                <td class="text-right">{{ $item->costo }} Bs</td>
                            </tr>
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                <td class="thick-line text-right">{{ $item->costo }} Bs</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Total</strong></td>
                                <td class="no-line text-right">{{ $item->costo }} Bs</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <tbody>
                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                    <tr>
                                        <td><strong>Codigo de Control</strong></td>
                                        <td class="text-center">{{ $cod }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <tbody>
                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                    <tr>
                                        <td><strong>Fecha limite de emision:</strong></td>
                                        <td class="text-center">{{ date('d-m-Y H:i:s') }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 text-right">
                    <div class="col-md-12" style="width: 220px">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {!! QrCode::size(200)->generate('SpotAHome Empresa X: Direccion - '.$item->direccion.' Total - '.$item->costo); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


            <strong>Esta factura contribuye al desarrollo del pais, el uso ilicito de esta sera sancionada de acuerdo a la ley.</strong>
    <br><br>
    <button onClick="window.print()">Imprimir</button>
    <center><a href="{{ url('/factura/form') }}" class="btn btn-info" role="button">Regresar</a></center>
</div>