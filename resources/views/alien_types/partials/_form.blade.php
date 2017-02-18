<div class="form-group">
    {!! Form::label('name', 'Type') !!}
    {!! Form::text('name', $alienType->name) !!}
</div>

<div class="form-group">
    {!! Form::label('image_link', 'Image') !!}
    {!! Form::text('image_link', $alienType->image_link) !!}
</div>

<div class="form-group">
    {!! Form::label('health', 'Health') !!}
    {!! Form::number('health', $alienType->health) !!}
</div>

<div class="form-group">
    {!! Form::label('ammo', 'Ammo') !!}
    {!! Form::number('ammo', $alienType->ammo) !!}
</div>
