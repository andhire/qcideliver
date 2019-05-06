{{-- <div class="container">

    <div class="row text-center">
 
         <div class="col-md-12">
 
             <h3>Laravel 5 - Payment Using Paypal</h3>
 
         </div>
 
     </div>
 
  
 
         <div class="row db-padding-btm db-attached">
 
             <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
 
                 <div class="db-wrapper">
 
                     {!! Form::open(array('route' => 'getCheckout')) !!}
 
                         {!! Form::hidden('type','small') !!}
 
                         {!! Form::hidden('pay',30) !!}
 
                         <div class="db-pricing-eleven db-bk-color-one">
 
                             <div class="price">
 
                                 <sup>$</sup>30
 
                                     <small>per quarter</small>
 
                             </div>
 
                             <div class="type">
 
                                 SMALL PLAN
 
                             </div>
 
                             <ul>
 
                                 <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
 
                                 <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
 
                                 <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
 
                             </ul>
 
                             <div class="pricing-footer">
 
                                 <button class="btn db-button-color-square btn-lg">BOOK ORDER</button>
 
                             </div>
 
                         </div>
 
                     {!! Form::close() !!}
 
                 </div>
 
             </div>
 
             <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
 
                 <div class="db-wrapper">
 
                     {!! Form::open(array('route' => 'getCheckout')) !!}
 
                         {!! Form::hidden('type','medium') !!}
 
                         {!! Form::hidden('pay',45) !!}
 
                     <div class="db-pricing-eleven db-bk-color-two popular">
 
                         <div class="price">
 
                             <sup>$</sup>45
 
                                     <small>per quarter</small>
 
                         </div>
 
                         <div class="type">
 
                             MEDIUM PLAN
 
                         </div>
 
                         <ul>
 
                             <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
 
                             <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
 
                             <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
 
                         </ul>
 
                         <div class="pricing-footer">
 
                             <button class="btn db-button-color-square btn-lg">BOOK ORDER</button>
 
                         </div>
 
                     </div>
 
                     {!! Form::close() !!}
 
                 </div>
 
             </div>
 
             <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
 
                 <div class="db-wrapper">
 
                     {!! Form::open(array('route' => 'getCheckout')) !!}
 
                         {!! Form::hidden('type','advance') !!}
 
                         {!! Form::hidden('pay',68) !!}
 
                     <div class="db-pricing-eleven db-bk-color-three">
 
                         <div class="price">
 
                             <sup>$</sup>68
 
                                     <small>per quarter</small>
 
                         </div>
 
                         <div class="type">
 
                             ADVANCE PLAN
 
                         </div>
 
                         <ul>
 
                             <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
 
                             <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
 
                             <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
 
                         </ul>
 
                         <div class="pricing-footer">
 
                             <button class="btn db-button-color-square btn-lg">BOOK ORDER</button>
 
                         </div>
 
                     </div>
 
                     {!! Form::close() !!}
 
                 </div>
 
             </div>
 
         </div>
 
 </div>
 
 --}}


<div class="row db-padding-btm db-attached">

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

        <div class="db-wrapper">
            @php
                $amount = 5;
            @endphp
            {!! Form::open(array('route' => 'getCheckout')) !!}

            {!! Form::hidden('type','small') !!}

            {{-- {!! Form::hidden('pay',$amount) !!} --}}
            {!! Form::label('donacion', 'Donacion') !!}
            {!! Form::number('pay', null, ['placeholder' => empty($amount) ? 'default value' : $amount, 'required' ]) !!}

            <button class="btn db-button-color-square btn-lg">Pagar</button>
            {!! Form::close() !!}

        </div>

    </div>