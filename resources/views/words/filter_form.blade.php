<div>
    <div class="form-group">
        {!! Form::open(array('url' => action('Web\WordsController@index'), 'method' => 'get')) !!}
        Category:
        {!! Form::select('category_id', $categorySelect, $categoryId, ['placeholder' => trans('messages.all') ]) !!}
        {!! Form::radio('filter', '', $filter == '') !!} {{ trans('messages.all') }}
        {!! Form::radio('filter', 'learned', $filter == Config::get("custom.filter.learned")) !!} {{ trans('messages.learned') }}
        {!! Form::radio('filter', 'unlearned', $filter == Config::get("custom.filter.unlearned")) !!} {{ trans('messages.unlearned') }}
        {!! Form::submit('Filter') !!}
        {!! Form::close() !!}
    </div>
</div>
