<!-- Invoiceno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoiceno', 'Invoice no:') !!}
    {!! Form::text('invoiceno', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoicedate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoicedate', 'Invoice date:') !!}
    {!! Form::date('invoicedate', null, ['class' => 'form-control']) !!}
</div>

<!-- Terms Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duetype', 'Due type:') !!}
    {!! Form::text('duetype', null, ['class' => 'form-control']) !!}
</div>

<!-- Duedate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duedate', 'Duedate:') !!}
    {!! Form::date('duedate', null, ['class' => 'form-control']) !!}
</div>

<!-- Billto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('billto', 'Billto:') !!}
    {!! Form::text('billto', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amountpaid', 'Amount paid:') !!}
    {!! Form::text('amountpaid', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.payments.index') !!}" class="btn btn-default">Cancel</a>
</div>
