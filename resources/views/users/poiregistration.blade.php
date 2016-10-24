@extends('master')

@section('content')

<!-- Breadcrumb -->
<ol class="breadcrumb hidden-xs">
    <li><a href="#">Administration</a></li>
    <li><a href="{{ url('list-poi-users') }}">POI</a></li>
    <li class="active">POI Capture Form</li>
</ol>
<h4 class="page-title">PERSONS OF INTEREST</h4>


<div class="block-area" id="multi-column">
    <h3 class="block-title">PERSON DETAILS</h3>
    <div class="">

     {!! Form::open(['url' => 'save_poi', 'method' => 'post', 'class' => 'row form-columned', 'id'=>"poiCaptureForm" ]) !!}

        <div class="col-md-4">

            {!! Form::label('First Name', 'First Name', array('class' => '')) !!}
            {!! Form::text('name',NULL,['class' => 'form-control input-sm m-b-10','id' => 'name']) !!}

        </div>
        <div class="col-md-4">

            {!! Form::label('Surname', 'Surname', array('class' => '')) !!}
            {!! Form::text('surname',NULL,['class' => 'form-control input-sm m-b-10','id' => 'surname']) !!}

        </div>
        <div class="col-md-4">

            {!! Form::label('ID Number', 'ID Number', array('class' => '')) !!}
            {!! Form::text('id_number',NULL,['class' => 'form-control input-sm m-b-10','id' => 'id_number']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Gender', 'Gender', array('class' => '')) !!}
            {!! Form::select('gender',['1' => 'Male','2' => 'Female' ],1,['class' => 'form-control input-sm' ,'id' => 'role']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Nationality', 'Nationality', array('class' => '')) !!}
            {!! Form::select('nationality',['1' => 'South Africa'],1,['class' => 'form-control input-sm' ,'id' => 'role']) !!}

        </div>

        <div class="col-md-4">
            {!! Form::label('Nickname', 'Nickname', array('class' => '')) !!}
            {!! Form::text('nickname',NULL,['class' => 'form-control input-sm m-b-10','id' => 'nickname']) !!}

        </div>

        <div class="col-md-4">
            {!! Form::label('Language Spoken', 'Language Spoken', array('class' => '')) !!}
            {!! Form::select('language',['1' =>'English','2' => 'IsiXhosa','3' =>'IsiZulu'],1,['class' => 'form-control input-sm' ,'id' => 'language']) !!}

        </div>

        <div class="col-md-4">
            {!! Form::label('Drivers Licence', 'Drivers Licence', array('class' => '')) !!}
            {!! Form::text('drivers_licence',NULL,['class' => 'form-control input-sm m-b-10','id' => 'drivers_licence']) !!}
        </div>

        <div class="col-md-4">
            {!! Form::label('Marital Status', 'Marital Status', array('class' => '')) !!}
            {!! Form::select('marital_status',['1' => 'Married','2' => 'Single','3' => 'Separated','4' => 'Divorced','5' => 'Widowed'],0,['class' => 'form-control input-sm m-b-10' ,'id' => 'marital_status']) !!}

        </div>

        <div class="col-md-4">
            {!! Form::label('Email Address', 'Email Address', array('class' => '')) !!}
            {!! Form::text('email',NULL,['class' => 'form-control input-sm m-b-10','id' => 'email']) !!}

        </div>

        <div class="col-md-4">
            {!! Form::label('Race', 'Race', array('class' => '')) !!}
            {!! Form::select('ethnic_group',['1' => 'Black','2' => 'Coloured','3' => 'White','4' => 'Indian','5'=>'Other'],0,['class' => 'form-control input-sm m-b-10' ,'id' => 'ethnic_group']) !!}

        </div>

        <div class="col-md-4">
            {!! Form::label('Weight', 'Weight', array('class' => '')) !!}
            {!! Form::text('weight',NULL,['class' => 'form-control input-sm m-b-10','id' => 'weight']) !!}

        </div>

        <div class="col-md-4">
            {!! Form::label('Birth Place', 'Birth Place', array('class' => '')) !!}
            {!! Form::text('birth_place',NULL,['class' => 'form-control input-sm m-b-10','id' => 'birth_place']) !!}

        </div>

        <div class="col-md-4">
            {!! Form::label('Scars', 'Scars', array('class' => '')) !!}
            {!! Form::text('scars',NULL,['class' => 'form-control input-sm m-b-10','id' => 'scars']) !!}


        </div>

        <div class="col-md-4">
            {!! Form::label('Tattoo', 'Tattoo', array('class' => '')) !!}
            {!! Form::text('tattoo',NULL,['class' => 'form-control input-sm m-b-10','id' => 'tattoo']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Number of Dependants', 'Number of Dependants', array('class' => '')) !!}
            {!! Form::select('dependants',['1' => '1','2' => '2','3' => '3','4' => '4','5'=>'5','6' =>'6','100' =>'None'],100,['class' => 'form-control input-sm m-b-10' ,'id' => 'ethnic_group']) !!}

        </div>



        </div>
</div>
<div class="block-area" id="multi-column">
    <h3 class="block-title">CONTACT DETAILS</h3>
    <div class="tile">

        <div class="col-md-4">
            {!! Form::label('Contact Number 1', 'Contact Number 1', array('class' => '')) !!}
            {!! Form::text('contact_number_1',NULL,['class' => 'form-control input-sm m-b-10','id' => 'contact_number_1']) !!}

        </div>

        <div class="col-md-4">
            {!! Form::label('Contact Number 2', 'Contact Number 2', array('class' => '')) !!}
            {!! Form::text('contact_number_2',NULL,['class' => 'form-control input-sm m-b-10','id' => 'contact_number_2']) !!}

        </div>
        <div class="col-md-4">
            {!! Form::label('Contact Number 3', 'Contact Number 3', array('class' => '')) !!}
            {!! Form::text('contact_number_3',NULL,['class' => 'form-control input-sm m-b-10','id' => 'contact_number_3']) !!}

        </div>


        <div class="col-md-4">

            {!! Form::label('Address Home', 'Address Home', array('class' => '')) !!}
            {!! Form::textarea('address_home', null, ['class' => 'form-control input-sm m-b-10','id' => 'address_home','size' => '30x5']) !!}


        </div>
        <div class="col-md-4">

            {!! Form::label('Address Work', 'Address Work', array('class' => '')) !!}
            {!! Form::textarea('address_work', null, ['class' => 'form-control input-sm m-b-10','id' => 'address_work','size' => '30x5']) !!}


        </div>

        </div>
</div>


<div class="block-area" id="multi-column">
    <h3 class="block-title">OTHER DETAILS</h3>
    <div class="tile">



        <div class="col-md-4">

            {!! Form::label('Travel Movements', 'Travel Movements', array('class' => '')) !!}
            {!! Form::textarea('travel_movements', null, ['class' => 'form-control input-sm m-b-10','id' => 'travel_movements','size' => '30x5']) !!}


        </div>
        <div class="col-md-4">

            {!! Form::label('Employments History', 'Employments History', array('class' => '')) !!}
            {!! Form::textarea('employment_history', null, ['class' => 'form-control input-sm m-b-10','id' => 'employment_history','size' => '30x5']) !!}

        </div>




</div>
</div>

<div class="block-area" id="multi-column">
    <h3 class="block-title">CRIME DETAILS</h3>
    <div class="tile">



        <div class="col-md-4">

            {!! Form::label('Crime Type 1', 'Crime Type 1', array('class' => '')) !!}
            {!! Form::text('crime_type_1',NULL,['class' => 'form-control input-sm m-b-10','id' => 'crime_type_1']) !!}


        </div>
        <div class="col-md-4">

            {!! Form::label('Crime Type 2', 'Crime Type 2', array('class' => '')) !!}
            {!! Form::text('crime_type_2',NULL,['class' => 'form-control input-sm m-b-10','id' => 'crime_type_2']) !!}

        </div>
        <div class="col-md-4">

            {!! Form::label('Crime Type 3', 'Crime Type 3', array('class' => '')) !!}
            {!! Form::text('crime_type_3',NULL,['class' => 'form-control input-sm m-b-10','id' => 'crime_type_3']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Crime Type 4', 'Crime Type 4', array('class' => '')) !!}
            {!! Form::text('crime_type_4',NULL,['class' => 'form-control input-sm m-b-10','id' => 'crime_type_4']) !!}

        </div>
        <div class="col-md-4">

            {!! Form::label('Crime Type 5', 'Crime Type 5', array('class' => '')) !!}
            {!! Form::text('crime_type_5',NULL,['class' => 'form-control input-sm m-b-10','id' => 'crime_type_5']) !!}

        </div>





</div>
</div>

<div class="block-area" id="multi-column">
    <h3 class="block-title">ARREST RECORDS</h3>
    <div class="tile">



        <div class="col-md-4">

            {!! Form::label('Arrest Record 1', 'Arrest Record 1', array('class' => '')) !!}
            {!! Form::text('arrest_record_1',NULL,['class' => 'form-control input-sm m-b-10','id' => 'arrest_record_1']) !!}


        </div>
        <div class="col-md-4">

            {!! Form::label('Arrest Record 2', 'Arrest Record 2', array('class' => '')) !!}
            {!! Form::text('arrest_record_2',NULL,['class' => 'form-control input-sm m-b-10','id' => 'arrest_record_2']) !!}

        </div>
        <div class="col-md-4">

            {!! Form::label('Arrest Record 3', 'Arrest Record 3', array('class' => '')) !!}
            {!! Form::text('arrest_record_3',NULL,['class' => 'form-control input-sm m-b-10','id' => 'arrest_record_3']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Arrest Record 4', 'Arrest Record 4', array('class' => '')) !!}
            {!! Form::text('arrest_record_4',NULL,['class' => 'form-control input-sm m-b-10','id' => 'arrest_record_4']) !!}

        </div>
        <div class="col-md-4">

            {!! Form::label('Arrest Record 5', 'Arrest Record 5', array('class' => '')) !!}
            {!! Form::text('arrest_record_5',NULL,['class' => 'form-control input-sm m-b-10','id' => 'arrest_record_5']) !!}

        </div>




</div>
</div>

<div class="block-area" id="multi-column">
    <h3 class="block-title">ACCOUNT & PROPERTY DETAILS</h3>
    <div class="tile">



        <div class="col-md-4">

            {!! Form::label('Bank Name', 'Bank Name', array('class' => '')) !!}
            {!! Form::text('bank_name',NULL,['class' => 'form-control input-sm m-b-10','id' => 'bank_name']) !!}


        </div>
        <div class="col-md-4">

            {!! Form::label('Bank Account Name', 'Bank Account Name', array('class' => '')) !!}
            {!! Form::text('bank_holder_name',NULL,['class' => 'form-control input-sm m-b-10','id' => 'bank_holder_name']) !!}

        </div>
        <div class="col-md-4">

            {!! Form::label('Bank Branch Code', 'Bank Branch Code', array('class' => '')) !!}
            {!! Form::text('bank_branch_code',NULL,['class' => 'form-control input-sm m-b-10','id' => 'bank_branch_code']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Bank Account Number', 'Bank Account Number', array('class' => '')) !!}
            {!! Form::text('bank_account_number',NULL,['class' => 'form-control input-sm m-b-10','id' => 'bank_account_number']) !!}

        </div>
        <div class="col-md-4">

            {!! Form::label('Accounts 1', 'Accounts 1', array('class' => '')) !!}
            {!! Form::text('account_1',NULL,['class' => 'form-control input-sm m-b-10','id' => 'account_1']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Accounts 2', 'Accounts 2', array('class' => '')) !!}
            {!! Form::text('account_2',NULL,['class' => 'form-control input-sm m-b-10','id' => 'account_2']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Accounts 3', 'Accounts 3', array('class' => '')) !!}
            {!! Form::text('account_3',NULL,['class' => 'form-control input-sm m-b-10','id' => 'account_3']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Accounts 4', 'Accounts 4', array('class' => '')) !!}
            {!! Form::text('account_4',NULL,['class' => 'form-control input-sm m-b-10','id' => 'account_4']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Accounts 5', 'Accounts 5', array('class' => '')) !!}
            {!! Form::text('account_5',NULL,['class' => 'form-control input-sm m-b-10','id' => 'account_5']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Property Owner 1', 'Property Owner 1', array('class' => '')) !!}
            {!! Form::text('property_owned_1',NULL,['class' => 'form-control input-sm m-b-10','id' => 'property_owned_1']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Property Owner 2', 'Property Owner 2', array('class' => '')) !!}
            {!! Form::text('property_owned_2',NULL,['class' => 'form-control input-sm m-b-10','id' => 'property_owned_2']) !!}

        </div>
        <div class="col-md-4">

            {!! Form::label('Property Owner 3', 'Property Owner 3', array('class' => '')) !!}
            {!! Form::text('property_owned_3',NULL,['class' => 'form-control input-sm m-b-10','id' => 'property_owned_3']) !!}

        </div>


        <div class="col-md-4">

            {!! Form::label('Property Rented 1', 'Property Rented 1', array('class' => '')) !!}
            {!! Form::text('property_rented_1',NULL,['class' => 'form-control input-sm m-b-10','id' => 'property_rented_1']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Property Rented 2', 'Property Rented 2', array('class' => '')) !!}
            {!! Form::text('property_rented_2',NULL,['class' => 'form-control input-sm m-b-10','id' => 'property_rented_2']) !!}

        </div>

        <div class="col-md-4">

            {!! Form::label('Property Rented 3', 'Property Rented 3', array('class' => '')) !!}
            {!! Form::text('property_rented_3',NULL,['class' => 'form-control input-sm m-b-10','id' => 'property_rented_3']) !!}

        </div>


        <div class="col-md-4">


        {!! Form::label('Credit Record', 'Credit Record', array('class' => '')) !!}
        {!! Form::textarea('credit_record', null, ['class' => 'form-control input-sm m-b-10','id' => 'credit_record','size' => '30x5']) !!}

        </div>
        <div class="col-md-4">


        {!! Form::label('Business Interest', 'Business Interest', array('class' => '')) !!}
        {!! Form::textarea('business_interest', null, ['class' => 'form-control input-sm m-b-10','id' => 'business_interest','size' => '30x5']) !!}

        </div>

        <div class="col-md-10">
            <button type="submit" class="btn btn-sm">Save</button>
        </div>
        {!! Form::close() !!}


</div>
</div>



<!-- Basic with panel-->

@include('cases.associates')

@endsection

@section('footer')
<script>
   $(document).ready(function() {

      $("#province").change(function(){

        $.get("{{ url('/api/dropdown/districts/province')}}",
        { option: $(this).val()},
        function(data) {
        $('#district').empty();
        $('#municipality').empty();
        $('#ward').empty();
        $('#district').removeAttr('disabled');
        $('#district').append("<option value='0'>Select one</option>");
        $('#municipality').append("<option value='0'>Select one</option>");
        $('#ward').append("<option value='0'>Select one</option>");
        $.each(data, function(key, element) {
        $('#district').append("<option value="+ key +">" + element + "</option>");
        });
        });

   })

    $("#district").change(function(){
        $.get("{{ url('/api/dropdown/municipalities/district')}}",
        { option: $(this).val() },
        function(data) {
        $('#municipality').empty();
        $('#municipality').removeAttr('disabled');
        $('#municipality').append("<option value='0'>Select one</option>");
        $.each(data, function(key, element) {
        $('#municipality').append("<option value="+ key +">" + element + "</option>");
        });
        });
    });

    $("#municipality").change(function(){
        $.get("{{ url('/api/dropdown/wards/municipality')}}",
        { option: $(this).val() },
        function(data) {
        $('#ward').empty();
        $('#ward').removeAttr('disabled');
        $('#ward').append("<option value='0'>Select one</option>");
        $.each(data, function(key, element) {
        $('#ward').append("<option value="+ key +">" + element + "</option>");
        });
        });
    });

  })

</script>
@endsection
