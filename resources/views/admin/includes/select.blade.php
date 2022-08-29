<select name="{{$name}}" id="{{$name}}" class="form-control">
    @foreach($data as $item)
        <option value="{{$item->id}}" {{!empty($selected) && $selected == $item->id?'selected':""}}>{{$item->name}}</option>
    @endforeach
</select>
