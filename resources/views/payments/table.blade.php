<table class="table table-responsive" id="payments-table">
    <thead>
        <th>Invoiceno</th>
        <th>Invoicedate</th>
        <th>Terms</th>
        <th>Duedate</th>
        <th>Billto</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Subtotal</th>
        <th>Total</th>
        <th>Notes</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($payments as $payment)
        <tr>
            <td>{!! $payment->invoiceno !!}</td>
            <td>{!! $payment->invoicedate !!}</td>
            <td>{!! $payment->terms !!}</td>
            <td>{!! $payment->duedate !!}</td>
            <td>{!! $payment->billto !!}</td>
            <td>{!! $payment->description !!}</td>
            <td>{!! $payment->quantity !!}</td>
            <td>{!! $payment->price !!}</td>
            <td>{!! $payment->amount !!}</td>
            <td>{!! $payment->subtotal !!}</td>
            <td>{!! $payment->total !!}</td>
            <td>{!! $payment->notes !!}</td>
            <td>
                {!! Form::open(['route' => ['payments.destroy', $payment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.payments.show', [$payment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.payments.edit', [$payment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>