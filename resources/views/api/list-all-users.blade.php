<div class="row">

    <div class="col">

        <div class="list">
            <h6>그룹 리더들</h6>
            <ul>
                @foreach($leaders as $leader)
                    <li>
                        <input type="checkbox" class="leader" value="{{$leader->id}}">
                        <span class="name">{{$leader->name}}</span>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>


    <div class="col">

        <div class="list">
            <h6>멤버들</h6>
            <ul>
                @foreach($members as $member)
                    <li>
                        <input type="checkbox" class="member" value="{{$member->id}}">
                        <span class="name">{{$member->name}}</span>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>


</div>



<div class="action">
    <button id="make">Make groups</button>
</div>

