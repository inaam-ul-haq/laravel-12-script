<x-auth.select2 label="{{__('language.category')}}" name="category_id" id="category_id" :data="$categorylist"
    existing-id="{{$category}}" />