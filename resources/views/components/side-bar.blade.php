<div>
<h2>This is a side bar</h2>
    <h4>{{$title}}</h4>
    <ul>
    @foreach($list as $item)

            <li>{{$item}}</li>

        @endforeach
    </ul>
</div>
