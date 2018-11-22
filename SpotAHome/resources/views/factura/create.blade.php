<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>Factura</h2><h3 class="pull-right">Orden # 12345</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Pagado por:</strong><br>
                        paulinho<br>
                        1234 Sur<br>
                        4B<br>
                        Bolivia
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Entregado a:</strong><br>
                        paulinho<br>
                        1234 Sur<br>
                        4B<br>
                        Bolivia
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Metodo de Pago:</strong><br>
                        Paypal<br>
                        *****@email.com
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Fecha de la orden:</strong><br>
                        {{ date('d-m-Y H:i:s') }}<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
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
    <button onClick="window.print()">Imprimir</button>
    <center><a href="{{ url('/factura/form') }}" class="btn btn-info" role="button">Regresar</a></center>
</div>