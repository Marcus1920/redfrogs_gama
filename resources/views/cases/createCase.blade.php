<!-- Modal Default -->
<div class="modal modalCreateCaseAgent" id="modalCreateCaseAgent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Create Cases</h4>
            </div>
            <div class="row">
              <div class="col-md-6">

              </div>

            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'createCaseAgent', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"CreateCaseAgentForm" ]) !!}
                {!! Form::hidden('hseHolderId',NULL,['id' => 'hseHolderId']) !!}



               <div class="form-group">
                    {!! Form::label('Search Client', 'Search Client', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                      {!! Form::text('hsecellphone',NULL,['class' => 'form-control input-sm','id' => 'hsecellphone']) !!}

                  </div>
                </div>

                <div class="form-group">
                  {!! Form::label('Title', 'Title', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-6">
                  {!! Form::select('title',$selectTitles,0,['class' => 'form-control' ,'id' => 'title','disabled']) !!}
                  <div id = "hse_error_title"></div>
                  </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Cell Number', 'Cell Number', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                      {!! Form::text('cellphone',NULL,['class' => 'form-control input-sm','id' => 'cellphone','disabled']) !!}
                      <div id = "hse_error_cellphone"></div>

                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('Client Name', 'Client Name', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                      {!! Form::text('name',NULL,['class' => 'form-control input-sm','id' => 'name','disabled']) !!}
                      <div id = "hse_error_name"></div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Client Surname', 'Client Surname', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                      {!! Form::text('surname',NULL,['class' => 'form-control input-sm','id' => 'surname','disabled']) !!}
                     <div id = "hse_error_surname"></div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Preferred Language', 'Preferred Language', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                    {!! Form::select('language',$selectLanguages,0,['class' => 'form-control' ,'id' => 'language','disabled']) !!}
                    <div id = "hse_error_language"></div>
                  </div>
                </div>

            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">


            <div class="form-group">
              {!! Form::label('Province', 'Province', array('class' => 'col-md-3 control-label')) !!}
              <div class="col-md-6">
                {!! Form::select('Province',$selectProvinces,0,['class' => 'form-control' ,'id' => 'province']) !!}
                @if ($errors->has('province')) <p class="help-block red">*{{ $errors->first('province') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('District', 'District', array('class' => 'col-md-3 control-label')) !!}
              <div class="col-md-6">
                {!! Form::select('district',$selectDistricts,0,['class' => 'form-control input-sm' ,'id' => 'district']) !!}
                @if ($errors->has('district')) <p class="help-block red">*{{ $errors->first('district') }}</p> @endif
              </div>
           </div>

            <div class="form-group">
                {!! Form::label('Municipality', 'Municipality', array('class' => 'col-md-3 control-label')) !!}
              <div class="col-md-6">
                {!! Form::select('municipality',$selectMunicipalities,0,['class' => 'form-control input-sm' ,'name' => 'municipality','id' => 'municipality']) !!}
                @if ($errors->has('municipality')) <p class="help-block red">*{{ $errors->first('municipality') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
                {!! Form::label('Team', 'Team', array('class' => 'col-md-3 control-label')) !!}
              <div class="col-md-6">
                {!! Form::select('ward',$selectWards,0,['class' => 'form-control input-sm' ,'name' => 'ward','id' => 'ward']) !!}
                @if ($errors->has('ward')) <p class="help-block red">*{{ $errors->first('ward') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
                {!! Form::label('Area', 'Area', array('class' => 'col-md-3 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('area',NULL,['class' => 'form-control input-sm','id' => 'area']) !!}
                  @if ($errors->has('area')) <p class="help-block red">*{{ $errors->first('area') }}</p> @endif
              </div>
            </div>

              
                    {!! Form::hidden('client_reference_number',12,['class' => 'form-control input-sm','id' => 'client_reference_number']) !!}
                    <div id = "hse_error_client_reference_number"></div>
             

               
                    {!! Form::hidden('saps_case_number',12,['class' => 'form-control input-sm','id' => 'saps_case_number']) !!}
                    <div id = "hse_error_saps_case_number"></div>
               


                <hr class="whiter m-t-20">
                <hr class="whiter m-b-20">


                <div class="form-group">
                    {!! Form::label('Case Type', 'Case Type', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                    {!! Form::select('case_type',$selectCasesTypes,0,['class' => 'form-control input-sm' ,'name' => 'case_type','id' => 'case_type']) !!}
                    <div id = "hse_error_type"></div>
                  </div>
                </div>

                <div class="form-group hidden" id="sub_case_type_id">
                    {!! Form::label('Case Sub Type', 'Case Sub Type', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                    {!! Form::select('case_sub_type',$selectCasesTypes,0,['class' => 'form-control input-sm' ,'name' => 'case_sub_type','id' => 'case_sub_type']) !!}
                    <div id = "hse_error_sub_type"></div>
					
		
                  </div>
                </div>
				
				 <div class="form-group hidden" id="sub_case_type_id">
                    {!! Form::label('Case Sub Type', 'Case Sub Type', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                    {!! Form::select('case_sub_type',$selectCasesTypes,0,['class' => 'form-control input-sm' ,'name' => 'sub-sub-categories','id' => 'case_sub_type']) !!}
                    <div id = "hse_error_sub_type"></div>
					
		
                  </div>
                </div>

                <hr class="whiter m-t-20">
                <hr class="whiter m-b-20">


                <div class="form-group">
                    {!! Form::label('Problem Description', 'Problem Description', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                        <textarea rows="5" id="description" name="description" class="form-control" maxlength="500"></textarea>
                    </div>
                    <div id = "hse_error_description"></div>
                </div>

                <hr class="whiter m-t-20">
                <hr class="whiter m-b-20">

                <div class="form-group">
                    <div class="col-md-3"></div>
                    <div class="col-md-8">
                       <a type="#" id='submitCreateCaseAgentForm' class="btn btn-sm">Create Case</a>
                    </div>
                </div>

               <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">

                    </div>
                </div>

                {!! Form::close() !!}

            </div>



        </div>
    </div>
</div>
