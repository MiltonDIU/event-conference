
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('sponsor_title') ? 'has-error' : ''}}">
            <div class="row">
                <label for="name" class="col-md-6">{{ trans('cruds.events.fields.sponsor_title') }}</label>
                <div class="col-md-6">
                    {!! Form::text('sponsor_title', 'Event sponsor', ['class' => 'form-control', 'required' => false]) !!}
                    {!! $errors->first('sponsor_title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('sponsor_sub_title') ? 'has-error' : ''}}">
            <div class="row">
                <label class="col-md-1"></label>
                <label for="name" class="col-md-4">{{ trans('cruds.events.fields.sponsor_sub_title') }}</label>
                <div class="col-md-7">
                    {!! Form::text('sponsor_sub_title', null, ['class' => 'form-control', 'placeholder'=>'Sub Title', 'required' => false]) !!}
                    {!! $errors->first('sponsor_sub_title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
