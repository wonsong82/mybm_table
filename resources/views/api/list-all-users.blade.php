<div class="row">

    <div class="col">

        <div class="list">
            <h6>그룹 리더들 (<span id="leaders_count">0</span>)</h6>
        </div>

        <div class="list">
            <ul>
                @foreach($teamLeaders as $leader)
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
            <h6>참석멤버들 (<span id="members_count">0</span>)</h6>
        </div>

        @foreach($users as $soon)
        <div class="list">
            <h6>{{$soon->name}}</h6>
            <ul>
                @if($soon->leader)
                <li>
                    <input type="checkbox" class="member" value="{{$soon->leader->id}}">
                    <span class="name">{{$soon->leader->name}}</span>
                </li>
                @endif

                @foreach($soon->members as $member)
                <li>
                    <input type="checkbox" class="member" value="{{$member->id}}">
                    <span class="name">{{$member->name}}</span>
                </li>
                @endforeach

            </ul>
        </div>
        @endforeach

    </div>


</div>



<div class="action">
    <button id="make">Make groups</button>
</div>

