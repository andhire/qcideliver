
<div class="row db-padding-btm db-attached">

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

        <div class="db-wrapper">
            @php
            $amount = 5;
            @endphp
            {!! Form::open(array('route' => 'getCheckout')) !!}
            {{-- {!! Form::hidden('pay',$amount) !!} --}}
            {!! Form::label('donacion', 'Donacion') !!}
            {!! Form::number('pay', null, ['placeholder' => empty($amount) ? 'default value' : $amount, 'required' ])
            !!}

            <button class="btn db-button-color-square btn-lg">Pagar</button>
            {!! Form::close() !!}

        </div>

    </div>