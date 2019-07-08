<h4 class="font-weight-bold mb-3">Categories</h4>

<div class="list-group w-75 border-right">
    @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
    <a href="#main-{{$parent->id}}" class="list-group-item list-group-item-action mb-2" data-toggle="collapse">
      <img src="{!! asset('images/categories/'.$parent->image) !!}" width="50">
        {{$parent->name}}
    </a>
    <div class="child collapse show w-50" id="#main-{{$parent->id}}">
        @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
            <a href="#main-{{$parent->id}}" class="list-group-item list-group-item-action mb-3 mr-2">
                <img src="{!! asset('images/categories/'.$child->image) !!}" width="50">
                {{$child->name}}
            </a>
            @endforeach
    </div>

        @endforeach
</div>
